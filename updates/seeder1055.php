<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\TypeFait;

class Seeder1055 extends Seeder
{
    public function run()
    {
        TypeFait::truncate();
         
        TypeFait::create([
            'designation' => 'Autre',
            'is_eleve' => true,
            'sort_order' => 1,
        ]);
        
        TypeFait::create([
            'designation' => 'Correspondance',
            'is_eleve' => true,
            'sort_order' => 2,
        ]);
        
        TypeFait::create([
            'designation' => 'Entretien personnel',
            'is_eleve' => true,
            'sort_order' => 3,
        ]);
        
                
        TypeFait::create([
            'designation' => 'Congé',
            'is_eleve' => true,
            'sort_order' => 4,
        ]);         
        
        TypeFait::create([
            'designation' => 'Vacances',
            'is_eleve' => true,
            'sort_order' => 5,
        ]);         
        
        TypeFait::create([
            'designation' => 'Accident',
            'is_eleve' => true,
            'sort_order' => 6,
        ]);                 
        
        TypeFait::create([
            'designation' => 'Maladie',
            'is_eleve' => true,
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
            'is_eleve' => true,
            'sort_order' => 10,
        ]);
        
        TypeFait::create([
            'designation' => 'Avertissement écrit',
            'is_eleve' => true,
            'sort_order' => 11,
        ]);

        TypeFait::create([
            'designation' => 'Entretien avec les parents',
            'is_eleve' => true,
            'is_enseignant' => false,
            'sort_order' => 50,
        ]);

        TypeFait::create([
            'designation' => 'Suspension',
            'is_eleve' => true,
            'is_enseignant' => false,
            'sort_order' => 51,
        ]);

        TypeFait::create([
            'designation' => 'Exclusion d\'école',
            'is_eleve' => true,
            'is_enseignant' => false,
            'sort_order' => 52,
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