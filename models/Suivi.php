<?php namespace DigArt\Ecole\Models;

use Model;
use Flash;
use BackendAuth;
use Carbon\Carbon;


/**
 * Model
 */
class Suivi extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'deleted_at'];

    protected $appends = ['statutsuivi'];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_suivis';

    /**
     * @var array Validation rules
     */

    public $rules = [
        'eleve_id' => 'required',        
        'debut' => 'required'
    ];

    public $customMessages = [
        'eleve_id.required' => "Pssst ... il faut sélectionnier un élève avant d'enregistrer ;-)",
    ];


    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];

    public $belongsTo = [
        'eleve'    => ['DigArt\Ecole\Models\Eleve',
                'key' => 'eleve_id',
                'order' => 'nom'],
        'statut'    => ['DigArt\Ecole\Models\Statut',
               'key' => 'statut_id',
               'order' => 'sort_order'],                   
        'gestionnaire'    => ['DigArt\Ecole\Models\Gestionnaire',
               'key' => 'gestionnaire_id',
               'order' => ['last_name', 'first_name']], 
    ];

    public $belongsToMany = [
        'pathologies' => [
            'DigArt\Ecole\Models\Pathologie',
            'table' => 'digart_ecole_path_suivi',
            'key' => 'suivi_id',
            'otherKey' => 'path_id',
            'softDelete' => true,
            'order' => 'sort_order']
    ];
   
    public $hasMany = [
         'activites' => ['DigArt\Ecole\Models\SuiviActivite', 'key' => 'suivi_id', 'order' => 'debut asc', 'softDelete' => true],
         'enseignants' => ['DigArt\Ecole\Models\SuiviEnseignant', 'key' => 'suivi_id', 'order' => 'debut desc', 'softDelete' => true]       
    ]; 


    # Variable pour la liste d'impression PDF ; titre pour la liste générique
    public $pdf_headers = [
        'title' => 'Liste des suivis',
        ];


      // Valeur par défaut pour le gestionnaire lors de la création d'une nouvelle activité. On prend l'utilisateur connecté.    
      public function __construct(array $attributes = array())
      {
            if (BackendAuth::check()) {
                $this->setRawAttributes(['gestionnaire_id' => BackendAuth::getUser()->id], true);
                parent::__construct($attributes);
            }
      }


    public function getFullNameAttribute() {
        return $this->id.' - ' .$this->designation;
    }  


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



    public function getFilterAttribute() {
        $prefix = '';
        $suffix = '';
        $prefix =  '#'. $this->id.' { '. $this->eleve->prenom . ' ' .$this->eleve->nom . ' | ' .$this->datedebut;

        if ($this->designation)
        {
            $suffix = ' | '.$this->designation;
        }

        return $prefix . $suffix .' }';
    }  

    public function getDateDebutAttribute() {
        return $this->debut->format('d.m.y');
    }

    public function getIdElevesOptions() {

        $result = Suivi::orderBy('id')->get()->pluck('Filter', 'id')->toArray();          
        return $result;
    } 

    public function getStatutSuiviAttribute() {
        return $this->designation;
    }

    public function scopeOuverts($query){
       #return $query->where('eleve_id', '<>', 1);

      $isFinished = false;
      $query->whereHas('statut', function ($q) use ($isFinished) {
        $q->where('is_finished', $isFinished);
    })
    ->get();
    }
}
