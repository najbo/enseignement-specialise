<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleSuiviActivites extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_suivi_activites', function($table)
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
            $table->string('resume', 255);
            $table->text('developpement')->nullable();
            $table->dateTime('prochaineecheance')->nullable();
            $table->string('prochaineaction', 255)->nullable();
            $table->integer('gestionnaire_id')->nullable();
            $table->boolean('is_termine')->nullable()->default(false);
            $table->string('emplacement', 255)->nullable();
            $table->string('tiers', 255)->nullable();
            $table->integer('statut_id')->nullable();
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_suivi_activites');
    }
}