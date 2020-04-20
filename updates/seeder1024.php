<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Interlocuteur;

class Seeder1024 extends Seeder
{
    public function run()
    {
        Interlocuteur::truncate();
        
        Interlocuteur::create([
            'nom' => 'Picard',
            'prenom' => 'Jean-Noël',
            'titre' => 'Psychiatre dipl.',
            'adresse' => 'Rue des Aérostiers 201',
            'npa' => '1000',
            'localite' => 'Lausanne',
            'mail' => 'picard@example.org'
        ]);
        
        Interlocuteur::create([
            'nom' => 'Bichsel',
            'prenom' => 'Jürg',
            'titre' => 'Psychologue',
            'adresse' => 'Rue des Barbiers 3',
            'npa' => '2732',
            'localite' => 'Reconvilier',
            'mail' => 'big_bichsel@example.org'
        ]);        
    }
}