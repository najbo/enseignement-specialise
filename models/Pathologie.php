<?php namespace DigArt\Ecole\Models;

use Model;

/**
 * Model
 */
class Pathologie extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'designation'
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_path';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];
}
