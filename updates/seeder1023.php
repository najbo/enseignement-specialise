<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Fonction;

class Seeder1023 extends Seeder
{
    public function run()
    {
        Fonction::truncate();
        
        Fonction::create([
            'designation' => 'Logopédiste'
        ]);
        
        Fonction::create([
            'designation' => 'Psychomotricien'
        ]);
        
        Fonction::create([
            'designation' => 'Enseignant spécialisé'
        ]);
        
        Fonction::create([
            'designation' => 'Assistant social'
        ]);
        
        Fonction::create([
            'designation' => 'Médecin généraliste'
        ]);

        Fonction::create([
            'designation' => 'Psychologue'
        ]);
        
        Fonction::create([
            'designation' => 'Psychiatre'
        ]);
        
        Fonction::create([
            'designation' => 'Travailleur social'
        ]);        
    }
}