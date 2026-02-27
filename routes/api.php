<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanityWebhookController;

Route::post('/sanity/webhook', [SanityWebhookController::class, 'handle']);