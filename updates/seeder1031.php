<?php namespace DigArt\Ecole\Updates;

use Seeder;
use DigArt\Ecole\Models\ProcheRole;

class Seeder1031 extends Seeder
{
    public function run()
    {
        ProcheRole::truncate();
        
        ProcheRole::create([
            'designation' => 'Père',
            'is_autre' => 0,
            'sort_order' => 1
        ]);  

        ProcheRole::create([
            'designation' => 'Mère',
            'is_autre' => 0,
            'sort_order' => 2
        ]);  
        
        ProcheRole::create([
            'designation' => 'Autre',
            'is_autre' => 1,            
            'sort_order' => 3,
        ]);          
    }
}