<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Eleve;
# use DigArt\Ecole\Models\Gestionnaire;



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
            'volee_id' => 3,
            'genre_id' => 2,
            'langue_id' => 1,
            'pays_id' => 1,
            'programme' => '7A',
        ]);        
        
        Eleve::create([
            'nom' => 'Tobler',
            'prenom' => 'Luc',
            'npa' => '2732',
            'localite' => 'Reconvilier',
            'ecole_id' => 1,
            'volee_id' => 2,
            'genre_id' => 2,
            'langue_id' => 1,
            'pays_id' => 2,
            'programme' => '3B',
        ]);        
 
         Eleve::create([
            'nom' => 'Petit',
            'prenom' => 'Nicolas',
            'npa' => '2710',
            'localite' => 'Tavannes',
            'ecole_id' => 1,
            'volee_id' => 7,
            'genre_id' => 2,
            'langue_id' => 2,
            'pays_id' => 1,
            'programme' => '6A',
        ]);        
               
         Eleve::create([
            'nom' => 'Therraz',
            'prenom' => 'Aurélie',
            'npa' => '2732',
            'localite' => 'Loveresse',
            'ecole_id' => 3,
            'volee_id' => 5,
            'genre_id' => 3,
            'langue_id' => 3,
            'pays_id' => 3,
        ]);          
    }
}