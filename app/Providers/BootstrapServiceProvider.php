<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Services\Interfaces\ClubServiceInterface::class, \App\Services\ClubService::class);
        $this->app->bind(\App\Services\Interfaces\PlayerServiceInterface::class, \App\Services\PlayerService::class);
        $this->app->bind(\App\Services\Interfaces\CoachServiceInterface::class, \App\Services\CoachService::class);
        $this->app->bind(\App\Services\Interfaces\AdminServiceInterface::class, \App\Services\AdminService::class);
        //:end-bindings:
    }
}
