<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class SuivisActivites extends Controller
{
    public $implement = [   'Backend\Behaviors\ListController',
                            'Backend\Behaviors\FormController',
                            'DigitalArtisan\Enseignement\Behaviors\PdfExportBehavior'

                        ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'digitalartisan.enseignement.suivis' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigitalArtisan.Enseignement', 'protocoles', 'activites');
        #$this->addCss('/plugins/digitalartisan/enseignement/assets/css/style.css', 'DigitalArtisan.Enseignement');
    }
}
