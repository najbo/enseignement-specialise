<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class PathologieEleve extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_path_eleve';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
