<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementSuiviActivites extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_suivi_activites', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('suivi_id')->unsigned();
            $table->integer('type_id')->nullable();
            $table->integer('interlocuteur_id')->nullable();
            $table->integer('therapie_id')->nullable();
            $table->dateTime('debut');
            $table->dateTime('fin')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('prochaineecheance')->nullable();
            $table->integer('gestionnaire_id')->nullable();
            $table->string('resume', 255);
            $table->text('developpement')->nullable();
            $table->boolean('is_termine')->nullable()->default(false);
            $table->string('emplacement', 255)->nullable();
            $table->integer('statut_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_suivi_activites');
    }
}