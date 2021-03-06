<?php namespace DigArt\Ecole\Models;

use Model;
use Backend\Models\User;
use BackendAuth;

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
    public $table = 'digart_ecole_annees';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];

    public $belongsTo = [                
        'anneesuivante' => ['DigArt\Ecole\Models\Annee',
                   'key' => 'anneesuivante_id',
                   'order' => 'debut'],           
        'backenduser' => ['Backend\Models\User',
                   'key' => 'gestionnaire_id',
                   'order' => 'last_name'],                  
    ];   

    public function bouclementMaintenant() 
    {
        return $this->bouclement = now();
    }

    public function inscriptionGestionnaire()
    {
        return $this->gestionnaire_id = BackendAuth::getUser()->id;
    }
}
