<?php

use App\Modules\Auth\Http\Controllers\AuthController;
use App\Modules\Auth\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function (): void {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/register', [AuthController::class, 'showRegisterChoice'])->name('register');
    Route::get('/register/customer', [AuthController::class, 'showCustomerRegisterForm'])->name('register.customer');
    Route::post('/register', [AuthController::class, 'registerCustomer']);
    Route::get('/register/client', [AuthController::class, 'showClientRegisterForm'])->name('register.client');
    Route::post('/register/client', [AuthController::class, 'registerClient']);

    Route::middleware('auth')->group(function (): void {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    });
});
