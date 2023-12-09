<?php
namespace App\Providers;

use App\Repositories\CustomerRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CustomerRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
    }
}
