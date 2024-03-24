<?php

namespace App\Providers;

use App\Services\ReportService;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(ReportService::class, function ($app) {
            return new ReportService($app->make('App\Repositories\ReportRepositoryInterface'));
        });
    }
}
