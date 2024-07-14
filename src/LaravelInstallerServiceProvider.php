<?php

namespace Bbkdit\LaravelInstaller;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Bbkdit\LaravelInstaller\Http\Middleware\CheckInstallation;

class LaravelInstallerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Load routes from the package
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        // Load views from the package
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'installer');

        // Publish views so they can be customized by the application
        $this->publishes([
            __DIR__.'/Resources/views' => resource_path('views/vendor/installer'),
        ], 'views');

        // Register the middleware
        $this->app[Kernel::class]->pushMiddleware(CheckInstallation::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
