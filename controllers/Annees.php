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
            // On cherche des informations sur l'année actuelle
            $annee = $this->formFindModelObject($recordId);

            // L'année actuelle est déjà bouclée ? 
            if (!empty($annee->bouclement))
            {
                Flash::error("La période actuelle ". $annee->designation ." est déjà bouclée"); 
                return;               

            }
            // On contrôle si l'annnée précédente est bouclée
            $anneePrecedente = Annee::where('anneesuivante_id', $recordId)->first();

            // Si l'année précdente n'est pas bouclée ou que ce n'est pas la première période, on arrête le traitement
            if (!(!$anneePrecedente || !is_null($anneePrecedente->bouclement)))
            {
                Flash::error("La période précédente ". $anneePrecedente->designation ." n'est pas bouclée"); 
                return;  
            }   

            

            // Filtrage de l'historique des années pour la période actuelle qu'on veut boucler
            $historiques = EleveHistorique::where('annee_id', $recordId)->get();
            $nouvelHistorique = new EleveHistorique;

            if ($historiques->count() != 0) {
                foreach ($historiques as $historique) {
                    $nouvelHistorique->eleve_id = $historique->eleve_id;
                    $nouvelHistorique->annee_id = $annee->anneesuivante_id;
                    $nouvelHistorique->save();
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
