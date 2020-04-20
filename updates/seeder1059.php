<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Cycle;

class Seeder1059 extends Seeder
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