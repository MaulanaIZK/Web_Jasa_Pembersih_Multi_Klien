<?php

use App\Modules\Auth\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute Publik (Tanpa Token)
Route::post('/login', [ApiAuthController::class, 'login'])->name('api.login');
Route::post('/register', [ApiAuthController::class, 'register'])->name('api.register');

// Rute Terproteksi Token (Bearer Token)
Route::middleware('auth:sanctum')->group(function (): void {
    Route::get('/user', function (Request $request) {
        return response()->json([
            'status' => 'success',
            'data' => $request->user()->load('customerProfile', 'client')
        ]);
    });

    Route::post('/logout', [ApiAuthController::class, 'logout'])->name('api.logout');
});
