<?php namespace DigArt\Ecole\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class SuivisActivites extends Controller
{
    public $implement = [   'Backend\Behaviors\ListController',
                            'Backend\Behaviors\FormController',
                            'DigArt\Ecole\Behaviors\PdfExportBehavior'

                        ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'digart.ecole.suivis' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigArt.Ecole', 'protocoles', 'activites');
        #$this->addCss('/plugins/digart/ecole/assets/css/style.css', 'DigArt.Ecole');
    }
}
