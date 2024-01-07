<?php
namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Repositories\FinancialRepository;
use App\Repositories\FinancialRepositoryInterface;

class FinancialRepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(FinancialRepositoryInterface::class, FinancialRepository::class);
    }
}
