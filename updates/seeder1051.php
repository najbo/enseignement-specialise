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
            'decallage' => 0,
            'sort_order' => 1
        ]);

        Passage::create([
            'designation' => 'Redouble',
            'decallage' => -1,
            'sort_order' => 2
        ]);        
        
        Passage::create([
            'designation' => 'Saute une année',
            'decallage' => 1,
            'sort_order' => 3
        ]);                
    }
}