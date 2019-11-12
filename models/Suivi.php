<?php namespace DigitalArtisan\Enseignement\Models;

use Model;
use Flash;
use BackendAuth;

/**
 * Model
 */
class Suivi extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_suivi';

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
        'eleve'    => ['DigitalArtisan\Enseignement\Models\Eleve',
                   'key' => 'eleve_id',
                   'order' => 'nom'],
        'statut'    => ['DigitalArtisan\Enseignement\Models\Statut',
               'key' => 'statut_id',
               'order' => 'sort_order'],                   
        'gestionnaire'    => ['DigitalArtisan\Enseignement\Models\Gestionnaire',
               'key' => 'gestionnaire_id',
               'order' => ['last_name', 'first_name']], 
    ];

    public $belongsToMany = [
        'pathologies' => [
            'DigitalArtisan\Enseignement\Models\Pathologie',
            'table' => 'digitalartisan_enseignement_path_suivi',
            'key' => 'suivi_id',
            'otherKey' => 'path_id',
            'order' => 'sort_order']
    ];
   
    public $hasMany = [
         'activites' => ['DigitalArtisan\Enseignement\Models\SuiviActivite', 'key' => 'suivi_id', 'order' => 'debut asc'],
         'enseignants' => ['DigitalArtisan\Enseignement\Models\SuiviEnseignant', 'key' => 'suivi_id', 'order' => 'debut desc'] 
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

}
