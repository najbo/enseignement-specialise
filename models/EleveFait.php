<?php namespace DigArt\Ecole\Models;

use Model;

/**
 * Model
 */
class EleveFait extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'prochaineecheance', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_eleves_faits';

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
                   'conditions' => 'is_eleve = 1',
                   'order' => 'sort_order'],                   
    ];     
}
