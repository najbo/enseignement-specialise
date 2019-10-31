<?php namespace DigitalArtisan\Enseignement;

use System\Classes\PluginBase;
use BackendAuth;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        $user = BackendAuth::getUser();
    }    
}
