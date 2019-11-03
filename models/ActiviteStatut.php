<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class ActiviteStatut extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_activites_statuts';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
