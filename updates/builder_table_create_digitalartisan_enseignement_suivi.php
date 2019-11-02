<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementSuivi extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_suivi', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('debut');
            $table->date('fin')->nullable();
            $table->string('designation', 255);
            $table->text('remarques')->nullable();
            $table->text('bilan')->nullable();
            $table->integer('eleve_id');
            $table->integer('statut_id');
            $table->integer('gestionnaire_id')->nullable()->unsigned();
            $table->boolean('is_archived')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_suivi');
    }
}