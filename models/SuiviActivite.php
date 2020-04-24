<?php namespace DigArt\Ecole\Models;

use Model;
use BackendAuth;
use Log;

/**
 * Model
 */
class SuiviActivite extends Model
{

    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['date', 'debut', 'fin', 'prochaineecheance', 'deleted_at'];
    
    protected $appends = ['full_name', 'mesure_evolution'];
    /*    
    public $attributes = [
      'resume' => 2,
      ];
    */    

  // Valeur par défaut pour le gestionnaire lors de la création d'une nouvelle activité. On prend l'utilisateur connecté.    
  public function __construct(array $attributes = array())
  {
      if (BackendAuth::check()) {
        $this->setRawAttributes(['gestionnaire_id' => BackendAuth::getUser()->id], true);
        parent::__construct($attributes);
      }
  }



    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_suivis_activ';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'debut' => 'required',
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];

    public $belongsTo = [
        'therapie'    => ['DigArt\Ecole\Models\Therapie',
                   'key' => 'therapie_id',
                   'order' => 'sort_order'],
         'evolution'    => ['DigArt\Ecole\Models\Evolution',
                   'key' => 'evolution_id',
                   'order' => 'sort_order'],                       
        'interlocuteur'    => ['DigArt\Ecole\Models\Interlocuteur',
                   'key' => 'interlocuteur_id',
                   'order' => 'nom', 'prenom'],        
        'type'    => ['DigArt\Ecole\Models\Type',
                   'key' => 'type_id',
                   'order' => 'sort_order'],
        'gestionnaire'    => ['DigArt\Ecole\Models\Gestionnaire',
               'key' => 'gestionnaire_id',
               'order' => ['last_name', 'first_name']],       
        'statut'    => ['DigArt\Ecole\Models\StatutActivite',
                   'key' => 'statut_id',
                   'order' => 'sort_order'],                           
        'suivi'    => ['DigArt\Ecole\Models\Suivi',
                   'key' => 'suivi_id',
                   'order' => '']                                
    ];    
 

    public $belongsToMany = [
        'enseignants' => [
            'DigArt\Ecole\Models\Enseignant',
            'table' => 'digart_ecole_suivis_activ_ens',
            'key' => 'activite_id',
            'otherKey' => 'enseignant_id'],
        'proches' => [
            'DigArt\Ecole\Models\Proche',
            'table' => 'digart_ecole_suivis_activ_pro',
            'key' => 'activite_id',
            'otherKey' => 'proche_id'],
    ];


    public function getPeriodesAttribute() {

        $periode = '';
        
        if ($this->debut && $this->fin) {
            $periode = $this->debut->format('d.m.y').' - '. $this->fin->format('d.m.y');
        } 
        if ($this->debut && ! $this->fin) {
            $periode = $this->debut->format('d.m.y');
        }
        
        return $periode;
    }  



    public function getCreatedUpdatedAttribute() {

        $periode = '';
        
        if ($this->created_at && $this->updated_at) {
            $periode = $this->created_at->format('d.m.y').' / '. $this->updated_at->format('d.m.y');
        } 
        
        return $periode;
    }  



    public function getMesureEvolutionAttribute() {
        
      if ($this->therapie && $this->evolution) {
            return $this->therapie->designation . ' (' . $this->evolution->designation .')';
          }

      if ($this->therapie && ! $this->evolution) {

        return $this->therapie->designation;

        }

      if (! $this->therapie && $this->evolution) { 
        
        return '*** ('.$this->evolution->designation .')';
        }     

    } 




    public function getEcheanceSuivanteAttribute() {

        $periode = '';
        
        if ($this->prochaineecheance) {
            $periode = $this->prochaineecheance->format('d.m.y');
        } 
        
        return $periode;
    }


    public function getNextAttribute() {

        $action = '';
        
        if ($this->prochaineecheance && $this->prochaineaction) {
          $action = $this->prochaineaction . ' le ' .$this->prochaineecheance->format('d.m.y');
        } 
        if (!$this->prochaineecheance && $this->prochaineaction) {
          $action = $this->prochaineaction;
        }
        if ($this->prochaineecheance && ! $this->prochaineaction) {
          $action = $this->prochaineecheance->format('d.m.y');
        }

        return $action;
    }

    # Affiche la liste des enseignants dans le menu déroulant des Activités
    public function getEnseignantsOptions($fieldName, $value)
    {
        
        $result = Enseignant::orderBy('nom','prenom')->get()->where('is_actif', true)->pluck('fullname', 'id');
        return $result;
    }

    # Affiche la liste des proches dans le menu déroulant des Activités
    public function getProchesOptions($fieldName, $value)
    {

        #log::info($value);
        $result = Proche::orderBy('prenom','prenom')->get()->where('is_actif', true)->pluck('full_name', 'id');
        return $result;
    }


  public function scopeOuverts($query){
        #$query->where('is_termine',true) ;

        $isFinished = false;
        $query->whereHas('statut', function ($q) use ($isFinished) {
          $q->where('is_finished', $isFinished);
      })
      ->get();
      }

}
