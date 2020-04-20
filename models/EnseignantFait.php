<?php namespace DigArt\Ecole\Models;

use Model;

/**
 * Model
 */
class EnseignantFait extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_enseignants_faits';

    /**
     * @var array Validation rules
     */

    public $rules = [
        'debut' => 'required',
        'designation' => 'required'
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];

    public $belongsTo = [
        'typefait' => ['DigArt\Ecole\Models\TypeFait',
                   'key' => 'typefait_id',
                   'order' => 'sort_order'],                   
    ];    
}
