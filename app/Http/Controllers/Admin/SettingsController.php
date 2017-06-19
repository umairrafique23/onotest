<?php

namespace App\Http\Controllers\Admin;

use App\Common\SettingsFileLoader;
use App\Modules\Admin\Http\Controllers\AdminAppController;
use App\Modules\Settings\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class SettingsController extends AdminAppController
{
    public function prefix($prefix='Site')
    {
        $settings = Setting::where(['prefix'=>$prefix,'editable'=>'1'])->get();
        $this->page_title($prefix.": Settings");
        return view('admin.settings.prefix')->with(compact('settings'));
    }

    public function storePrefix(Request $request)
    {
        foreach($request->settings as $key=>$value){
            $setting = Setting::where('key',$key)->first();
            $setting->value = $value;
            $setting->save();
        }
        return redirect(route('settings.prefix',$setting->prefix));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingsLoader = new SettingsFileLoader();
        $settings = Setting::where('prefix','Site')->get();
        //return $settingsLoader->save('Site',$settings);
        return Config::get('Site.title');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
