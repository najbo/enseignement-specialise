<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Programme;

class Seeder1061 extends Seeder
{
    public function run()
    {
        Programme::truncate();
         
        Programme::create([
            'designation' => '1H',
            'typecole_id' => 1,
            'cycle_id' => 1,
            'programmesuivant_id' => 2,
            'sort_order' => 1,
        ]);

        Programme::create([
            'designation' => '2H',
            'typecole_id' => 1,
            'cycle_id' => 1,
            'programmesuivant_id' => 3,
            'sort_order' => 2,
        ]);        

        Programme::create([
            'designation' => '3H',
            'typecole_id' => 1,
            'cycle_id' => 1,
            'programmesuivant_id' => 4,
            'sort_order' => 3,
        ]);

        Programme::create([
            'designation' => '4H',
            'typecole_id' => 1,
            'cycle_id' => 1,
            'programmesuivant_id' => 5,
            'sort_order' => 4,
        ]);

        Programme::create([
            'designation' => '5H',
            'typecole_id' => 1,
            'cycle_id' => 2,
            'programmesuivant_id' => 6,
            'sort_order' => 5,
        ]);

        Programme::create([
            'designation' => '6H',
            'typecole_id' => 1,
            'cycle_id' => 2,
            'programmesuivant_id' => 7,
            'sort_order' => 6,
        ]);

        Programme::create([
            'designation' => '7H',
            'typecole_id' => 1,
            'cycle_id' => 2,
            'programmesuivant_id' => 8,
            'sort_order' => 7,
        ]);

        Programme::create([
            'designation' => '8H',
            'typecole_id' => 1,
            'cycle_id' => 2,
            'programmesuivant_id' => 9,
            'sort_order' => 8,
        ]);

        Programme::create([
            'designation' => '9H',
            'typecole_id' => 2,
            'cycle_id' => 3,
            'programmesuivant_id' => 10,
            'sort_order' => 9,
        ]);

        Programme::create([
            'designation' => '10H',
            'typecole_id' => 2,
            'cycle_id' => 3,
            'programmesuivant_id' => 11,
            'sort_order' => 10,
        ]);        

        Programme::create([
            'designation' => '11H',
            'typecole_id' => 2,
            'cycle_id' => 3,
            'programmesuivant_id' => null,
            'sort_order' => 11,
        ]);        
    }
}