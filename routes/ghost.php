<?php

use Illuminate\Support\Facades\Route;

// Rutas para "ghost" landing page

Route::get('/', function () {
    return 'Route using separate file';
});
