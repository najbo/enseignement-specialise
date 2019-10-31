<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Pays;

class Seeder1038 extends Seeder
{
    public function run()
    {
        Pays::truncate();
        
        Pays::create([
            'designation' => 'Suisse',
            'iso' => 'CH',
            'is_origine' => 1,
        ]);

        Pays::create([
            'designation' => 'France',
            'iso' => 'FR',
            'is_origine' => 0,
        ]);           

        Pays::create([
            'designation' => 'Italie',
            'iso' => 'IT',
            'is_origine' => 0,
        ]);      

        Pays::create([
            'designation' => 'Allemagne',
            'iso' => 'DE',
            'is_origine' => 0,
        ]);           

        Pays::create([
            'designation' => 'Autriche',
            'iso' => 'AT',
            'is_origine' => 0,
        ]);           
        
        Pays::create([
            'designation' => 'Syrie',
            'iso' => 'SY',
            'is_origine' => 0,
        ]);           

        Pays::create([
            'designation' => 'Portugal',
            'iso' => 'PT',
            'is_origine' => 0,
        ]);               
    }
}