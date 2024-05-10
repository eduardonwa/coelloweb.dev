<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::redirect('/', 'blog')->name('welcome');

Route::view('about', 'about')->name('about');

Route::get('blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
