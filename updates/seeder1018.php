<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\Status;

class Seeder1018 extends Seeder
{
    public function run()
    {
        Status::truncate();
        
        Status::create([
            'designation' => 'En cours',
            'sort_order' => 1,
            'is_finished' => 0,
        ]);
        
        Status::create([
            'designation' => 'Terminé',
            'sort_order' => 2,
            'is_finished' => 1,
        ]);
    }
}