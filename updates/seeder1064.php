<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\PassageType;

class Seeder1064 extends Seeder
{
    public function run()
    {
        PassageType::truncate();

        PassageType::create([
            'id' => 1,
            'designation' => 'Aucune décision',
            'sort_order' => 1
        ]);  

        PassageType::create([
            'id' => 2,
            'designation' => 'Promu',
            'sort_order' => 2
        ]);
        
        PassageType::create([
            'id' => 3,
            'designation' => 'Redouble',
            'sort_order' => 3
        ]);
        
        PassageType::create([
            'id' => 4,
            'designation' => 'Saute une année',
            'sort_order' => 4
        ]);        

        PassageType::create([
            'id' => 5,
            'designation' => "Sortie ou fin d'école",
            'sort_order' => 5
        ]);                
        
        PassageType::create([
            'id' => 6,
            'designation' => 'Pause',
            'sort_order' => 6
        ]);        
              
    }
}