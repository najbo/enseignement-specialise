<?php namespace DigArt\Ecole\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Renatio\DynamicPDF\Classes\PDF;
use Log;
use Str;

class Suivis extends Controller
{
    public $implement = [       'Backend\Behaviors\ListController',
                                'Backend\Behaviors\FormController',
                                'Backend.Behaviors.RelationController',
                                'DigArt\Ecole\Behaviors\PdfExportBehavior'
                        ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'digart.ecole.suivis' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigArt.Ecole', 'protocoles', 'suivi');
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

        $templateCode = 'digart.ecole::pdf.liste_suivis';
        $options = [
                'logOutputFile' => storage_path('temp/log.htm'),
        ];

        return 
                PDF::loadTemplate($templateCode, compact('user','pdf_headers', 'records'))
                ->setOptions($options)
                ->stream();

        // Original :
        #return PDF::loadTemplate('digart.ecole::pdf.liste_suivis', compact('user','pdf_headers', 'records'))->stream('export.pdf');
    } 



    /**
     * Fonction pour générer un fichier PDF détaillé d'un élève
     * La fonction pdf dans behaviers\PdfExpertBehaviors n'est pas utilisée
     */
    public function pdf($id)
    {

        # On remplit la variable $user avec les données de l'utilisateur actuellement connecté
        $user = $this->user;

        $suivi =  $this->formFindModelObject($id);
        if ($suivi === null) {
            throw new ApplicationException('Fiche non trouvée.');
        }

        $templateCode = 'digart.ecole::pdf.detail_suivi';

        $filename = Str::slug('suivi '.$suivi->id . ' ' . $suivi->eleve->nom .' ' . $suivi->eleve->prenom) . '.pdf';

        try {


            $options = [
                'logOutputFile' => storage_path('temp/log.htm'),
            ];

            return 
                PDF::loadTemplate($templateCode, compact('user', 'suivi'))
                ->setOptions($options)
                ->stream();
                #->download($filename);

        } catch (Exception $e) {
            throw new ApplicationException($e->getMessage());
        }
    }



}
