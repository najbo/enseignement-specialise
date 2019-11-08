<?php namespace DigitalArtisan\Enseignement\Models;

use Model;
use Backend\Models\User;

/**
 * Model
 */
class Annee extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'bouclement', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_annees';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];

    public $belongsTo = [                
        'anneesuivante' => ['DigitalArtisan\Enseignement\Models\Annee',
                   'key' => 'anneesuivante_id',
                   'order' => 'debut'],           
        'backenduser' => ['Backend\Models\User',
                   'key' => 'gestionnaire_id',
                   'order' => 'last_name'],                  
    ];   

}
