<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Renatio\DynamicPDF\Classes\PDF;
use Log;

class Suivis extends Controller
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
        'digitalartisan.enseignement.suivis' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigitalArtisan.Enseignement', 'protocoles', 'suivi');
    }



    public function liste_pdf()
    {

        $user = BackendAuth::getUser();


        $lists = parent::makeLists();
        $widget = reset($lists);


        #$model = $widget->prepareModel();
        $model = $widget->prepareQuery();

        $records = $model->get();


        # Log::info($widget->getSortColumn());

        $pdf_headers = []; #Valeurs d'entête du document
        $pdf_headers = $model->getModel()->pdf_headers;


        # Récupère les filtres
        $filters = [];
        foreach (\Session::get('widget', []) as $name => $item) {
            if (str_contains($name, 'Filter')) {
                $filter = @unserialize(@base64_decode($item));
                if ($filter) {
                    //$filters[] = $filter;
                    array_push($filters, $filter);
                }
            }
        }


        return PDF::loadTemplate('digitalartisan.enseignement::pdf.liste_suivis', compact('user','pdf_headers', 'records'))->stream('export.pdf');
    } 


}
