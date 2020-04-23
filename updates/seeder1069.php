<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Evolution;

class Seeder1069 extends Seeder
{
    public function run()
    {
        Evolution::truncate();

        Evolution::create([
            'designation' => 'ICD',
            'sort_order' => 1
        ]);

        Evolution::create([
            'designation' => 'ESL',
            'sort_order' => 2
        ]);
        
        Evolution::create([
            'designation' => 'ESG',
            'sort_order' => 3
        ]);        
              
    }
}