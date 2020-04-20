<?php namespace DigArt\Ecole\Models;

use Model;

/**
 * Model
 * Gère les types de passages d'une année à l'autre d'un élève (historique)
 */
class Passage extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_pass';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];

    public $belongsTo = [
        'passagetype' => ['DigArt\Ecole\Models\PassageType',
                   'key' => 'passagetype_id',
                   'order' => 'sort_order']
    ];    
}
