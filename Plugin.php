<?php namespace DigitalArtisan\Enseignement;

use System\Classes\PluginBase;
use BackendAuth;
use App;
use Event;

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
       $backend_user = BackendAuth::getUser();

        // Ajout de la feuille de style style.css du plugin au moment du démarrage pour certains styles spécifiques au plugin :

        // Check if we are currently in backend module.
        if (!App::runningInBackend()) {
            return;
        }

        // Listen for `backend.page.beforeDisplay` event and inject js to current controller instance.
        Event::listen('backend.page.beforeDisplay', function($controller, $action, $params) {
            $controller->addCss('/plugins/digitalartisan/enseignement/assets/css/style.css', 'DigitalArtisan.Enseignement');
        });

    }    
}
