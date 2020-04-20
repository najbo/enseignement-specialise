<?php namespace DigArt\Ecole\Models;

use Model;

/**
 * Model
 */
class Volee extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_volees';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];

/*    public $belongsTo = [
        'maitredeclasse' => ['DigArt\Ecole\Models\Enseignant',
                   'key' => 'enseignant_id',
                   'order' => 'nom'],
    ];*/

    public function getFullNameAttribute() {
        return $this->designation;
    }    
}
