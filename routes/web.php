<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogsController;



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route (protected by auth middleware)

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::resource('blogs', BlogsController::class);
Route::get('/my-posts', [BlogsController::class, 'myPosts']);

