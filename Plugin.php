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


/** Modification de l'ordre des menus **/

    
\Event::listen('backend.menu.extendItems', function ($manager) {
        $manager->addMainMenuItems('October.Backend', [
            'dashboard' => [
                'order' => '1'
            ]
        ]);
        $manager->addMainMenuItems('October.Cms', [
            'cms' => [
                'order' => '2'
            ]
        ]);
        $manager->addMainMenuItems('October.Backend', [
            'media' => [
                'order' => '3'
            ]
        ]);
       $manager->addMainMenuItems('RainLab.Builder', [
            'builder' => [
                'order' => '500'
            ]
        ]);
        $manager->addMainMenuItems('Panakour.Backup', [
            'Backup' => [
                'order' => '600'
            ]
        ]);
    });

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


    // Permet de synchroniser les fichiers de templates et layouts vers la base de données (et que dans ce sens)
    public function registerPDFTemplates()
    {
        return [
            'digitalartisan.enseignement::pdf.liste_eleves',
            'digitalartisan.enseignement::pdf.liste_generique',
            'digitalartisan.enseignement::pdf.liste_suivis',

             'digitalartisan.enseignement::pdf.detail_eleve',
             'digitalartisan.enseignement::pdf.detail_suivi',
        ];
    }

    public function registerPDFLayouts()
    {
        return [
            'digitalartisan.enseignement::pdf.layouts.default',
        ];
    }

}
