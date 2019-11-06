<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Cycle;

class Seeder1062 extends Seeder
{
    public function run()
    {
        Cycle::truncate();
         
        Cycle::create([
            'designation' => 'Cycle 1',
            'sort_order' => 1,
        ]);
        
        Cycle::create([
            'designation' => 'Cycle 2',
            'sort_order' => 2,
        ]);
                
        Cycle::create([
            'designation' => 'Cycle 3',
            'sort_order' => 3,
        ]);
                        

    }
}