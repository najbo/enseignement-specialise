<?php namespace DigitalArtisan\Enseignement\Models;

use Model;
use BackendAuth;

/**
 * Model
 */
class SuiviActivite extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['date', 'debut', 'fin', 'prochaineecheance', 'deleted_at'];
  
    #public $attributes = [
    #  'gestionnaire_id' => 2,
    #];
    
    #protected $appends = ['gestionnaire_id'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_suivi_activites';

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
        'therapie'    => ['DigitalArtisan\Enseignement\Models\Therapie',
                   'key' => 'therapie_id',
                   'order' => 'sort_order'],
        'interlocuteur'    => ['DigitalArtisan\Enseignement\Models\Interlocuteur',
                   'key' => 'interlocuteur_id',
                   'order' => 'nom', 'prenom'],        
        'type'    => ['DigitalArtisan\Enseignement\Models\Type',
                   'key' => 'type_id',
                   'order' => 'sort_order'],
        'gestionnaire'    => ['DigitalArtisan\Enseignement\Models\Gestionnaire',
               'key' => 'gestionnaire_id',
               'order' => ['last_name', 'first_name']],       
        'statut'    => ['DigitalArtisan\Enseignement\Models\ActiviteStatut',
                   'key' => 'statut_id',
                   'order' => 'sort_order'],                           
        'suivi'    => ['DigitalArtisan\Enseignement\Models\Suivi',
                   'key' => 'suivi_id',
                   'order' => ''],                   
    ];    


public function getGestionnaireAttribute()
{
   #return $this->exists ?: BackendAuth::getUser();
   return BackendAuth::getUser();
  }
    
}
