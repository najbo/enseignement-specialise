<?php namespace DigArt\Ecole\Models;

use Model;

/**
 * Model
 */
class PassageType extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_passages_types';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
