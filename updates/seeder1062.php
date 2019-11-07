<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\EleveHistorique;

class Seeder1062 extends Seeder
{
    public function run()
    {
        EleveHistorique::truncate();
         
        EleveHistorique::create([
            'eleve_id' => 1,
            'annee_id' => 1,
            'passage_id' => 1,
            'programme_id' => 7,
            'ecole_id' => 1,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 1,
            'annee_id' => 2,
            'passage_id' => 1,
            'programme_id' => 8,
            'ecole_id' => 1,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 1,
            'annee_id' => 3,
            'passage_id' => 1,
            'programme_id' => 9,
            'ecole_id' => 1,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 2,
            'annee_id' => 1,
            'passage_id' => 1,
            'programme_id' => 1,
            'ecole_id' => 2,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 2,
            'annee_id' => 2,
            'passage_id' => 1,
            'programme_id' => 2,
            'ecole_id' => 2,
        ]);                 

    }
}