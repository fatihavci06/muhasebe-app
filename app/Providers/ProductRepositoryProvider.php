<?php
namespace App\Providers;

use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class ProductRepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }
}
