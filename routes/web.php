<?php

use App\Livewire\MainContactForm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GhostController;
use App\Http\Controllers\AcercaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ServiciosController;

Route::view('privacidad', 'privacidad')->name('privacidad');
Route::view('terminos', 'terminos')->name('terminos');
Route::view('preguntas', 'preguntas')->name('preguntas');

Route::get('/', [WelcomeController::class, 'show'])->name('welcome');
Route::get('acerca', [AcercaController::class, 'show'])->name('acerca');
Route::get('contacto', [ContactoController::class, 'show'])->name('contacto');
Route::get('contactoForm', MainContactForm::class)->name('contactoForm');
Route::get('gracias', [GhostController::class, 'gracias'])->name('gracias');
Route::get('servicios', [ServiciosController::class, 'show'])->name('servicios');

Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categorias/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get("sitemap.xml" , function () {
    return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
});
