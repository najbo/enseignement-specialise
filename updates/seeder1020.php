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
            'designation' => 'Ecole primaire Tavannes'
        ]);
        
        Ecole::create([
            'abreviation' => 'ES Tavannes',
            'designation' => 'Ecole secondaire Tavannes'
        ]);        

        Ecole::create([
            'abreviation' => 'EP Loveresse',
            'designation' => 'Ecole primaire Loveresse'
        ]); 

        Ecole::create([
            'abreviation' => 'ES Reconvilier',
            'designation' => 'Ecole secondaire Reconvilier'
        ]);         
    }
}