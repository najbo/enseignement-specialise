<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEnseignementPathEleve extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_path_eleve', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('path_id')->unsigned();
            $table->integer('eleve_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['path_id','eleve_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_path_eleve');
    }
}