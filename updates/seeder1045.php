<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\PathologieEleve;

class Seeder1045 extends Seeder
{
    public function run()
    {
        PathologieEleve::truncate();
        
        PathologieEleve::create([
            'eleve_id' => 1,
            'path_id' => '1',
        ]);
        
        PathologieEleve::create([
            'eleve_id' => 1,
            'path_id' => '3',
        ]);        
        
        PathologieEleve::create([
            'eleve_id' => 1,
            'path_id' => '6',
        ]);        
        
        PathologieEleve::create([
            'eleve_id' => 2,
            'path_id' => '5',
        ]);
        
        PathologieEleve::create([
            'eleve_id' => 2,
            'path_id' => '1',
        ]);        
        
        PathologieEleve::create([
            'eleve_id' => 1,
            'path_id' => '4',
        ]);                
    }
}