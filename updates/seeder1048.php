<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Annee;

class Seeder1048 extends Seeder
{
    public function run()
    {
        Annee::truncate();

        Annee::create([
            'designation' => '2018-2019',
            'debut' => '2018-08-01',
            'fin' => '2019-07-31',
        ]);
        
        Annee::create([
            'designation' => '2019-2020',
            'debut' => '2019-08-01',
            'fin' => '2020-07-31',
        ]);

        Annee::create([
            'designation' => '2021-2022',
            'debut' => '2021-08-01',
            'fin' => '2022-07-31',
        ]);        
    }
}