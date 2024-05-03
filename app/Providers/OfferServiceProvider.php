<?php

namespace App\Providers;

use App\Services\OfferService;
use Illuminate\Support\ServiceProvider;

class OfferServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(OfferService::class, function ($app) {
            return new OfferService($app->make('App\Repositories\OfferRepositoryInterface'));
        });
    }
}
