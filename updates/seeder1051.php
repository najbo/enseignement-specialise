<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Passage;

class Seeder1051 extends Seeder

{
    public function run()
    {
        Passage::truncate();

        Passage::create([
            'designation' => 'Promu',
            #'decalage' => 0,
            'sort_order' => 1
        ]);

        Passage::create([
            'designation' => 'Redouble',
            'decalage' => -1,
            'sort_order' => 2
        ]);        
        
        Passage::create([
            'designation' => 'Saute une année',
            'decalage' => 1,
            'sort_order' => 3
        ]);    

        Passage::create([
            'designation' => "Sortie d'école",
            #'decalage' => 0,
            'sort_order' => 4
        ]);            
    }
}