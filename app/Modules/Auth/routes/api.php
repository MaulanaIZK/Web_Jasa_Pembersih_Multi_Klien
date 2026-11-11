<?php

use App\Modules\Auth\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    // Rute Publik
    Route::post('/register', [ApiAuthController::class, 'register']);
    Route::post('/login', [ApiAuthController::class, 'login']);

    // Rute Terproteksi Token (Authorization: Bearer <token>)
    Route::middleware('auth:sanctum')->group(function (): void {
        Route::post('/logout', [ApiAuthController::class, 'logout']);
        Route::get('/me', function (Request $request) {
            return response()->json([
                'status' => 'success',
                'data' => $request->user()->load('customerProfile', 'client')
            ]);
        });
    });
});
