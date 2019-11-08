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
            'abreviation' => 'PRO',
            'passagetype_id' => 1,
            #'decalage' => 0,
            'sort_order' => 1
        ]);

        Passage::create([
            'designation' => 'Redouble',
            'abreviation' => 'RED',
            'passagetype_id' => 2,
            'decalage' => -1,
            'sort_order' => 2
        ]);        
        
        Passage::create([
            'designation' => 'Saute une année',
            'abreviation' => 'SUA',
            'passagetype_id' => 3,
            'decalage' => 1,
            'sort_order' => 3
        ]);    

        Passage::create([
            'designation' => "Sortie d'école",
            'abreviation' => 'FIN',
            'passagetype_id' => 4,
            #'decalage' => 0,
            'sort_order' => 4
        ]);            
        
        Passage::create([
            'designation' => "Pause",
            'abreviation' => 'PAU',
            'passagetype_id' => 5,
            #'decalage' => 0,
            'sort_order' => 5
        ]);                    
    }
}