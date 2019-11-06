<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class EcoleType extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_ecoles_types';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];
}
