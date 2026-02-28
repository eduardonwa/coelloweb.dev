<?php

namespace App\Http\Controllers;

use App\Services\StripeSyncService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class SanityWebhookController extends Controller
{
    public function handle(Request $request, StripeSyncService $sync)
    {
        if (!$this->verifySanityWebhookSignature($request)) {
            Log::warning('Sanity webhook rejected: invalid signature', [
                'has_signature' => (bool) $request->header('sanity-webhook-signature'),
            ]);

            return response()->json(['ok' => false, 'error' => 'Invalid signature'], Response::HTTP_UNAUTHORIZED);
        }

        $operation = strtolower((string) $request->header('sanity-operation', ''));
        if ($operation === 'delete') {
            return response()->json(['ok' => true, 'skipped' => 'delete operation']);
        }

        $id = (string) $request->input('_id');
        if (!$id) {
            return response()->json(['ok' => false, 'error' => 'Missing _id'], 422);
        }
        
        Log::info('Sanity webhook accepted', [
            'id' => $id,
            'op' => $operation,
            'dataset' => $request->header('sanity-dataset'),
            'project' => $request->header('sanity-project-id'),
            'type' => $request->input('_type'),
        ]);

        try {
            $result = $sync->syncByDocument($id, $request->input('_type'));
        } catch (\Throwable $e) {
            Log::error('Sanity -> Stripe sync failed', [
                'id' => $id,
                'op' => $operation,
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'ok' => false,
                'error' => 'Sync failed',
                'message' => $e->getMessage(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(['ok' => true, 'synced' => $result]);
    }

    private function verifySanityWebhookSignature(Request $request): bool
    {
        $secret = (string) config('services.sanity.webhook_secret');
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
