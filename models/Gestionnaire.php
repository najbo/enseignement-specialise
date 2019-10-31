<?php namespace DigitalArtisan\Enseignement\Models;

use Model;

/**
 * Gestionnaire Model
 */
class Gestionnaire extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'backend_users';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    public $rules = [
            'first_name' => 'required',
            'last_name' => 'required'
        ];


    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];

    public $belongsToMany = [
            'suivis' => [
                'Jan\Ecole\Models\Suivi',
                'table' => 'digitalartisan_enseignement_suivi',
                'key' => 'gestionnaire_id'
            ],
    ];

    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];


}