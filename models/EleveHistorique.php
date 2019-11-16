<?php namespace DigitalArtisan\Enseignement\Models;

use Model;
use Request;
use DigitalArtisan\Enseignement\Models\Eleve;

/**
 * Model
 */
class EleveHistorique extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['debut', 'fin', 'bouclement', 'deleted_at'];


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
        'programme' => ['DigitalArtisan\Enseignement\Models\Programme',
                   'key' => 'programme_id',
                   'order' => 'sort_order'],                   
        'eleve' => ['DigitalArtisan\Enseignement\Models\Eleve',
                   'key' => 'eleve_id',
                   'order' => 'nom'],                    
    ];  



  public function __construct(array $attributes = array())
  {
      /*
        $ecole = null;
        #$ecole = $this->ecole->ecole_id;
        
        $this->setRawAttributes(['ecole_id' => $ecole], true);
        parent::__construct($attributes);
        */

  }




      public function filterFields($fields, $context)
    {
        if ($context == 'create') {  
            $id = \Session::get('id');
            $eleve = Eleve::findOrFail($id);
            #$eleve = Eleve::findOrFail(Request::segment(6));
             
             #$fields->designation->value = $eleve ; #'Default';
           
             $fields->ecole->value = $eleve->ecole_id;
        
            } 
    }



}
