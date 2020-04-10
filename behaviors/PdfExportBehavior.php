<?php namespace DigitalArtisan\Enseignement\Behaviors;

use Backend\Classes\ControllerBehavior;
use Config;
use Exception;
use October\Rain\Exception\ApplicationException;
use DigitalArtisan\Enseignement\Models\Eleve;
use Renatio\DynamicPDF\Classes\PDF;
use Response;
use Str;

class PdfExportBehavior extends ControllerBehavior
{
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
