<?php

namespace App\Providers;


use App\Services\FinancialService;
use Illuminate\Support\ServiceProvider;

class FinancialServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(FinancialService::class, function ($app) {
            return new FinancialService($app->make('App\Repositories\FinancialRepositoryInterface'));
        });
    }
}
