<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class EleveHistorique extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_eleves_historiques';

    /**
     * @var array Validation rules
     */
    public $rules = [
      
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];    

    public $belongsTo = [
        'annee' => ['DigitalArtisan\Enseignement\Models\Annee',
                   'key' => 'annee_id',
                   'order' => 'debut'],

        'ecole' => ['DigitalArtisan\Enseignement\Models\Ecole',
                   'key' => 'ecole_id',
                   'order' => 'designation'],
        'passage' => ['DigitalArtisan\Enseignement\Models\Passage',
                   'key' => 'passage_id',
                   'order' => 'sort_order'],               
    ];    
}
