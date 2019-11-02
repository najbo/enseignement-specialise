<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Sexe;

class Seeder1042 extends Seeder
{
    public function run()
    {
        Sexe::truncate();
        
        Sexe::create([
            'designation' => 'A définir',
            'abreviation' => 'N/A',
            'sort_order' => 1,
        ]);  
        
        Sexe::create([
            'designation' => 'Homme',
            'abreviation' => 'H',
            'sort_order' => 2,
        ]);          
        
        Sexe::create([
            'designation' => 'Femme',
            'abreviation' => 'F',
            'sort_order' => 3,
        ]);          
    }
}