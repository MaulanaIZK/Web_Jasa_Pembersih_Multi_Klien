<?php

use App\Modules\Catalog\Http\Controllers\ServiceController;
use App\Support\Routing\PortalRoutes;
use Illuminate\Support\Facades\Route;

PortalRoutes::client(function (): void {
    Route::prefix('services')->name('services.')->group(function (): void {
        Route::get('/', [ServiceController::class, 'index'])->name('index');
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');
        Route::get('/{service}/edit', [ServiceController::class, 'edit'])->name('edit');
        Route::put('/{service}', [ServiceController::class, 'update'])->name('update');
        Route::post('/{service}/toggle', [ServiceController::class, 'toggleStatus'])->name('toggle');
        Route::delete('/{service}', [ServiceController::class, 'destroy'])->name('destroy');
    });
});
