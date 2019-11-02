<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Genre;

class Seeder1042 extends Seeder
{
    public function run()
    {
        Genre::truncate();
         
        Genre::create([
            'designation' => 'Homme',
            'abreviation' => 'H',
            'sort_order' => 1,
        ]);          
        
        Genre::create([
            'designation' => 'Femme',
            'abreviation' => 'F',
            'sort_order' => 2,
        ]);          

        Genre::create([
            'designation' => 'Autre',
            'abreviation' => '-',
            'sort_order' => 100,
        ]);         
    }
}