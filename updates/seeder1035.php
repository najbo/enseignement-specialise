<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Enseignant;

class Seeder1035 extends Seeder
{
    public function run()
    {
        Enseignant::truncate();
        
        Enseignant::create([
            'initiales' => 'MBA',
            'nom' => 'Bassin',
            'prenom' => 'Marilyne',
            'Adresse' => 'Rue du Tempé 18',
            'npa' => '2520',
            'localite' => 'La Neuveville',
            'is_maitreclasse' => 1,
            'is_direction' => 0,
            'genre_id' => 2,
            'langue_id' => 1,
        ]);         

        Enseignant::create([
            'initiales' => 'VL',
            'nom' => 'Léchot',
            'prenom' => 'Virginie',
            'Adresse' => 'Le Saucy 32',
            'npa' => '2722',
            'localite' => 'Les Reussilles',
            'is_maitreclasse' => 0,
            'is_direction' => 1,
            'genre_id' => 2,
            'langue_id' => 1,
        ]);  
        
        Enseignant::create([
            'initiales' => 'RG',
            'nom' => 'Günter',
            'prenom' => 'Renaud',
            'Adresse' => 'Wasen',
            'npa' => '2502',
            'localite' => 'Bienne',
            'is_maitreclasse' => 0,
            'is_direction' => 1,
            'genre_id' => 1,
            'langue_id' => 2,
        ]);          

    }
}