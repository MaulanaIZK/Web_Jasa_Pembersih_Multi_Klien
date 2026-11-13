<?php

use App\Http\Middleware\EnsureUserHasRole;
use App\Support\Routing\PortalRoutes;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use App\Http\Middleware\SetClientContext;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function (): void {
            if (file_exists(base_path('routes/customer.php'))) {
                PortalRoutes::customer(base_path('routes/customer.php'));
            }
            if (file_exists(base_path('routes/client.php'))) {
                PortalRoutes::client(base_path('routes/client.php'));
            }
            if (file_exists(base_path('routes/admin.php'))) {
                PortalRoutes::admin(base_path('routes/admin.php'));
            }
        },
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => EnsureUserHasRole::class,
            'client.context' => SetClientContext::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
