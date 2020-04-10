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
       #$sessionKey = uniqid('session_key', true);
       
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


    public function registerPDFTemplates()
    {
        return [
            'digitalartisan.enseignement::pdf.detail_eleve',
            'digitalartisan.enseignement::pdf.liste_eleves',
        ];
    }

    public function registerPDFLayouts()
    {
        return [
            'digitalartisan.enseignement::pdf.layouts.default',
        ];
    }

}
