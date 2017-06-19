<?php
/**
 * Created by PhpStorm.
 * User: Usman
 * Date: 1/6/2017
 * Time: 8:19 AM
 */

namespace App\Common;

class SettingsFileLoader
{
    public function __construct()
    {
        $this->config_path = base_path().DIRECTORY_SEPARATOR.'config';
    }
    private $config_path;
    public function save($prefix,$settings)
    {
        $file = $this->config_path.DIRECTORY_SEPARATOR.$prefix.'.php';
        $settingsToStore = array();
        foreach($settings as $setting)
            $settingsToStore[$setting->key] = $setting->value;
        file_put_contents($file,'<?php  return '.var_export($settingsToStore,true).';');
    }
}