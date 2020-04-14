<?php namespace DigitalArtisan\Enseignement\Models;

use Model;
use Request;

/**
 * Model
 */
class SuiviEnseignant extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_suivi_enseignants';

    protected $appends = ['nom_enseignant'];
    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'enseignant'    => ['DigitalArtisan\Enseignement\Models\Enseignant',
                   'key' => 'enseignant_id'],
                   
    ];   

#'order' => 'nom'], 

    public function getnomEnseignantAttribute() {

        if ($this->enseignant_id) {
            return  $this->enseignant['prenom'] . ' ' . $this->enseignant['nom'];
        } else {
            return $this->prenom.' '. $this->nom ;
        }
    }


   public function getEnseignantOptions($value, $formData)
   {

        # renvoie la liste des enregistrement actifs (ou les softedeleted si c'est l'enregistrement actif)
        # ATTENTION : les champs de la fonction $value et $fieldname sont inversés selon le mode d'emploi !

        
        $result = Enseignant::withTrashed()->actifs()->where('deleted_at', NULL)->
            orWhere(function ($q) use ($value) {
                $q->where('id',$value);
            })->get()->pluck('full_name', 'id');

        # $data = Request::segment(6);
        # $sessionKey = uniqid('session_key', true);
        # $data = $sessionKey;

        # Read value from session (see update.htm)
            
        $parent_id = request::session()->get('parent_id');

        #  \Log::info($data. ' - ' . $value .' - '. $formData);
        return $result;
   }

}
