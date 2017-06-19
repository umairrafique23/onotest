<?php

namespace App\Modules\Settings\Providers;

use App\Modules\Settings\Models\Setting;
use App\Modules\Settings\Observers\SettingObserver;
use Caffeinated\Modules\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'settings');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'settings');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'settings');

        Setting::observe(SettingObserver::class);

        if(Schema::hasTable('settings')){
            $menu = Menu::get('admin');
            $menu->add('Settings', '/')->icon('cogs')->data('order',998);
            $prefixes = DB::table('settings')->select('prefix')->distinct()->get();
            foreach($prefixes as $prefix){
                $menu->settings->add($prefix->prefix, route('settings.prefix',$prefix->prefix))->icon('cog');
            }
        }


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
