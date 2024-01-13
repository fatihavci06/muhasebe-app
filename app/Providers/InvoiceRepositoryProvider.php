<?php
namespace App\Providers;

use App\Repositories\InvoiceRepository;
use App\Repositories\InvoiceRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class InvoiceRepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
    }
}
