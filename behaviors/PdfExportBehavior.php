<?php namespace DigitalArtisan\Enseignement\Behaviors;

use Backend\Classes\ControllerBehavior;
use Config;
use Exception;
use October\Rain\Exception\ApplicationException;
use DigitalArtisan\Enseignement\Models\Eleve;
use DigitalArtisan\Enseignement\Models\Enseignant;
use Renatio\DynamicPDF\Classes\PDF;
use Response;
use Str;
use Log;
use URL;

class PdfExportBehavior extends ControllerBehavior
{
    

    protected $parent;

    public function __construct($parent)
    {
        $this->parent = $parent;
    }


    public function exports()
    {

        $documents = []; #Valeurs d'entête du document
        $documents['title'] = 'Titre';


        $lists = $this->parent->makeLists();
        $widget = reset($lists);

        /* Add headers */
        $headers = [];
        $columns = $widget->getVisibleColumns();
        foreach ($columns as $column) {
            #if ($column->label !== 'Export') {
            if ($column->cssClass !== 'nopdf') {
                $headers[] = \Lang::get($column->label);
            }
        }

        /* Add records  ; geConfig has to be set to True if UTF-8 parsing errors */
        $getter = $this->getConfig('export[useList][raw]', true)
            ? 'getColumnValueRaw'
            : 'getColumnValue';

        #$model = $widget->prepareModel();
        $model = $widget->prepareQuery();
        $results = $model->get();
        $records = [];
        foreach ($results as $result) {
            $record = [];
            foreach ($columns as $column) {

                #if ($column->label !== 'Export') {
                if ($column->cssClass !== 'nopdf') {
                
                    $value = $widget->$getter($result, $column);
                    if (is_array($value)) {
                        $value = implode('|', $value);
                }
                $record[] = $value;

                }

            }
            $records[] = $record;
        }

       
        #$test = array_map("utf8_encode", $records);
        
        $documents['title'] = URL::current();
        $documents['title'] = $this->parent->pageTitle;

        # Log::info($records);

        $documents = $model->getModel()->documents;


        return PDF::loadTemplate('digitalartisan.enseignement::pdf.liste_générique',
            ['documents' => $documents, 'headers' => $headers, 'records' => $records])->stream('export.pdf');
    }    


    public function pdf($id)
    {
        $eleve = Eleve::find($id);
        if ($eleve === null) {
            throw new ApplicationException('Elève non trouvé.');
        }

        $templateCode = 'digitalartisan.enseignement::pdf.detail_eleve';
        #$templateCode = 'enseignement:eleve';

        $filename = 'eleve_'.Str::slug($eleve->nom . '-' . $eleve->prenom) . '.pdf';

        try {


            $options = [
                'logOutputFile' => storage_path('temp/log.htm'),
            ];

            return 
                PDF::loadTemplate($templateCode, compact('eleve'))
                ->setOptions($options)
                ->stream();
                #->download($filename);

        } catch (Exception $e) {
            throw new ApplicationException($e->getMessage());
        }
    }

}
