<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Pathologie;

class Seeder1021 extends Seeder
{
    public function run()
    {
        Pathologie::truncate();
        
        Pathologie::create([
            'designation' => 'Dyslexie'
        ]);
        
        Pathologie::create([
            'designation' => 'Dysorthographie'
        ]);
        
        Pathologie::create([
            'designation' => 'Dyspraxie'
        ]);
        
        Pathologie::create([
            'designation' => 'Dysphasie'
        ]);
        
        Pathologie::create([
            'designation' => 'Dyscalculie'
        ]);
        
        Pathologie::create([
            'designation' => 'Allophonie'
        ]);        
        
        Pathologie::create([
            'designation' => "Trouble de l'attention"
        ]);

        Pathologie::create([
            'designation' => 'Hyperactivité'
        ]);
        
        Pathologie::create([
            'designation' => 'Retard cognitif'
        ]);        
        
        Pathologie::create([
            'designation' => 'Trouble du spectre autistique'
        ]);        
        
        Pathologie::create([
            'designation' => 'Trouble psychologique'
        ]);        
        
        Pathologie::create([
            'designation' => 'Haut potentiel'
        ]);                
        
    }
}