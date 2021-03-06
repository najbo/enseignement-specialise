<?php namespace DigArt\Ecole\Models;

use Model;
use DB;
use BackendAuth;


/**
 * Model
 */
class Eleve extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $user;

    public function __construct(array $attributes = array())
    {
        $this->user = BackendAuth::getUser();
        parent::__construct($attributes);
    }


    protected $dates = ['naissance','deleted_at'];

    protected $appends = ['full_name'];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'digart_ecole_eleves';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'nom' => 'required',
        'prenom' => 'required'
    ];



    # Variable pour la liste d'impression PDF ; titre pour la liste générique
    public $pdf_headers = [
        'title' => 'Liste des éleves',
        ];


    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];



    public $belongsTo = [
        'volee' => ['DigArt\Ecole\Models\Volee',
                   'key' => 'volee_id',
                   'order' => 'designation'],

        'ecole' => ['DigArt\Ecole\Models\Ecole',
                   'key' => 'ecole_id',
                   'order' => 'designation'],
        'pays' => ['DigArt\Ecole\Models\Pays',
                   'key' => 'pays_id',
                   'order' => 'is_origine desc'],
        'genre' => ['DigArt\Ecole\Models\Genre',
                   'key' => 'genre_id',
                   'order' => 'sort_order'],                   
        'langue' => ['DigArt\Ecole\Models\Langue',
                   'key' => 'langue_id',
                   'order' => 'sort_order'],
        'permis' => ['DigArt\Ecole\Models\ProchePermis',
                   'key' => 'permis_id',
                   'order' => 'sort_order'],
        'gestionnaire' => ['DigArt\Ecole\Models\Gestionnaire',
                   'key' => 'auteur_id',
                   'order' => 'last_name']                  
    ];

    public $belongsToMany = [
        'pathologies' => [
            'DigArt\Ecole\Models\Pathologie',
            'table' => 'digart_ecole_path_eleve',
            'key' => 'eleve_id',
            'otherKey' => 'path_id',
            'softDelete' => true,
            'order' => 'sort_order']
    ];


    public $hasMany = [
         'proches' => ['DigArt\Ecole\Models\Proche', 'key' => 'eleve_id', 'order' => '','softDelete' => true],
         'suivis' => ['DigArt\Ecole\Models\Suivi', 'key' => 'eleve_id', 'order' => '', 'softDelete' => true],
         'historiques' => ['DigArt\Ecole\Models\EleveHistorique', 'key' => 'eleve_id', 'order' => 'debut', 'softDelete' => true],
         'faits' => ['DigArt\Ecole\Models\EleveFait', 'key' => 'eleve_id', 'order' => 'debut', 'softDelete' => true]
    ]; 



public function setAuteurIdAttribute($value)
    {
        # $user = BackendAuth::getUser();
        if ($this->user) {
            $this->attributes['auteur_id'] = $this->user->id;
        }
    }


    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }


    public function getProgrammeEffectifAttribute($value)
    {
        return $this->programme;
    }   


    public function getDateNaissanceAttribute()
    {
        if ($this->naissance) {
            return $this->naissance->format('d.m.y');
        }
    }   


    public function getPrenomNomElevesOptions() {
        #$result = Eleve::orderBy('nom','prenom')->get()->pluck('FullName', 'id');

/*        
        $result = Eleve::select(
            DB::raw("CONCAT(prenom,' ',nom) AS name"),'id')
            ->pluck('name', 'id')
            ->toArray();
*/
        $result = Eleve::orderBy('nom','prenom')->get()->pluck('FullName', 'id')->toArray();          
        return $result;
    }   


    public function beforeSave()
        {
         #\Log::info("Before Save");
    }

    public function AfterCreate()

    {
        # $user = BackendAuth::getUser();


        if ($this->user) {

            $update = DB::table('digart_ecole_eleves')
                  ->where('id', $this->id)
                  ->update(['auteur_id' => $this->user->id]);
/* 
            # This method fires the afterUpdate event:     
            $eleve = Eleve::find($this->id);
            $eleve->auteur_id = $user->id;
            $eleve->save();
*/

            \Log::info("Ajout de l'élève ID ".$this->id. ' ' .$this->full_name .' par ' .$this->user->full_name);
        }

    }

    public function afterUpdate()
        {

        #$user = BackendAuth::getUser();

        if ($this->user) {
            \Log::info("Mise à jour de l'élève ID ".$this->id. ' ' .$this->full_name .' par ' .$this->user->full_name); 
         }   
    }

    public function afterDelete()
        {

        #$eleve = Eleve::findOrFail($this->id);
        #$eleve->pathologies()->delete();

        # $this->pathologies()->delete();
        
        # PathologieEleve::where("eleve_id", $this->id)->forceDelete(); // NoSoftDelete
        
        # $user = BackendAuth::getUser();

        if ($this->user) {
            # PathologieEleve::where("eleve_id", $this->id)->delete();
            # Suivi::where("eleve_id", $this->id)->delete(); 

            \Log::info("Effacement de l'éleve ID #".$this->id. ' '. $this->full_name .' par ' . $this->user->full_name .' et effacement des tables liées');
             }

    }

    public function filterFields($fields, $context)
    {
        if ($context == 'create') {  
             #$fields->adresse->value = $this->id;
             #$fields->ecole->value = 2;
        
            } 
    }


}