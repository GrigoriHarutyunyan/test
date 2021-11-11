<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\ClubRepositoryInterface;
use App\Repositories\ClubRepository;
use App\Repositories\PlayerRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ClubRepository::class,
            ClubRepository::class,
        );
        $this->app->bind(
            PlayerRepository::class,
            PlayerRepository::class,
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
