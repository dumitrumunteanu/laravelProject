<?php

namespace App\Providers;

use App\Services\DebugRequestActivityLog;
use App\Services\ProductionRequestActivityLog;
use App\Services\RequestActivityLoggerInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->bind(RequestActivityLoggerInterface::class, function () {
                return $this->app->make(DebugRequestActivityLog::class);
            });
        }
        elseif ($this->app->environment('production')) {
            $this->app->bind(RequestActivityLoggerInterface::class, function () {
                return $this->app->make(ProductionRequestActivityLog::class);
            });
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Paginator::defaultView('components.paginator');
        Paginator::defaultSimpleView('components.paginator');
    }
}
