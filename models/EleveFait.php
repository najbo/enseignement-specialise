<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Model
 */
class EleveFait extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'digitalartisan_enseignement_eleves_faits';

    /**
     * @var array Validation rules
     */
    public $rules = [
        'date' => 'required',
        'designation' => 'required'
    ];

    public $attachMany = [
        'images' => ['System\Models\File', 'public' => false],
        'documents' => ['System\Models\File', 'public' => false]
    ];
}
