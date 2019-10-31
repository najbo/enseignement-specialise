<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Eleve;

class Seeder1028 extends Seeder
{
    public function run()
    {
        Eleve::truncate();
        
        Eleve::create([
            'nom' => 'Depierraz',
            'prenom' => 'Pierre-Eric',
            'npa' => '2735',
            'localite' => 'Bévilard',
            'ecole_id' => 1,
            'volee_id' => 3
        ]);        
        
        Eleve::create([
            'nom' => 'Tobler',
            'prenom' => 'Luc',
            'npa' => '2732',
            'localite' => 'Reconvilier',
            'ecole_id' => 1,
            'volee_id' => 2
        ]);        
 
         Eleve::create([
            'nom' => 'Petit',
            'prenom' => 'Nicolas',
            'npa' => '2710',
            'localite' => 'Tavannes',
            'ecole_id' => 1,
            'volee_id' => 7
        ]);        
               
        
    }
}