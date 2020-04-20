<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Cercle;

class Seeder1040 extends Seeder
{
    public function run()
    {
        Cercle::truncate();
        
        Cercle::create([
            'designation' => 'Tavannes',
            'entete_document' => 'Enseignement spécialisé | Cercle de Tavannes',
            'prenom' => 'Virginie',
            'nom' => 'Léchot',
            'adresse' => 'Le Saucy 32',
            'npa' => '2722',
            'localite' => 'Les Reussilles',
            'is_default' => 1,
        ]);
    }
}