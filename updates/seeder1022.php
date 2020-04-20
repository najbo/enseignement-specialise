<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\Therapie;

class Seeder1022 extends Seeder
{
    public function run()
    {
        Therapie::truncate();
        
        Therapie::create([
            'designation' => 'SPA'
        ]);
        
        Therapie::create([
            'designation' => 'FLS'
        ]);
        
        Therapie::create([
            'designation' => 'OAIR'
        ]);        
        
        Therapie::create([
            'designation' => 'Logopédie'
        ]);
        
        Therapie::create([
            'designation' => 'Psychomotricité'
        ]);
        
        Therapie::create([
            'designation' => 'AEMO'
        ]);

        Therapie::create([
            'designation' => 'ODED'
        ]);

        Therapie::create([
            'designation' => 'Protection'
        ]);        
        
        Therapie::create([
            'designation' => 'Médiation'
        ]);
        
        Therapie::create([
            'designation' => 'Groupe de soutien'
        ]);        
        
        Therapie::create([
            'designation' => 'Pool 1'
        ]);
        
        Therapie::create([
            'designation' => 'Pool 2'
        ]);        

        Therapie::create([
            'designation' => 'Article 18'
        ]);
        
        Therapie::create([
            'designation' => 'ODED 27'
        ]);            

        Therapie::create([
            'designation' => 'Psychothérapie'
        ]);
        
    }
}