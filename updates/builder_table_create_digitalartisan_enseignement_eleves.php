<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementEleves extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_eleves', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('adresse', 255)->nullable();
            $table->string('npa', 10)->nullable();
            $table->string('localite', 255)->nullable();
            $table->string('telephoneprive', 20)->nullable();
            $table->string('telephonemobile', 20)->nullable();
            $table->integer('volee_id')->unsigned()->nullable();
            $table->integer('ecole_id')->unsigned();
            $table->integer('pays_id')->unsigned()->nullable();
            $table->integer('genre_id')->nullable()->unsigned();
            $table->integer('langue_id')->nullable()->unsigned();
            $table->string('permis_id', 10)->nullable();
            $table->text('remarque')->nullable();
            $table->date('naissance')->nullable();
            $table->string('nss', 16)->nullable();
            $table->string('programme', 20)->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_eleves');
    }
}