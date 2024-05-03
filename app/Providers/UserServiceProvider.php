<?php

namespace App\Providers;


use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make('App\Repositories\UserRepositoryInterface'));
        });
    }
}
