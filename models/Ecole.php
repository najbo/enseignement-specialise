<?php namespace DigitalArtisan\Enseignement\Models;

use Model;
use Log;


/**
 * Model
 */
class Ecole extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['naissance', 'deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_ecoles';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'designation' => 'required'
    ];


    public $belongsTo = [
        'cercle' => ['DigitalArtisan\Enseignement\Models\Cercle',
                   'key' => 'cercle_id',
                   'order' => 'sort_order'],
        'type' => ['DigitalArtisan\Enseignement\Models\EcoleType',
                   'key' => 'type_id',
                   'order' => 'sort_order'],                  
        'ecolesuivante' => ['DigitalArtisan\Enseignement\Models\Ecole',
                   'key' => 'ecolesuivante_id',
                   'order' => 'designation']
    ];

    public $belongsToMany = [
        'directeurs' => [
            'DigitalArtisan\Enseignement\Models\Enseignant',
            'table' => 'digitalartisan_enseignement_eco_dir',
            'key' => 'eco_id',
            'otherKey' => 'ens_id',
            'conditions' => 'is_direction = 1',
            'order' => 'nom']
    ];

    public $hasMany = [
         'eleves' => ['DigitalArtisan\Enseignement\Models\Eleve', 'key' => 'ecole_id', 'order' => 'FullName'] 
    ]; 


    public function getDirecteursOptions($fieldName, $value)
    {
        
        $result = Enseignant::orderBy('nom','prenom')->get()->where('is_direction', true)->pluck('fullname', 'id');
        return $result;
    }

    public function getecoleNomAttribute()
    {
        return $this->designation;
    }


   public function scopeActifs($query) {
        return $query->where('is_actif', true);
   }    

   # Non utilisé ; remplacé par la méthode getEcoleSuivanteOptions :
   public function listEcoles($value, $fieldName, $formData)
   {
        # $result = $this->actifs()->pluck('designation', 'id');
        # $result = $this->withTrashed()->actifs()->orWhere('id',$value)->pluck('designation', 'id');

        # renvoie la liste des enregistrement actifs (ou les softedeleted si c'est l'enregistrement actif)
        # ATTENTION : les champs de la fonction $value et $fieldname sont inversés selon le mode d'emploi !

        
        $result = $this->withTrashed()->actifs()->where('deleted_at', NULL)->
            orWhere(function ($q) use ($value) {
                $q->where('id',$value);
            })->pluck('designation', 'id');

        # \Log::info('Value : '. $value. ' / Fieldname : '.$fieldName. ' / formData : '.$formData .'<br>'.$result);

        return $result;

   }


   public function getEcolesuivanteOptions($value, $formData)
   {
        # $result = $this->actifs()->pluck('designation', 'id');
        # $result = $this->withTrashed()->actifs()->orWhere('id',$value)->pluck('designation', 'id');

        # renvoie la liste des enregistrement actifs (ou les softedeleted si c'est l'enregistrement actif)

        
        $result = $this->withTrashed()->actifs()->where('deleted_at', NULL)->
            orWhere(function ($q) use ($value) {
                $q->where('id',$value);
            })->pluck('designation', 'id');

        #\Log::info('Value : '. $value.  ' / formData : '.$formData .'<br>'.$result);

        return $result;

   }


   public function getTypeOptions($value, $formData)
   {
        # renvoie la liste des enregistrement actifs (ou les softedeleted si c'est l'enregistrement actif)
        # ATTENTION : les champs de la fonction $value et $fieldname sont inversés selon le mode d'emploi !


        $result = EcoleType::withTrashed()->actifs()->where('deleted_at', NULL)->
            orWhere(function ($q) use ($value) {
                $q->where('id',$value);
            })->get()->pluck('designation', 'id');

        # \Log::info('Value : '. $value. ' / Fieldname : '.$fieldName. ' / formData : '.$formData .'<br>'.$result);
        return $result;
   }    

}
