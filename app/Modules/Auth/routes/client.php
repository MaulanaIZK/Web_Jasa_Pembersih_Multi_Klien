<?php

use App\Modules\Auth\Http\Controllers\ClientProfileController;
use App\Support\Routing\PortalRoutes;
use Illuminate\Support\Facades\Route;

PortalRoutes::client(function (): void {
    Route::get('/profile', [ClientProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ClientProfileController::class, 'update'])->name('profile.update');
});
