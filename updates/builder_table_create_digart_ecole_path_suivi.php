<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEnseignementPathSuivi extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_path_suivi', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('path_id')->unsigned();
            $table->integer('suivi_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['path_id','suivi_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_path_suivi');
    }
}