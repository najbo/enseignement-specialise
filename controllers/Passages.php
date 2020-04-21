<?php namespace DigArt\Ecole\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Passages extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public $requiredPermissions = [
        'digart.ecole.passages' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigArt.Ecole', 'structures', 'passages');
    }
}
