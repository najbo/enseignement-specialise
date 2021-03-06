<?php namespace DigArt\Ecole\Models;

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
    public $table = 'digart_ecole_progr';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];

    public $belongsTo = [
        'typeecole' => ['DigArt\Ecole\Models\EcoleType',
                   'key' => 'typecole_id',
                   'order' => 'sort_order'],
        'cycle' => ['DigArt\Ecole\Models\Cycle',
                   'key' => 'cycle_id',
                   'order' => 'sort_order'],                  
        'programmesuivant' => ['DigArt\Ecole\Models\Programme',
                   'key' => 'programmesuivant_id',
                   'order' => 'sort_order']
    ];    
}
