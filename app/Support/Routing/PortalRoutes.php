<?php

namespace App\Support\Routing;

use Closure;
use Illuminate\Support\Facades\Route;

final class PortalRoutes
{
    public static function web(Closure|string $routes): void
    {
        Route::middleware('web')->group($routes);
    }

    public static function customer(Closure|string $routes): void
    {
        Route::middleware('web')
            ->prefix('customer')
            ->name('customer.')
            ->group($routes);
    }

    public static function client(Closure|string $routes): void
    {
        Route::middleware(['web', 'auth', 'verified'])
            ->prefix('client')
            ->name('client.')
            ->group($routes);
    }

    // Alias untuk kompatibilitas kode tenant
    public static function tenant(Closure|string $routes): void
    {
        self::client($routes);
    }

    public static function admin(Closure|string $routes): void
    {
        Route::middleware(['web', 'auth', 'verified', 'role:admin'])
            ->prefix('admin')
            ->name('admin.')
            ->group($routes);
    }
}
