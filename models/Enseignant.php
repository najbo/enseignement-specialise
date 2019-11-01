<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Enseignant extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_enseignants';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'nom' => 'required',
        'prenom' => 'required'
    ];

    public $belongsToMany = [
        'ecoles' => [
            'DigitalArtisan\Enseignement\Models\Ecole',
            'table' => 'digitalartisan_enseignement_ens_eco',
            'key' => 'ens_id',
            'otherKey' => 'eco_id',
            'order' => 'designation']
    ];

    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }    
}
