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
        $this->app->bind(RequestActivityLoggerInterface::class, function () {
            return $this->app->make(
                $this->app->environment('production') ? ProductionRequestActivityLog::class : DebugRequestActivityLog::class
            );
        });
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
