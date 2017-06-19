<?php

namespace App\Modules\Ono\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'ono');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'ono');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'ono');

        view()->composer('layouts.site','App\Http\ViewComposers\SiteMenuComposer');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
