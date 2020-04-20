<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Statut;

class Seeder1018 extends Seeder
{
    public function run()
    {
        Statut::truncate();
        
        Statut::create([
            'designation' => 'En cours',
            'sort_order' => 1,
            'color_bg' => '#f39c12',
            'color_txt' => '#ffffff',
            'is_finished' => 0,
        ]);

        Statut::create([
            'designation' => 'En cours (attention)',
            'sort_order' => 2,
            'color_bg' => '#c0392b',
            'color_txt' => '#ffffff',
            'is_finished' => 0,
        ]);        

        Statut::create([
            'designation' => 'En pause',
            'sort_order' => 3,
            'color_bg' => '#9b59b6',
            'color_txt' => '#ffffff',
            'is_finished' => 0,
        ]);        
        
        Statut::create([
            'designation' => 'Terminé',
            'sort_order' => 3,
            'color_bg' => '#27ae60',
            'color_txt' => '#ffffff',
            'is_finished' => 1,
        ]);
    }
}