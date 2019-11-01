<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Cercle;

class Seeder1040 extends Seeder
{
    public function run()
    {
        Cercle::truncate();
        
        Cercle::create([
            'designation' => 'Tavannes',
            'is_default' => 1,
        ]);
    }
}