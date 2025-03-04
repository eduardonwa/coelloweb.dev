<?php

use App\Livewire\ContactForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GhostController;

// Rutas para landing page de "ghost"
Route::get('/', [GhostController::class, 'index']);
Route::get('/gracias', [GhostController::class, 'gracias']);
