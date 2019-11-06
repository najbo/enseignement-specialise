<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\TypeFait;

class Seeder1055 extends Seeder
{
    public function run()
    {
        TypeFait::truncate();
         
        TypeFait::create([
            'designation' => 'Autre',
            'sort_order' => 1,
        ]);
        
        TypeFait::create([
            'designation' => 'Correspondance',
            'sort_order' => 2,
        ]);
        
        TypeFait::create([
            'designation' => 'Entretien personnel',
            'sort_order' => 3,
        ]);
        
                
        TypeFait::create([
            'designation' => 'Congé',
            'sort_order' => 4,
        ]);         
        
        TypeFait::create([
            'designation' => 'Vacances',
            'sort_order' => 5,
        ]);         
        
        TypeFait::create([
            'designation' => 'Accident',
            'sort_order' => 6,
        ]);                 
        
        TypeFait::create([
            'designation' => 'Maladie',
            'sort_order' => 7,
        ]);         
        
        TypeFait::create([
            'designation' => 'Congé maternité',
            'sort_order' => 8,
        ]);                 
        
        TypeFait::create([
            'designation' => 'Pause sabbatique',
            'sort_order' => 9,
        ]);                         
        
        TypeFait::create([
            'designation' => 'Avertissement oral',
            'sort_order' => 10,
        ]);
        
        TypeFait::create([
            'designation' => 'Avertissement écrit',
            'sort_order' => 11,
        ]);

        TypeFait::create([
            'designation' => 'Début des rapports',
            'sort_order' => 200,
        ]);
                  
        TypeFait::create([
            'designation' => 'Fin des rapports',
            'sort_order' => 201,
        ]);
                                
                
    }
}