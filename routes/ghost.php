<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GhostController;

// Rutas para "ghost" landing page

Route::get('/', [GhostController::class, 'index']);
