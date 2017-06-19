<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertSetting('Website Title','title','Ono','Site','text','The title of the web page to show on frontend');
        $this->insertSetting('Website Tagline','tagline','A Laravel Powered CMS+Directory System','Site','textarea');
        $this->insertSetting('Email','email','usman.akram@gmail.com','Site');

        $this->insertSetting('Records Per Page','perpage','10','Directory');
    }

    private function insertSetting($title,$key,$value,$prefix,$input_type='text',$description='',$editable=1)
    {
        $setting = new \App\Modules\Settings\Models\Setting();
        $setting->title = $title;
        $setting->key = $key;
        $setting->value = $value;
        $setting->prefix = $prefix;
        $setting->description = $description;
        $setting->input_type = $input_type;
        $setting->editable = $editable;
        $setting->save();
    }
}
