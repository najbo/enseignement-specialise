<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementPathEleve extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_path_eleve', function($table)
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
        Schema::dropIfExists('digitalartisan_enseignement_path_eleve');
    }
}