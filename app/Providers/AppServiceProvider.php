<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (file_exists(base_path('app/Modules/Admin/resources/views'))) {
            View::addNamespace('admin', base_path('app/Modules/Admin/resources/views'));
        }

        if (file_exists(base_path('app/Modules/Auth/resources/views'))) {
            View::addNamespace('auth', base_path('app/Modules/Auth/resources/views'));
        }

        if (file_exists(base_path('app/Modules/Governance/resources/views'))) {
            View::addNamespace('governance', base_path('app/Modules/Governance/resources/views'));
        }
    }
}
