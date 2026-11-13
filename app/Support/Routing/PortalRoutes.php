<?php

namespace App\Support\Routing;

use Closure;
use Illuminate\Support\Facades\Route;

final class PortalRoutes
{
    /**
     * Portal Pelanggan (Publik)
     */
    public static function customer(Closure|string $routes): void
    {
        Route::middleware('web')
            ->prefix('customer')
            ->name('customer.')
            ->group($routes);
    }

    /**
     * Portal Client / Penyedia Jasa Pembersih (Internal)
     */
    public static function client(Closure|string $routes): void
    {
        Route::middleware(['web', 'auth', 'verified', 'role:client', 'client.context'])
            ->prefix('client/{client}')
            ->name('client.')
            ->scopeBindings()
            ->group($routes);
    }

    /**
     * Portal Admin Platform (Internal)
     */
    public static function admin(Closure|string $routes): void
    {
        Route::middleware(['web', 'auth', 'verified', 'role:admin'])
            ->prefix('admin')
            ->name('admin.')
            ->group($routes);
    }
}