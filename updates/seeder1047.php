<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\ProchePermis;

class Seeder1047 extends Seeder
{
    public function run()
    {
        ProchePermis::truncate();
        
        ProchePermis::create([
            'designation' => 'Suisse établi',
            'sort_order' => '1',
        ]);

        ProchePermis::create([
            'designation' => 'Permis C',
            'sort_order' => '2',
        ]);
        
        ProchePermis::create([
            'designation' => 'Permis B',
            'sort_order' => '3',
        ]);
        
        ProchePermis::create([
            'designation' => 'Permis G',
            'sort_order' => '4',
        ]);     

        ProchePermis::create([
            'designation' => 'Permis F',
            'sort_order' => '5',
        ]);             

        ProchePermis::create([
            'designation' => 'Autre permis',
            'sort_order' => '100',
        ]);             
    }
}