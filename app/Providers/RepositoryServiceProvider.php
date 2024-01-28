<?php

namespace App\Providers;

use App\Repositories\Contracts\VideoRepositoryInterface;
use App\Repositories\EloquentVideoRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VideoRepositoryInterface::class, EloquentVideoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
