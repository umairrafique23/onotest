<?php

namespace App\Modules\Extensions\Providers;

use Caffeinated\Menus\Facades\Menu;
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'extensions');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'extensions');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'extensions');
        $admin = Menu::get('admin');
        $addon = $admin->add('Add Ons', '#')->icon('folder-open-o')->data('order',800);
        $addon->add('Themes',route('themes.index'));
        $addon->add('Extensions',route('extensions.index'));
        $admin->sortBy('order');
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
