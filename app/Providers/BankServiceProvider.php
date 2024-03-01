<?php

namespace App\Providers;

use App\Services\BankService;
use Illuminate\Support\ServiceProvider;

class BankServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(BankService::class, function ($app) {
            return new BankService($app->make('App\Repositories\BankRepositoryInterface'));
        });
    }
}
