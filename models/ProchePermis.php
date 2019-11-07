<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class ProchePermis extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_proches_permis';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}