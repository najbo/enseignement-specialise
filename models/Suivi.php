<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class Suivi extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_suivi';

    /**
     * @var array Validation rules
     */

    public $rules = [
        'eleve_id' => 'required',
        'debut' => 'required'
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];

    public $belongsTo = [
        'eleve'    => ['DigitalArtisan\Enseignement\Models\Eleve',
                   'key' => 'eleve_id',
                   'order' => 'nom'],
        'status'    => ['DigitalArtisan\Enseignement\Models\Status',
               'key' => 'status_id',
               'order' => 'sort_order'],                   
        'gestionnaire'    => ['DigitalArtisan\Enseignement\Models\Gestionnaire',
               'key' => 'gestionnaire_id',
               'order' => ['last_name', 'first_name']], 
    ];

    public $belongsToMany = [
        'pathologies' => [
            'DigitalArtisan\Enseignement\Models\Pathologies',
            'table' => 'digitalartisan_enseignement_path_suivi',
            'key' => 'suivi_id',
            'otherKey' => 'path_id',
            'order' => 'sort_order']
    ];
   
    public $hasMany = [
         'activites' => ['DigitalArtisan\Enseignement\Models\SuiviActivite', 'key' => 'suivi_id', 'order' => 'date desc'],
         'enseignants' => ['DigitalArtisan\Enseignement\Models\SuiviEnseignant', 'key' => 'suivi_id', 'order' => 'debut desc'] 
    ]; 
}
