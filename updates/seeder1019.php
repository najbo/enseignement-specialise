<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Types;

class Seeder1019 extends Seeder
{
    public function run()
    {
        Types::truncate();    
        
        Types::create([
            'designation' => 'Entretien avec parents',
            'sort_order' => 1,
        ]);
        
        Types::create([
            'designation' => 'Bilan',
            'sort_order' => 2,
        ]);          
        
        Types::create([
            'designation' => 'Décision',
            'sort_order' => 3,
        ]);  

        Types::create([
            'designation' => 'Application',
            'sort_order' => 4,
        ]);        
        
        Types::create([
            'designation' => 'Réseau',
            'sort_order' => 5,
        ]);  
        
        Types::create([
            'designation' => 'Téléphones',
            'sort_order' => 20,
        ]);
        
        Types::create([
            'designation' => 'Correspondance',
            'sort_order' => 21,
        ]);
        
        Types::create([
            'designation' => 'Notices personnelles',
            'sort_order' => 22,
        ]);      

        Types::create([
            'designation' => 'Autres',
            'sort_order' => 23,
        ]);         
    }
}