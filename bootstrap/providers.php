<?php

use App\Modules\Admin\AdminServiceProvider;
use App\Modules\Auth\AuthServiceProvider;
use App\Modules\Catalog\CatalogServiceProvider;
use App\Modules\Governance\GovernanceServiceProvider;
use App\Modules\Ordering\OrderingServiceProvider;
use App\Modules\Payments\PaymentsServiceProvider;
use App\Modules\Reporting\ReportingServiceProvider;
use App\Modules\Support\SupportServiceProvider;
use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    AdminServiceProvider::class,
    AuthServiceProvider::class,
    CatalogServiceProvider::class,
    GovernanceServiceProvider::class,
    OrderingServiceProvider::class,
    PaymentsServiceProvider::class,
    ReportingServiceProvider::class,
    SupportServiceProvider::class,
];
