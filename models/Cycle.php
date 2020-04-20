<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Cycle extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_cycles';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];


    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }   
    
}
