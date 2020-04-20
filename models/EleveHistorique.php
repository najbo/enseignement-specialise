<?php namespace DigArt\Ecole\Models;

use Model;
use Request;
use Flash;
use DigArt\Ecole\Models\Eleve;

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
    public $table = 'digart_ecole_eleves_histo';

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
        'annee' => ['DigArt\Ecole\Models\Annee',
                   'key' => 'annee_id',
                   'order' => 'debut'],

        'ecole' => ['DigArt\Ecole\Models\Ecole',
                   'key' => 'ecole_id',
                   'order' => 'designation'],
        'passage' => ['DigArt\Ecole\Models\Passage',
                   'key' => 'passage_id',
                   'order' => 'sort_order'],               
        'programme' => ['DigArt\Ecole\Models\Programme',
                   'key' => 'programme_id',
                   'order' => 'sort_order'],                   
        'eleve' => ['DigArt\Ecole\Models\Eleve',
                   'key' => 'eleve_id',
                   'order' => 'nom'],                    
    ];  


// Permet d'injecter une valeur par défaut à un paramètre :
/*
  public function __construct(array $attributes = array())
  {
      
        $ecole = null;
        #$ecole = $this->ecole->ecole_id;
        
        $this->setRawAttributes(['ecole_id' => $ecole], true);
        parent::__construct($attributes);
  }
  */




      public function filterFields($fields, $context)
    {
        if ($context == 'create') { 

            $id = $this->exists ? $this->eleve_id : post('eleve_id'); // Fonctionne mais il faut modifier update.htm du contrôleur Eleves > Form::open ... et passer la variable
           
            #$test = post('Eleve.nom');
            #Flash::success('Job done : '.$test);

            #$id = \Session::get('eleve_id'); // Fonctionne ; ajouter la session dans la méthode update du contrôleur Eleves. !
            $eleve = Eleve::findOrFail($id);
            #$eleve = Eleve::findOrFail(Request::segment(6));
             
             #$fields->designation->value = $eleve ; #'Default';
           
             $fields->ecole->value = $eleve->ecole_id;
        
            } 
    }



}
