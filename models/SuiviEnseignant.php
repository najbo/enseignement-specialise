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

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
