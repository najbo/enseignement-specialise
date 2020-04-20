<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEnseignementSuiviEnseignants extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_suivi_enseignants', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('suivi_id')->unsigned();
            $table->integer('enseignant_id')->nullable()->unsigned();
            $table->string('nom', 255)->nullable();
            $table->string('prenom', 255)->nullable();
            $table->string('telephonemobile', 20)->nullable();
            $table->string('mail', 255)->nullable();
            $table->string('complement', 255)->nullable();
            $table->text('remarques')->nullable();
            $table->date('debut')->nullable();
            $table->date('fin')->nullable();
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_suivi_enseignants');
    }
}