<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

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

}
