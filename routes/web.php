<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\PostController;


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return view('Welcome');
});

Route::resource('/categories', CategoryController::class);
Route::resource('/posts', PostController::class);