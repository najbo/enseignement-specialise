<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\PassageType;

class Seeder1064 extends Seeder
{
    public function run()
    {
        PassageType::truncate();

        PassageType::create([
            'id' => 1,
            'designation' => 'Promu',
            'sort_order' => 1
        ]);
        
        PassageType::create([
            'id' => 2,
            'designation' => 'Redouble',
            'sort_order' => 2
        ]);
        
        PassageType::create([
            'id' => 3,
            'designation' => 'Saute une année',
            'sort_order' => 3
        ]);        

        PassageType::create([
            'id' => 4,
            'designation' => "Sortie ou fin d'école",
            'sort_order' => 4
        ]);                
        
        PassageType::create([
            'id' => 5,
            'designation' => 'Pause',
            'sort_order' => 5
        ]);                        
    }
}