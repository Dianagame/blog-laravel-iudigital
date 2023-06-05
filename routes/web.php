<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\WelcomeController;


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/categories', CategoryController::class);
Route::resource('/posts', PostController::class);
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

