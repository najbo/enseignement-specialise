<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Flash;
use Log;
use BackendAuth;
use Renatio\DynamicPDF\Classes\PDF;


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


    public function export()
    {

        $lists = $this->makeLists();
        $widget = reset($lists);

        /* Add headers */
        $headers = [];
        $columns = $widget->getVisibleColumns();
        foreach ($columns as $column) {
            if ($column->label !== 'Export') {
                $headers[] = \Lang::get($column->label);
            }
        }

        /* Add records */
        $getter = $this->getConfig('export[useList][raw]', false)
            ? 'getColumnValueRaw'
            : 'getColumnValue';

        $model = $widget->prepareModel();
        $results = $model->get();
        $records = [];
        foreach ($results as $result) {
            $record = [];
            foreach ($columns as $column) {

                if ($column->label !== 'Export') {
                
                $value = $widget->$getter($result, $column);
                if (is_array($value)) {
                    $value = implode('|', $value);
                }
                $record[] = $value;

                }

            }
            $records[] = $record;
        }
        return PDF::loadTemplate('digitalartisan.enseignement::pdf.liste_eleves',
            ['headers' => $headers, 'records' => $records])->stream('export.pdf');
    }



    public function onPDF()
        {
            # Retiré :
            
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
