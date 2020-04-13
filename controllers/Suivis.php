<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Suivis extends Controller
{
    public $implement = [       'Backend\Behaviors\ListController',
                                'Backend\Behaviors\FormController',
                                'Backend.Behaviors.RelationController'
                        ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'digitalartisan.enseignement.suivis' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigitalArtisan.Enseignement', 'protocoles', 'suivi');
    }


}
