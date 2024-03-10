<?php
namespace App\Providers;

use App\Repositories\PaymentRepository;
use App\Repositories\PaymentRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class PaymentRepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
    }
}
