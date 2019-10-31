<?php namespace DigitalArtisan\Enseignement\Updates;

use Seeder;
use DigitalArtisan\Enseignement\Models\ActiviteStatut;

class Seeder1026 extends Seeder
{
    public function run()
    {
        ActiviteStatut::truncate();
        
        ActiviteStatut::create([
            'designation' => 'En attente',
            'sort_order' => 1,
            'is_finished' => 0,
        ]);        
        
        ActiviteStatut::create([
            'designation' => 'En cours',
            'sort_order' => 2,
            'is_finished' => 0,
        ]);   
        
        ActiviteStatut::create([
            'designation' => 'Terminé',
            'sort_order' => 3,
            'is_finished' => 1,
        ]);           
    }
}