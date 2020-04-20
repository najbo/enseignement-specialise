<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Cercle extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_cercles';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];

    public $hasMany = [
         'ecoles' => ['DigitalArtisan\Enseignement\Models\Ecole', 'key' => 'cercle_id', 'order' => 'designation']        
    ];     
}
