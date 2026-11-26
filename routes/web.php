<?php

use App\Http\Controllers\DashboardRedirectController;
use App\Modules\Admin\Http\Controllers\AdminDashboardController;
use App\Modules\Client\Http\Controllers\ClientDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('client.dashboard');

Route::get('/dashboard', DashboardRedirectController::class)
    ->middleware(['auth'])
    ->name('dashboard');
