<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Ecole;

class Seeder1020 extends Seeder
{
    public function run()
    {
        Ecole::truncate();
        
        Ecole::create([
            'abreviation' => 'EP Tavannes',
            'designation' => 'Ecole primaire Tavannes',
            'npa' => '2710',
            'localite' => 'Tavannes',
            'cercle_id' => 1,
            'ecolesuivante' => 2,
            'type_id' => 1,
            'sort_order' => 1,
        ]);
        
        Ecole::create([
            'abreviation' => 'ES Tavannes',
            'designation' => 'Ecole secondaire Tavannes',
            'npa' => '2710',
            'localite' => 'Tavannes',
            'cercle_id' => 1,
            'ecolesuivante' => null,
            'type_id' => 2,
            'sort_order' => 2,
        ]);        

        Ecole::create([
            'abreviation' => 'EP Loveresse',
            'designation' => 'Ecole primaire Loveresse',
            'npa' => '2732',
            'localite' => 'Loveresse',
            'cercle_id' => 1,
            'ecolesuivante' => 4,
            'type_id' => 1,
            'sort_order' => 3,
        ]); 

        Ecole::create([
            'abreviation' => 'ES Reconvilier',
            'designation' => 'Ecole secondaire Reconvilier',
            'npa' => '2732',
            'localite' => 'Reconvilier',
            'cercle_id' => 1,
            'ecolesuivante' => null,
            'type_id' => 2,
            'sort_order' => 4,
        ]);         
    }
}