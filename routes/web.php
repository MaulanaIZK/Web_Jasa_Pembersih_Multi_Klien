<?php

use App\Http\Controllers\DashboardRedirectController;
use App\Modules\Admin\Http\Controllers\AdminDashboardController;
use App\Modules\Client\Http\Controllers\ClientDashboardController;
use App\Modules\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman Utama: Landing Page Pusat Informasi Lanskap (Sebelum Login)
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showCustomerRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerCustomer']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 1. Dasbor Admin Platform
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'role:admin']);

// 2. Dasbor & Layanan Client / Mitra Penyedia Jasa
Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('client.dashboard');

Route::get('/client', function () {
    return redirect()->route('client.dashboard');
})->middleware(['auth']);

Route::get('/client/services', function () {
    return view('components.layouts.tenant', [
        'title' => 'Kelola Layanan Jasa Kebersihan'
    ]);
})->middleware(['auth'])->name('client.services.index');

// 3. Dasbor / Katalog Pelanggan
Route::get('/customer/services', function () {
    return view('customer.services');
})->name('customer.services.index');

// Shortcut Pengalihan Utama Pasca-Login
Route::get('/dashboard', DashboardRedirectController::class)
    ->middleware(['auth'])
    ->name('dashboard');
