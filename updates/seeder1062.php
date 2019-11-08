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
            'debut' => '2016-08-01',
            'fin' => '2017-07-31',
            'ecole_id' => 1,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 1,
            'annee_id' => 2,
            'passage_id' => 1,
            'programme_id' => 8,
            'debut' => '2017-08-01',
            'fin' => '2018-07-31',
            'ecole_id' => 1,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 1,
            'annee_id' => 3,
            'passage_id' => 1,
            'programme_id' => 9,
            'debut' => '2018-08-01',
            'fin' => '2019-07-31',
            'ecole_id' => 1,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 2,
            'annee_id' => 1,
            'passage_id' => 1,
            'programme_id' => 1,
            'debut' => '2016-08-01',
            'fin' => '2017-07-31',
            'ecole_id' => 2,
        ]); 

        EleveHistorique::create([
            'eleve_id' => 2,
            'annee_id' => 2,
            'passage_id' => 1,
            'programme_id' => 2,
            'debut' => '2017-08-01',
            'fin' => '2018-07-31',
            'ecole_id' => 2,
        ]);                 

    }
}