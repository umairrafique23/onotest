<?php

namespace App\Providers;


use App\Observers\SettingObserver;
use App\Setting;
use Illuminate\Support\ServiceProvider;
use Menu;
use Caffeinated\Menus\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //dd('Calling Fields from Boot');



        Menu::make('admin', function(Builder $menu) {

        })->sortBy('order');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
