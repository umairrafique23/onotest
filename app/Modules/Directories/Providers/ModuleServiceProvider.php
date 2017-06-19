<?php

namespace App\Modules\Directories\Providers;

use App\Modules\Directories\Models\Field;
use App\Modules\Directories\Observers\FieldObserver;
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'directories');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'directories');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'directories');
        Field::observe(FieldObserver::class);

        $admin = Menu::get('admin');
        $admin->add('Browse', '#')->icon('folder-open-o')->data('order',1);
        $admin->browse->add('Manage Articles',route('articles.index'));

        $directories = $admin->add('Setup Directories', '#')->icon('folder-open-o')->data('order',2);
        $directories->add('Directories Manager', route('directories.index'))->icon('folder-open')->data('order',1);
        $directories->add('Categories Manager', route('categories.index'))->icon('clone')->data('order',2);

        

        $directories->add('Fields Manager', route('fields.index'))->icon('database')->data('order',3);


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
