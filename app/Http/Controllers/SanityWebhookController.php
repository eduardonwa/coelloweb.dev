<?php

namespace App\Http\Controllers;

// use App\Services\StripeSyncService;
use App\Services\StripeSyncService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SanityWebhookController extends Controller
{
    public function handle(Request $request, StripeSyncService $sync)
    {
        if (!$this->verifySanityWebhookSignature($request)) {
            return response()->json(['ok' => false, 'error' => 'Invalid signature'], 401);
        }

        $id = $request->input('_id');
        if (!$id) {
            return response()->json(['ok' => false, 'error' => 'Missing _id'], 422);
        }
        
        Log::info('Sanity webhook ok', [
            'id' => $id,
            'op' => $request->header('sanity-operation'),
        ]);

        $result = $sync->syncVariant($id);

        if (!($result['patchedSanity'] ?? false) && !($result['createdNewPrice'] ?? false)) {
            // opcional: no loguear nada
        }

        return response()->json(['ok' => true, 'synced' => $result]);
    }

    private function verifySanityWebhookSignature(Request $request): bool
    {
        $secret = env('SANITY_WEBHOOK_SECRET');
        if (!$secret) return false;

        $header = $request->header('sanity-webhook-signature');
        if (!$header) return false;

        // Parse: t=...,v1=...
        $parts = [];
        foreach (explode(',', $header) as $kv) {
            [$k, $v] = array_pad(explode('=', trim($kv), 2), 2, null);
            if ($k && $v) $parts[$k] = $v;
        }

        $t  = $parts['t'] ?? null;
        $v1 = $parts['v1'] ?? null;
        if (!$t || !$v1) return false;

        // Anti-replay (5 min)
        $nowMs = (int) round(microtime(true) * 1000);
        if (abs($nowMs - (int)$t) > 5 * 60 * 1000) return false;

        $raw = $request->getContent();
        $signedPayload = $t . '.' . $raw;

        $hmac = hash_hmac('sha256', $signedPayload, $secret, true);
        $expected = rtrim(strtr(base64_encode($hmac), '+/', '-_'), '=');

        return hash_equals($expected, $v1);
    }
}
