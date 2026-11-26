<?php

namespace App\Modules\Reporting;

use App\Modules\ModuleServiceProvider;

final class ReportingServiceProvider extends ModuleServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function moduleAlias(): string
    {
        return 'reporting';
    }
}
