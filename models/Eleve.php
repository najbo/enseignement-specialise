<?php namespace DigitalArtisan\Enseignement\Models;

use Model;
use DB;

/**
 * Model
 */
class Eleve extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['naissance','deleted_at'];

    #protected $appends = ['full_name'];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_eleves';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'nom' => 'required',
        'prenom' => 'required'
    ];


    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];



    public $belongsTo = [
        'volee' => ['DigitalArtisan\Enseignement\Models\Volee',
                   'key' => 'volee_id',
                   'order' => 'designation'],

        'ecole' => ['DigitalArtisan\Enseignement\Models\Ecole',
                   'key' => 'ecole_id',
                   'order' => 'designation'],
        'pays' => ['DigitalArtisan\Enseignement\Models\Pays',
                   'key' => 'pays_id',
                   'order' => 'is_origine desc'],
        'genre' => ['DigitalArtisan\Enseignement\Models\Genre',
                   'key' => 'genre_id',
                   'order' => 'sort_order'],                   
        'langue' => ['DigitalArtisan\Enseignement\Models\Langue',
                   'key' => 'langue_id',
                   'order' => 'sort_order'],
    ];

    public $belongsToMany = [
        'pathologies' => [
            'DigitalArtisan\Enseignement\Models\Pathologie',
            'table' => 'digitalartisan_enseignement_path_eleve',
            'key' => 'eleve_id',
            'otherKey' => 'path_id',
            'order' => 'sort_order']
    ];


    public $hasMany = [
         'proches' => ['DigitalArtisan\Enseignement\Models\Proche', 'key' => 'eleve_id', 'order' => ''],
         'suivis' => ['DigitalArtisan\Enseignement\Models\Suivi', 'key' => 'eleve_id', 'order' => '']
    ]; 



    public function getFullNameAttribute() {
        return $this->prenom.' '. $this->nom;
    }

   

    public function getProgrammeEffectifAttribute($value)
    {
        return $this->programme;
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
         \Log::info("Before Save");
    }

    public function afterSave()
        {
         \Log::info("After Save ".$this->id);    
    }

    public function afterDelete()
        {

        #$eleve = Eleve::findOrFail($this->id);
        #$eleve->pathologies()->delete();

        # $this->pathologies()->delete();
        
        # PathologieEleve::where("eleve_id", $this->id)->forceDelete(); // NoSoftDelete
        PathologieEleve::where("eleve_id", $this->id)->delete(); // Softdelete
         \Log::info("We just deleted record #".$this->id. " but *not* the related pathologies");    
    }


}