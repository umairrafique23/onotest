<?php

namespace App\Modules\Users\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'users');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'users');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'users');
        $menu = Menu::get('admin');
        $menu->add('Users', '#')->icon('users')->data('order',997);
        $menu->users->add('Users', route('users.index'))->icon('users')->data('order',777);
        $menu->users->add('Roles', route('roles.index'))->icon('user')->data('order',777);
        $menu->users->add('Permissions', route('permissions.index'))->icon('user')->data('order',777);
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
