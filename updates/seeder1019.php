<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Type;

class Seeder1019 extends Seeder
{
    public function run()
    {
        Type::truncate();    

        Type::create([
            'designation' => 'Constat et observation',
            'sort_order' => 1,
        ]);
        
        Type::create([
            'designation' => 'Entretien avec parents',
            'sort_order' => 2,
        ]);
        
        Type::create([
            'designation' => 'Bilan',
            'sort_order' => 3,
        ]);          
        
        Type::create([
            'designation' => 'Décision',
            'sort_order' => 4,
        ]);  

        Type::create([
            'designation' => 'Application',
            'sort_order' => 5,
        ]);        
        
        Type::create([
            'designation' => 'Réseau',
            'sort_order' => 6,
        ]);  
        
        Type::create([
            'designation' => 'Téléphones',
            'sort_order' => 20,
        ]);
        
        Type::create([
            'designation' => 'Correspondance',
            'sort_order' => 21,
        ]);
        
        Type::create([
            'designation' => 'Notices personnelles',
            'sort_order' => 22,
        ]);      

        Type::create([
            'designation' => 'Autres',
            'sort_order' => 23,
        ]);         
    }
}