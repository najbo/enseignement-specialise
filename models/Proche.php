<?php namespace DigArt\Ecole\Models;

use Model;

/**
 * Model
 */
class Proche extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    protected $appends = ['full_name'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_proches';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'prenom' => 'required',
        'nom' => 'required',
        'mail' => 'email'
    ];
        
    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];

    public $belongsTo = [
        'procherole' => ['DigArt\Ecole\Models\ProcheRole',
                   'key' => 'role_id',
                   'order' => 'sort_order'],
        'permis' => ['DigArt\Ecole\Models\ProchePermis',
                   'key' => 'permis_id',
                   'order' => 'sort_order']
    ];         

    public function getFullNameAttribute() {
        # return $this->prenom.' '. $this->nom. ' ('.$this->procherole->designation .')';
        return $this->prenom.' '. $this->nom ;
    }    

    public function getPrenomNomProchesOptions() {

        $result = Proche::orderBy('nom','prenom')->get()->pluck('FullName', 'id')->toArray();          
        return $result;
    }     
}
