<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Eleve extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['naissance','deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_eleves';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'nom' => 'required',
        'prenom' => 'required'
    ];



    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];



    public $belongsTo = [
        'volee' => ['DigitalArtisan\Enseignement\Models\Volee',
                   'key' => 'volee_id',
                   'order' => 'designation'],

        'ecole' => ['DigitalArtisan\Enseignement\Models\Ecole',
                   'key' => 'ecole_id',
                   'order' => 'designation'],
        'pays' => ['DigitalArtisan\Enseignement\Models\Pays',
                   'key' => 'pays_id',
                   'order' => 'is_origine desc'],

    ];

    public $belongsToMany = [
        'pathologies' => [
            'DigitalArtisan\Enseignement\Models\Pathologies',
            'table' => 'digitalartisan_enseignement_path_eleve',
            'key' => 'eleve_id',
            'otherKey' => 'path_id',
            'order' => 'sort_order']
    ];


    public $hasMany = [
         'proches' => ['DigitalArtisan\Enseignement\Models\Proche', 'key' => 'eleve_id', 'order' => ''],
         'suivis' => ['DigitalArtisan\Enseignement\Models\Suivi', 'key' => 'eleve_id', 'order' => '']
    ]; 



    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }

   

    public function getProgrammeEffectifAttribute($value)
    {
        return $this->programme;
    }   

}