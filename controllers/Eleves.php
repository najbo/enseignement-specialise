<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Flash;
use BackendAuth;
#use Renatio\DynamicPDF\Classes\PDF;
use Renatio\DynamicPDF\Classes\PDFWrapper;

class Eleves extends Controller
{
    public $implement = [       'Backend\Behaviors\ListController',
                                'Backend\Behaviors\FormController',
                                'Backend.Behaviors.RelationController',
                                'DigitalArtisan\Enseignement\Behaviors\PdfExportBehavior'
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
            # Bouton PDF en haut de la table des élèves
            
            # Flash::error("DO NOT CLICK THIS BUTTON!");

            $templateCode = 'renatio::invoice';
            $filename ='test.pdf';

            $pdf = app('dynamicpdf');
            $data = [];

            $options = [
                'logOutputFile' => storage_path('temp/log.htm'),
            ];

            return $pdf
                ->loadTemplate($templateCode, $data)
                ->setOptions($options)
                ->download($filename);
            /*    
            $templateCode = 'renatio::invoice'; // unique code of the template
            $data = ['name' => 'John Doe']; // optional data used in template

            return PDF::loadTemplate($templateCode, $data)->stream();
*/
        }

    public function update($recordId, $context = null)
    {

        #$this->vars['myId'] = $recordId;
        \Session::put('eleve_id',$recordId);
        # Flash::success('Préparation de la variable ID = '.$recordId);
        // Call the FormController behavior update() method
        return $this->asExtension('FormController')->update($recordId, $context);
    }

    public function onRelationPredict($recordId = null)
    {
        $texte = $recordId;
        Flash::success('Hello '.$texte);

    }
}
