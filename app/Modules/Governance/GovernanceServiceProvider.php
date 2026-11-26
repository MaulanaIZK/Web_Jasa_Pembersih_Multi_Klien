<?php

namespace App\Modules\Governance;

use App\Modules\ModuleServiceProvider;

final class GovernanceServiceProvider extends ModuleServiceProvider
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
        return 'governance';
    }
}
