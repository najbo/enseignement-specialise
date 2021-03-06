<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleEns extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_ens', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('initiales', 5)->nullable();
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('telephonemobile', 20)->nullable();
            $table->string('mail', 255)->nullable();
            $table->string('adresse', 255)->nullable();
            $table->string('npa', 255)->nullable();
            $table->string('localite', 255)->nullable();
            $table->string('nss', 16)->nullable();
            $table->text('remarques', 255)->nullable();
            $table->date('naissance')->nullable();
            $table->date('entree')->nullable();
            $table->date('sortie')->nullable();
            $table->integer('genre_id')->nullable()->unsigned();
            $table->integer('langue_id')->nullable()->unsigned();
            $table->string('permis_id', 10)->nullable();
            $table->boolean('is_maitreclasse')->nullable()->default(0);
            $table->boolean('is_direction')->nullable()->default(0);
            $table->boolean('is_actif')->nullable()->default(1);
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_ens');
    }
}