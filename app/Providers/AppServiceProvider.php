<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blueprint::macro('auditable', function (){
            $this->uuid('created_by')
                ->nullable()
                ->index();
            $this->uuid('updated_by')
                ->nullable()
                ->index();
        });
    }
}
