<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Annee extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_annees';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
