<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Interlocuteur extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_interlocuteurs';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'prenom' => 'required',
        'nom' => 'required',
        'mail' => 'email'
    ];

    public $belongsToMany = [
        'fonctions' => [
            'DigitalArtisan\Enseignement\Models\Fonction',
            'table' => 'digitalartisan_enseignement_inter_fct',
            'key' => 'interloc_id',
            'otherKey' => 'fct_id',
            'order' => 'sort_order']
    ];

    public $hasMany = [
         'suivis' => ['DigitalArtisan\Enseignement\Models\SuiviActivite', 'key' => 'interlocuteur_id', 'order' => '']
    ]; 

    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }

    public function getPrenomNomInterlocuteursOptions() {

        $result = Interlocuteur::orderBy('nom','prenom')->get()->pluck('FullName', 'id')->toArray();          
        return $result;
    }       
}
