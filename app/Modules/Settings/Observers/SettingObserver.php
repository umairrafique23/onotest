<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 1/6/2017
 * Time: 9:29 AM
 */

namespace App\Modules\Settings\Observers;



use App\Common\SettingsFileLoader;
use App\Modules\Settings\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingObserver
{
    public function saved(Setting $setting)
    {

        foreach(DB::table('settings')->select('prefix')->distinct()->get() as $distinctPrefix){
            $settings = Setting::where('prefix',$distinctPrefix->prefix)->get();
            $loader = new SettingsFileLoader();
            $loader->save($distinctPrefix->prefix,$settings);
        }
    }
}