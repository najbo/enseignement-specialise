<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Programme extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_programmes';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];

    public $belongsTo = [
        'typeecole' => ['DigitalArtisan\Enseignement\Models\EcoleType',
                   'key' => 'typecole_id',
                   'order' => 'sort_order'],
        'cycle' => ['DigitalArtisan\Enseignement\Models\Cycle',
                   'key' => 'cycle_id',
                   'order' => 'sort_order'],                  
        'programmesuivant' => ['DigitalArtisan\Enseignement\Models\Programme',
                   'key' => 'programmesuivant_id',
                   'order' => 'sort_order']
    ];    
}
