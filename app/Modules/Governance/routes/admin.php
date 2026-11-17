<?php

use App\Modules\Governance\Http\Controllers\CommissionController;
use App\Modules\Governance\Http\Controllers\GovernanceController;
use App\Support\Routing\PortalRoutes;
use Illuminate\Support\Facades\Route;

PortalRoutes::admin(function (): void {
    Route::get('/clients', [GovernanceController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [GovernanceController::class, 'create'])->name('clients.create');
    Route::post('/clients', [GovernanceController::class, 'store'])->name('clients.store');
    Route::post('/clients/{client}/verify', [GovernanceController::class, 'verifyClient'])->name('clients.verify');
    Route::post('/clients/{client}/toggle-status', [GovernanceController::class, 'toggleClientStatus'])->name('clients.toggle-status');

    Route::get('/commissions', [CommissionController::class, 'index'])->name('commissions.index');
    Route::post('/commissions', [CommissionController::class, 'store'])->name('commissions.store');
});
