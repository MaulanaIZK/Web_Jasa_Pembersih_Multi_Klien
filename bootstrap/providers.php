<?php

use App\Modules\Admin\AdminServiceProvider;
use App\Modules\Auth\AuthServiceProvider;
use App\Providers\AppServiceProvider;

return [
    AppServiceProvider::class,
    AdminServiceProvider::class,
    AuthServiceProvider::class,
];
