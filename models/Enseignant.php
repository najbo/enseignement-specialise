<?php namespace DigArt\Ecole\Models;

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
    public $table = 'digart_ecole_enseignants';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'nom' => 'required',
        'prenom' => 'required',
        'mail' => 'email'
    ];

    # Variable pour la liste d'impression PDF ; titre pour la liste générique
    public $pdf_headers = [
        'title' => 'Liste des enseignants',
        ];


    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];

    public $belongsTo = [
        'genre' => ['DigArt\Ecole\Models\Genre',
                   'key' => 'genre_id',
                   'order' => 'sort_order'],                   
        'langue' => ['DigArt\Ecole\Models\Langue',
                   'key' => 'langue_id',
                   'order' => 'sort_order'],    
        'permis' => ['DigArt\Ecole\Models\ProchePermis',
                   'key' => 'permis_id',
                   'order' => 'sort_order']                                    
    ];

    public $belongsToMany = [
        'ecoles' => [
            'DigArt\Ecole\Models\Ecole',
            'table' => 'digart_ecole_ens_eco',
            'key' => 'ens_id',
            'otherKey' => 'eco_id',
            'softDelete' => true,
            'order' => 'designation']
    ];

    public $hasMany = [
          'faits' => ['DigArt\Ecole\Models\EnseignantFait', 'key' => 'enseignant_id', 'order' => 'debut', 'softDelete' => true]
    ];     


    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }   

   public function scopeActifs($query) {
        return $query->where('is_actif', true);
   }    

}
