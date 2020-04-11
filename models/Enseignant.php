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

    protected $appends = ['full_name'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_enseignants';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'mail' => 'email'
    ];

    # Variable pour la liste d'impression PDF ; titre pour la liste générique
    public $documents = [
        'title' => 'Liste des enseignants',
        ];


    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];

    public $belongsTo = [
        'genre' => ['DigitalArtisan\Enseignement\Models\Genre',
                   'key' => 'genre_id',
                   'order' => 'sort_order'],                   
        'langue' => ['DigitalArtisan\Enseignement\Models\Langue',
                   'key' => 'langue_id',
                   'order' => 'sort_order'],    
        'permis' => ['DigitalArtisan\Enseignement\Models\ProchePermis',
                   'key' => 'permis_id',
                   'order' => 'sort_order']                                    
    ];

    public $belongsToMany = [
        'ecoles' => [
            'DigitalArtisan\Enseignement\Models\Ecole',
            'table' => 'digitalartisan_enseignement_ens_eco',
            'key' => 'ens_id',
            'otherKey' => 'eco_id',
            'order' => 'designation']
    ];

    public $hasMany = [
          'faits' => ['DigitalArtisan\Enseignement\Models\EnseignantFait', 'key' => 'enseignant_id', 'order' => 'debut']
    ];     

    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }    
}
