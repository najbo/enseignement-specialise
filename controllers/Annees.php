<?php namespace DigitalArtisan\Enseignement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
#use BackendAuth;
use Flash;
use Redirect;

use DigitalArtisan\Enseignement\Models\EleveHistorique;
use DigitalArtisan\Enseignement\Models\Annee;
use DigitalArtisan\Enseignement\Models\Programme;

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

            if ($this->user->isSuperUser() || $this->user->hasAccess('digitalartisan.enseignement.can_bouclement')) {

                $saveNouvelHistorique = '';

                // On charge les informations sur l'année actuelle
                $annee = $this->formFindModelObject($recordId);

                // L'année actuelle est déjà bouclée ? 
                if (!empty($annee->bouclement))
                {
                    Flash::error("La période actuelle ". $annee->designation ." est déjà bouclée"); 
                    return;               

                }


                // On contrôle si l'annnée précédente est bouclée
                $anneePrecedente = Annee::where('anneesuivante_id', $recordId)->first();
                $anneeSuivante = Annee::where('id', $annee->anneesuivante_id)->first();


                // L'année contient-elle une prochaine période ?
                if (empty($annee->anneesuivante_id))
                {
                    Flash::error("La période ". $annee->designation ." ne peut pas encore être bouclée parce qu'il n'y a pas de période suivante indiquée !"); 
                    return;               
                }  


                // Si l'année précdente n'est pas bouclée ou que ce n'est pas la première période, on arrête le traitement
                if (!(!$anneePrecedente || !is_null($anneePrecedente->bouclement)))
                {
                    Flash::error("La période précédente ". $anneePrecedente->designation ." n'est pas bouclée"); 
                    return;  
                }     

                

                // Filtrage de l'historique des années pour la période actuelle qu'on veut boucler
                $historiques = EleveHistorique::where('annee_id', $recordId)->get();

                #Flash::error("Terminé : ".$historiques->count()); 
                #return;

                if ($historiques->count() != 0) {
                    foreach ($historiques as $historique) {

                        $controleHistorique = EleveHistorique::where('eleve_id', $historique->eleve_id)->where('annee_id', $annee->anneesuivante_id)->count();

                        // On vérifie si cet élève a déjà la nouvelle année dans son historiqu
                        if ($controleHistorique == 0) {
                            $nouvelHistorique = new EleveHistorique;

                            // Inscription des nouvelles données (1/2) d'historique
                            $nouvelHistorique->eleve_id = $historique->eleve_id;
                            $nouvelHistorique->annee_id = $annee->anneesuivante_id;
                            

                            // Conditions selon les critères de fin d'année (types de passagse) :
                            // 1 = promu
                            // 2 = redouble
                            // 3 = saute une année
                            // 4 = fin d'école ou sortie

                                // L'élève est promu et passe à un programme suivant
                                if ($historique->passage_id == 1) {
                                    
                                    $nouvelHistorique->programme_id = Programme::where('id', $historique->programme_id)->first()->programmesuivant_id;

                                    # $nouvelHistorique->ecole_id = Programme::where('programmesuivant_id', $historique->programme_id)->first()->ecole_id;

                                    $saveNouvelHistorique = true;
                                }

                                // L'élève redouble et refait le même programme
                                if ($historique->passage_id == 2) {
                                    
                                    $nouvelHistorique->programme_id = $historique->programme_id;
                                    # $nouvelHistorique->ecole_id = $historique->programme_id;
                                    $saveNouvelHistorique = true;
                                }                            

                                // L'élève saute une année et passe au programme supérieur
                                if ($historique->passage_id == 3) {
                                    
                                    # \Log::info($historique->programmesuivant_id);
                                    /*
                                    if (!empty( $historique->programmesuivant_id)) {
                                        $nouvelHistorique->programme_id = Programme::where('id', $historique->programmesuivant_id))->first()->programmesuivant_id;
                                        }
                                    */

                                    $saveNouvelHistorique = true;
                                }                            

                                // L'élève sort de l'école
                                if ($historique->passage_id == 4) {
                                    
                                    $saveNouvelHistorique = false;

                                    // Dans ce cas, on indique encore la date de fin sur eleve>fin
                                }   

                                // L'élève fait une pause
                                if ($historique->passage_id == 5) {
                                    
                                    $saveNouvelHistorique = true;
                                }                            


                            if ($saveNouvelHistorique == true) {

                                $nouvelHistorique->debut =  $anneeSuivante->debut;
                                $nouvelHistorique->fin =  $anneeSuivante->fin;
                                
                                $nouvelHistorique->save();

                                \Log::info("Ajout d'une nouvelle année d'historique ". $nouvelHistorique->annee->designation." pour l'élève ".$historique->eleve->fullname);  
                                }

                        } else {
                            \Log::info("La nouvelle année d'historique pour l'élève ".$historique->eleve->fullname. " n'as pas été ajoutée ; elle existait déjà.");
                        }

                    }

                    // On note le résultat sur l'année concernée et on la boucle.
                    $this->bouclerAnnee($annee);
                    

                    Flash::success("Bouclement terminé ! Nous avons traité ". $historiques->count() ." enregistrements pour l'année " .$annee->designation);

                     return Redirect::refresh();
                } else {

                    Flash::error("Aucun enregistrement trouvé dans les historiques des élèves pour l'année ".$annee->designation.".");
                    return;
                }
            }
        }    
    public function bouclerAnnee($annee)
    {
        $annee->bouclementMaintenant();  // Inscription de la date de bouclement dans le champ bouclement
        $annee->inscriptionGestionnaire(); // Inscription du gestionnaire qui a fait le bouclement
        $annee->save();
    }
}
