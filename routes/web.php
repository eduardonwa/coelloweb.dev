<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::redirect('/', 'blog')->name('welcome');

Route::view('acerca', 'acerca')->name('acerca');

Route::view('privacidad', 'privacidad')->name('privacidad');
Route::view('terminos', 'terminos')->name('terminos');

Route::get('blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('categorias', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categorias/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get("sitemap.xml" , function () {
    return \Illuminate\Support\Facades\Redirect::to('sitemap.xml');
});
