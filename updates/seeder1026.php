<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\ActiviteStatut;

class Seeder1026 extends Seeder
{
    public function run()
    {
        ActiviteStatut::truncate();
        
        ActiviteStatut::create([
            'designation' => 'En cours',
            'sort_order' => 1,
            'is_finished' => 0,
            'color_bg' => '#f39c12',
            'color_txt' => '#ffffff',
        ]);   

        ActiviteStatut::create([
            'designation' => 'En attente',
            'sort_order' => 2,
            'is_finished' => 0,
            'color_bg' => '#c0392b',
            'color_txt' => '#ffffff',
        ]);        
        
        ActiviteStatut::create([
            'designation' => 'Terminé',
            'sort_order' => 3,
            'is_finished' => 1,
            'color_bg' => '#27ae60',
            'color_txt' => '#ffffff',
        ]);           
    }
}