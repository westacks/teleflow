<?php

namespace App\Providers;

use App\Services\Installer\Install;
use App\Services\Installer\Update;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('app.installer', Install::class);
        $this->app->bind('app.updater', Update::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
