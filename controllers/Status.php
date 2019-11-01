<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Status extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'digitalartisan.enseignement.status' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigitalArtisan.Enseignement', 'protocoles', 'status');
    }
}