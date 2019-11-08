<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Volee;

class Seeder1029 extends Seeder
{
    public function run()
    {
        Volee::truncate();
        
        Volee::create([
            'designation' => '2019',
            #'programme' => '1H'
        ]);             

        Volee::create([
            'designation' => '2018',
            # 'programme' => '2H'
        ]); 

        Volee::create([
            'designation' => '2017',
            # 'programme' => '3H'            
        ]); 
        
        Volee::create([
            'designation' => '2016',
            # 'programme' => '4H'            
        ]);    

        Volee::create([
            'designation' => '2015',
            # 'programme' => '5H'
        ]);             

        Volee::create([
            'designation' => '2014',
            # 'programme' => '6H'
        ]); 

        Volee::create([
            'designation' => '2013',
            #'programme' => '7H'            
        ]); 
        
        Volee::create([
            'designation' => '2012',
            # 'programme' => '8H'            
        ]); 

        Volee::create([
            'designation' => '2011',
            #'programme' => '9H'
        ]); 

        Volee::create([
            'designation' => '2010',
            #'programme' => '10H'            
        ]); 
        
        Volee::create([
            'designation' => '2009',
            #'programme' => '11H'            
        ]);                
    }
}