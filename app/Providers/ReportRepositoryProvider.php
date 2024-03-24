<?php
namespace App\Providers;

use App\Models\Report;
use App\Repositories\ReportRepository;
use App\Repositories\ReportRepositoryInterface;
use Illuminate\Support\ServiceProvider;


class ReportRepositoryProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(ReportRepositoryInterface::class, ReportRepository::class);
    }
}
