<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Annee;

class Seeder1048 extends Seeder
{
    public function run()
    {
        Annee::truncate();

        Annee::create([
            'designation' => '2016-2017',
            'debut' => '2016-08-01',
            'fin' => '2017-07-31',
            'anneesuivante_id' => 2
        ]);         
        
        Annee::create([
            'designation' => '2017-2018',
            'debut' => '2017-08-01',
            'fin' => '2018-07-31',
            'anneesuivante_id' => 3
        ]);         

        Annee::create([
            'designation' => '2018-2019',
            'debut' => '2018-08-01',
            'fin' => '2019-07-31',
            'anneesuivante_id' => 4
        ]);
        
        Annee::create([
            'designation' => '2019-2020',
            'debut' => '2019-08-01',
            'fin' => '2020-07-31',
            'anneesuivante_id' => 5
        ]);

        Annee::create([
            'designation' => '2020-2021',
            'debut' => '2020-08-01',
            'fin' => '2021-07-31',
            'anneesuivante_id' => 6
        ]);

        Annee::create([
            'designation' => '2021-2022',
            'debut' => '2021-08-01',
            'fin' => '2022-07-31',
            'anneesuivante_id' => 7
        ]); 
        
        Annee::create([
            'designation' => '2022-2023',
            'debut' => '2022-08-01',
            'fin' => '2023-07-31',
        ]);         
    }
}