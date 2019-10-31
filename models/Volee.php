<?php namespace DigitalArtisan\Enseignement\Models;

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
    public $table = 'digitalartisan_enseignement_volees';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'maitredeclasse' => ['DigitalArtisan\Enseignement\Models\Enseignant',
                   'key' => 'enseignant_id',
                   'order' => 'nom'],
    ];

    public function getFullNameAttribute() {
        return $this->designation.' - '. $this->programme;
    }    
}
