<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\EcoleType;

class Seeder1057 extends Seeder
{
    public function run()
    {
        EcoleType::truncate();
         
        EcoleType::create([
            'designation' => 'Primaire',
            'abreviation' => 'EP',
            'sort_order' => 1,
        ]);
        
        EcoleType::create([
            'designation' => 'Secondaire',
            'abreviation' => 'ES',
            'sort_order' => 2,
        ]);        
    }
}