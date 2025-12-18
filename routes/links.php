<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Links\LinksController;

Route::get('/', [LinksController::class, 'show']);