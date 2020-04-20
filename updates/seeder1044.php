<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Langue;

class Seeder1044 extends Seeder
{
    public function run()
    {
        Langue::truncate();
        
        Langue::create([
            'designation' => 'Français',
            'abreviation' => 'FR',
            'sort_order' => 1,
        ]);
        
        Langue::create([
            'designation' => 'Allemand',
            'abreviation' => 'DE',
            'sort_order' => 2,
        ]);  
        
        Langue::create([
            'designation' => 'Italien',
            'abreviation' => 'IT',
            'sort_order' => 3,
        ]);  
        
        Langue::create([
            'designation' => 'Espagnol',
            'abreviation' => 'ES',
            'sort_order' => 4,
        ]);  
        
        Langue::create([
            'designation' => 'Portugais',
            'abreviation' => 'PT',
            'sort_order' => 5,    
        ]);  
        
        Langue::create([
            'designation' => 'Anglais',
            'abreviation' => 'EN',
            'sort_order' => 6,
        ]);  
        
        Langue::create([
            'designation' => 'Autre',
            'abreviation' => '--',
            'sort_order' => 100,
        ]);          
                
        
    }
}