<?php

use App\Http\Controllers\DashboardRedirectController;
use App\Modules\Admin\Http\Controllers\AdminDashboardController;
use App\Modules\Client\Http\Controllers\ClientDashboardController;
use App\Modules\Auth\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showCustomerRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerCustomer']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('client.dashboard');

Route::get('/dashboard', DashboardRedirectController::class)
    ->middleware(['auth'])
    ->name('dashboard');
