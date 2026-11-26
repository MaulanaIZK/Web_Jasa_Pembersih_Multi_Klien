<?php

namespace App\Modules\Payments;

use App\Modules\ModuleServiceProvider;

final class PaymentsServiceProvider extends ModuleServiceProvider
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
        return 'payments';
    }
}
