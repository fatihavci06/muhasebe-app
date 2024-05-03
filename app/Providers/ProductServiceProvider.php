<?php

namespace App\Providers;

use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService($app->make('App\Repositories\ProductRepositoryInterface'));
        });
    }
}
