<?php
namespace App\Providers;

use App\Repositories\BankRepository;
use App\Repositories\BankRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\FinancialRepository;
use App\Repositories\FinancialRepositoryInterface;

class BankRepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(BankRepositoryInterface::class, BankRepository::class);
    }
}
