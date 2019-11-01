<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Flash;
use Renatio\DynamicPDF\Classes\PDF;

class Eleves extends Controller
{
    public $implement = [       'Backend\Behaviors\ListController',
                                'Backend\Behaviors\FormController',
                                'Backend.Behaviors.RelationController'
                            ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'digitalartisan.enseignement.eleves' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigitalArtisan.Enseignement', 'ressources-humaines', 'eleves');
    }

    public function onPDF()
        {
            // Flash::error("DO NOT CLICK THIS BUTTON!");
            $templateCode = 'renatio::invoice'; // unique code of the template
            $data = ['name' => 'John Doe']; // optional data used in template

           // return PDF::loadTemplate($templateCode, $data)->stream('download.pdf');

            return PDF::loadTemplate('renatio::invoice')
    ->stream();

        }
}
