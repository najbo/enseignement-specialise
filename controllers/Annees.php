<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Flash;
use Redirect;

use DigitalArtisan\Enseignement\Models\EleveHistorique;
use DigitalArtisan\Enseignement\Models\Annee;


class Annees extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'digitalartisan.enseignement.annees' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('DigitalArtisan.Enseignement', 'structures', 'annees');
    }

    public function onBouclement($recordId)
        {
            
            #$annee = Annee::where('id', $recordId)->first();
            $annee = $this->formFindModelObject($recordId);

            $historiques = EleveHistorique::where('annee_id', $recordId)->get();
            

            if ($historiques->count() != 0) {
                foreach ($historiques as $historique) {


                }

                $annee->bouclement = now();
                $annee->gestionnaire_id = BackendAuth::getUser()->id;
                $annee->save();

                Flash::success("Bouclement terminé ! Nous avons traité ". $historiques->count() ." enregistrements pour l'année " .$annee->designation);

                 return Redirect::refresh();
            } else {

                Flash::error("Aucun enregistrement trouvé dans les historique historiques des élèves pour cette année à boucler");
                return;
            }
        }    
}
