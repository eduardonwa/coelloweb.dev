<?php

namespace App\Services;

use Stripe\StripeClient;

class StripeSyncService
{
    public function __construct(
        private StripeClient $stripe,
        private SanityClient $sanity,
    ) {}

    public function syncVariant(string $variantId): array
    {
        // 1) Leer variante + producto (referenciado)
        $doc = $this->sanity->fetch(
            '*[_type=="variante" && _id==$id][0]{
                _id,
                precio,
                moneda,
                stripeProductId,
                stripePriceId,
                stripePriceActive,
                producto->{ _id, titulo }
            }',
            ['id' => $variantId]
        );

        if (!$doc) {
            throw new \RuntimeException("Variante no encontrada en Sanity.");
        }

        $title   = $doc['producto']['titulo'] ?? null;
        $precio  = $doc['precio'] ?? null;
        $moneda  = strtolower($doc['moneda'] ?? 'mxn');

        $spid    = $doc['stripeProductId'] ?? null;
        $priceId = $doc['stripePriceId'] ?? null;
        $activeInSanity = $doc['stripePriceActive'] ?? null;

        if (!$title) throw new \RuntimeException("Falta producto.titulo (revisa referencia producto).");
        if ($precio === null) throw new \RuntimeException("Falta precio en variante.");

        // 2) Stripe Product (create/update)
        if ($spid) {
            $this->stripe->products->update($spid, ['name' => $title]);
        } else {
            $p = $this->stripe->products->create([
                'name' => $title,
                'metadata' => [
                    'sanity_product_id' => $doc['producto']['_id'] ?? '',
                ],
            ]);
            $spid = $p->id;
        }

        // 3) Stripe Price (si cambió, crear nuevo)
        $unitAmount = $this->toUnitAmount($precio);

        $needNewPrice = true;
        $active = true;

        if ($priceId) {
            try {
                $existing = $this->stripe->prices->retrieve($priceId, []);
                $same = $existing->active
                    && strtolower($existing->currency) === $moneda
                    && ((int) $existing->unit_amount) === $unitAmount
                    && $existing->product === $spid;

                if ($same) {
                    $needNewPrice = false;
                    $active = (bool) $existing->active;
                }
            } catch (\Throwable $e) {
                $needNewPrice = true;
            }
        }

        if ($needNewPrice) {
            $newPrice = $this->stripe->prices->create([
                'product' => $spid,
                'unit_amount' => $unitAmount,
                'currency' => $moneda,
            ]);

            $priceId = $newPrice->id;
            $active  = (bool) $newPrice->active;
        }

        // 4) Anti-loop: solo patch si cambió algo
        $alreadySame =
            ($doc['stripeProductId'] ?? null) === $spid &&
            ($doc['stripePriceId'] ?? null) === $priceId &&
            ($activeInSanity === $active);

        if (!$alreadySame) {
            // Patch a la VARIANTE (campos planos)
            $this->sanity->patchSet($variantId, [
                'stripeProductId' => $spid,
                'stripePriceId' => $priceId,
                'stripePriceActive' => $active,
            ]);
        }

        return [
            'stripeProductId' => $spid,
            'stripePriceId' => $priceId,
            'stripePriceActive' => $active,
            'patchedSanity' => !$alreadySame,
            'createdNewPrice' => $needNewPrice,
        ];
    }

    private function toUnitAmount($precio): int
    {
        return (int) round(((float) $precio) * 100);
    }
}