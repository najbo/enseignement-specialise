<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Flash;
use Log;
use Redirect;
use Str;
#use BackendAuth;
use Config;
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


    /**
     * Strike out deleted records
     */
    public function listInjectRowClass($record, $definition = null)
    {
        if ($record->trashed()) {
            return 'strike';
        }
    }


    /**
     * Extends the form query to prevent non-superusers from accessing trashed records
     */
    public function formExtendQuery($query)
    {
        #$user = BackendAuth::getUser();

        if ($this->user->isSuperUser() || $this->user->hasAccess('digitalartisan.enseignement.can_restore')) {
            #$query->where('is_superuser', false);
        
            // Ensure soft-deleted records can still be managed
            $query->withTrashed();
        }
    }


    /**
     * Prevents non-superusers from even seeing the Show trashed records filter
     */
    public function listFilterExtendScopes($filterWidget)
    {
        #$user = BackendAuth::getUser();

        if (! ($this->user->isSuperUser() || $this->user->hasAccess('digitalartisan.enseignement.can_restore'))) {
            $filterWidget->removeScope('show_deleted');
        }
    }

    /**
     * Enregistre la valeur de l'ID pour être utilisé plus tard
     */
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

    /**
     * Handle restoring users
     */
    public function update_onRestore($recordId)
    {
        $this->formFindModelObject($recordId)->restore();

        # Enregistrement restauré avec succès
        Flash::success(e(trans('digitalartisan.enseignement::lang.eleve.restored')));

        return Redirect::refresh();
    }


    /**
     * Fonction pour générer un fichier PDF détaillé d'un élève
     * La fonction pdf dans behaviers\PdfExpertBehaviors n'est pas utilisée
     */
    public function pdf($id)
    {

        # On remplit la variable $user avec les données de l'utilisateur actuellement connecté
        $user = $this->user;

        $eleve =  $this->formFindModelObject($id);
        if ($eleve === null) {
            throw new ApplicationException('Elève non trouvé.');
        }

        $templateCode = 'digitalartisan.enseignement::pdf.detail_eleve';
        #$templateCode = 'enseignement:eleve';

        $filename = Str::slug('eleve '. $eleve->nom . ' ' . $eleve->prenom) . '.pdf';

        try {


            $options = [
                'logOutputFile' => storage_path('temp/log.htm'),
            ];

            return 
                #PDF::loadTemplate($templateCode, compact('eleve'))
                PDF::loadTemplate($templateCode, compact('user', 'eleve'))
                ->setOptions($options)
                ->stream();
                #->download($filename);

        } catch (Exception $e) {
            throw new ApplicationException($e->getMessage());
        }
    }


    /**
     * Fonction pour générer un fichier PDF via AJAX
     *
     * Avantage : stocke le fichier PDF dans le dossier public et la fonctionn est accessible avec CTRL-P par exemple (voir update.htm)
     * Inconvénient : le fichier PDF est visible par tous sur le serveur 
     */
    public function onPreviewDownload()
        {

            $templateCode = 'renatio::invoice'; // unique code of the template
            $storagePath =  storage_path('app/uploads/');
            $pdf_file_name =  'regency-brochure-test.pdf' ;
            $pdf_file_name_directory =  $storagePath . $pdf_file_name;
            PDF::loadTemplate($templateCode)->setPaper('a4', 'landscape')->save($pdf_file_name_directory);
            return $baseUrl = url(Config::get('cms.storage.uploads.path')) . '/' . $pdf_file_name;

        }


}
