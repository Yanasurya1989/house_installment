<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HouseInstallmentController;

// Login & logout (tanpa auth untuk login, dengan auth untuk logout)
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// Semua route lain hanya bisa diakses jika SUDAH LOGIN
Route::middleware('auth')->group(function () {
    Route::get('/', [HouseInstallmentController::class, 'welcome'])->name('home');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('house_installments', HouseInstallmentController::class);
    Route::resource('users', UserController::class);
});
