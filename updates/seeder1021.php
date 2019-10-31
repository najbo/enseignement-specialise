<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Pathologies;

class Seeder1021 extends Seeder
{
    public function run()
    {
        Pathologies::truncate();
        
        Pathologies::create([
            'designation' => 'Dyslexie'
        ]);
        
        Pathologies::create([
            'designation' => 'Dysorthographie'
        ]);
        
        Pathologies::create([
            'designation' => 'Dyspraxie'
        ]);
        
        Pathologies::create([
            'designation' => 'Dysphasie'
        ]);
        
        Pathologies::create([
            'designation' => 'Dyscalculie'
        ]);
        
        Pathologies::create([
            'designation' => 'Allophonie'
        ]);        
        
        Pathologies::create([
            'designation' => "Trouble de l'attention"
        ]);

        Pathologies::create([
            'designation' => 'Hyperactivité'
        ]);
        
        Pathologies::create([
            'designation' => 'Retard cognitif'
        ]);        
        
        Pathologies::create([
            'designation' => 'Trouble du spectre autistique'
        ]);        
        
        Pathologies::create([
            'designation' => 'Trouble psychologique'
        ]);        
        
        Pathologies::create([
            'designation' => 'Haut potentiel'
        ]);                
        
    }
}