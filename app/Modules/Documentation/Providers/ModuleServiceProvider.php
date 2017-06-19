<?php

namespace App\Modules\Documentation\Providers;

use Caffeinated\Modules\Support\ServiceProvider;
use Menu;
use Caffeinated\Menus\Builder;
class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'documentation');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'documentation');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'documentation');
        $menu = Menu::get('admin');
        $menu->add('Documentation', route('admin.documentation'))->icon('book')->data('order',999);

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
