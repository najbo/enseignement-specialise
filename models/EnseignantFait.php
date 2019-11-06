<?php namespace DigitalArtisan\Enseignement\Models;

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
    public $table = 'digitalartisan_enseignement_enseignants_faits';

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
        'typefait' => ['DigitalArtisan\Enseignement\Models\TypeFait',
                   'key' => 'typefait_id',
                   'order' => 'sort_order'],                   
    ];    
}
