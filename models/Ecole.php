<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Ecole extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['naissance', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_ecoles';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];


    public $belongsTo = [
        'cercle' => ['DigitalArtisan\Enseignement\Models\Cercle',
                   'key' => 'cercle_id',
                   'order' => 'sort_order'],
        'type' => ['DigitalArtisan\Enseignement\Models\EcoleType',
                   'key' => 'type_id',
                   'order' => 'sort_order'],                  
        'ecolesuivante' => ['DigitalArtisan\Enseignement\Models\Ecole',
                   'key' => 'ecolesuivante_id',
                   'order' => 'designation']
    ];

    public $belongsToMany = [
        'directeurs' => [
            'DigitalArtisan\Enseignement\Models\Enseignant',
            'table' => 'digitalartisan_enseignement_eco_dir',
            'key' => 'eco_id',
            'otherKey' => 'ens_id',
            'conditions' => 'is_direction = 1',
            'order' => 'nom']
    ];

    public $hasMany = [
         'eleves' => ['DigitalArtisan\Enseignement\Models\Eleve', 'key' => 'ecole_id', 'order' => 'FullName'] 
    ]; 


    public function getDirecteursOptions($fieldName, $value)
    {
        
        $result = Enseignant::orderBy('nom','prenom')->get()->where('is_direction', true)->pluck('fullname', 'id');
        return $result;
    }

    public function getecoleNomAttribute()
    {
        return $this->designation;
    }

}
