<?php
namespace App\Providers;

use App\Repositories\OfferRepository;
use App\Repositories\OfferRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class OfferRepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(OfferRepositoryInterface::class, OfferRepository::class);
    }
}
