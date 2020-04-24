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
            'duree' => '12 leçons',
            'lessons' => 12,
            'sort_order' => 1
        ]);

        Evolution::create([
            'designation' => 'ESL',
            'duree' => '2 ans',
            'duree_mois' => 24,
            'sort_order' => 2
        ]);
        
        Evolution::create([
            'designation' => 'ESG',
            'duree' => '2 ans',
            'duree_mois' => 24,
            'sort_order' => 3
        ]);        
              
    }
}