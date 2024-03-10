<?php

namespace App\Providers;


use App\Services\InvoiceService;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(InvoiceService::class, function ($app) {
            return new InvoiceService($app->make('App\Repositories\InvoiceRepositoryInterface'));
        });
    }
}
