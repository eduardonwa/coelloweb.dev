<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Stripe\StripeClient;

class StripeSyncService
{
    public function __construct(
        private StripeClient $stripe,
        private SanityClient $sanity,
    ) {}

    public function syncVariant(string $variantId): array
    {
        $doc = $this->fetchVariantById($variantId);

        if (!$doc) {
            throw new \RuntimeException("Variante no encontrada en Sanity.");
        }

        return $this->syncVariantDocument($doc);
    }

    public function syncByDocument(string $docId, ?string $docType = null): array
    {
        $resolvedType = $docType ?: $this->resolveDocumentType($docId);

        if ($resolvedType === 'variante') {
            return $this->syncVariant($docId);
        }

        if ($resolvedType === 'producto') {
            $variant = $this->fetchFirstVariantByProductId($docId);
            if (!$variant) {
                throw new \RuntimeException("Producto sin variantes publicadas para sincronizar.");
            }

            return $this->syncVariantDocument($variant);
        }

        throw new \RuntimeException("Tipo de documento no soportado para sync: {$resolvedType}.");
    }

    private function syncVariantDocument(array $doc): array
    {
        $variantId = $doc['_id'] ?? null;
        if (!$variantId) {
            throw new \RuntimeException('La variante no tiene _id.');
        }

        $title   = Arr::get($doc, 'producto.titulo');
        $precio  = $doc['precio'] ?? null;
        $moneda  = strtolower($doc['moneda'] ?? 'mxn');

        $spid    = $doc['stripeProductId'] ?? null;
        $priceId = $doc['stripePriceId'] ?? null;
        $activeInSanity = $doc['stripePriceActive'] ?? null;

        if (!$title) {
            throw new \RuntimeException("Falta producto.titulo (revisa referencia producto).");
        }

        if ($precio === null) {
            throw new \RuntimeException("Falta precio en variante.");
        }

        if ($spid) {
            $this->stripe->products->update($spid, ['name' => $title]);
        } else {
            $p = $this->stripe->products->create([
                'name' => $title,
                'metadata' => [
                    'sanity_product_id' => Arr::get($doc, 'producto._id', ''),
                    'sanity_variant_id' => $variantId,
                ],
            ]);
            $spid = $p->id;
        }

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

        $alreadySame =
            ($doc['stripeProductId'] ?? null) === $spid &&
            ($doc['stripePriceId'] ?? null) === $priceId &&
            ($activeInSanity === $active);

        if (!$alreadySame) {
            $this->sanity->patchSet($variantId, [
                'stripeProductId' => $spid,
                'stripePriceId' => $priceId,
                'stripePriceActive' => $active,
            ]);
        }

        return [
            'documentType' => 'variante',
            'variantId' => $variantId,
            'stripeProductId' => $spid,
            'stripePriceId' => $priceId,
            'stripePriceActive' => $active,
            'patchedSanity' => !$alreadySame,
            'createdNewPrice' => $needNewPrice,
        ];
    }

    private function fetchVariantById(string $variantId): ?array
    {
        return $this->sanity->fetch(
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
    }

    private function fetchFirstVariantByProductId(string $productId): ?array
    {
        return $this->sanity->fetch(
            '*[_type=="variante" && producto._ref==$productId][0]{
                _id,
                precio,
                moneda,
                stripeProductId,
                stripePriceId,
                stripePriceActive,
                producto->{ _id, titulo }
            }',
            ['productId' => $productId]
        );
    }

    private function resolveDocumentType(string $docId): ?string
    {
        $doc = $this->sanity->fetch('*[_id==$id][0]{_type}', ['id' => $docId]);
        return $doc['_type'] ?? null;
    }

    private function toUnitAmount($precio): int
    {
        return (int) round(((float) $precio) * 100);
    }
}
