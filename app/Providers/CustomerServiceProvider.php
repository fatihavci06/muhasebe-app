<?php

namespace App\Providers;

use App\Services\CustomerService;
use Illuminate\Support\ServiceProvider;

class CustomerServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(CustomerService::class, function ($app) {
            return new CustomerService($app->make('App\Repositories\CustomerRepositoryInterface'));
        });
    }
}
