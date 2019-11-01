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
            'color_bg' => '#f39c12',
            'color_txt' => '#ffffff',
            'is_finished' => 0,
        ]);

        Status::create([
            'designation' => 'En cours (attention)',
            'sort_order' => 2,
            'color_bg' => '#c0392b',
            'color_txt' => '#ffffff',
            'is_finished' => 0,
        ]);        
        
        Status::create([
            'designation' => 'Terminé',
            'sort_order' => 3,
            'color_bg' => '#27ae60',
            'color_txt' => '#ffffff',
            'is_finished' => 1,
        ]);
    }
}