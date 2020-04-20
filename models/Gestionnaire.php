<?php namespace DigArt\Ecole\Models;

use Model;
use \Backend\Models\User;

/**
 * Gestionnaire Model
 */
class Gestionnaire extends User
{

    public $belongsToMany = [
            'suivis' => [
                'Jan\Ecole\Models\Suivi',
                'table' => 'digart_ecole_suivi',
                'key' => 'gestionnaire_id'
            ],
    ];


    public function getFullNameAttribute()
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }




    public function scopeActive($query)
        {
            return $query->where('active', 1);
        }

}