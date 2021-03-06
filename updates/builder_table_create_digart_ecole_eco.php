<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleEco extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_eco', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('abreviation', 50)->nullable();
            $table->string('designation', 255);
            $table->string('adresse', 255)->nullable();
            $table->string('npa', 10)->nullable();
            $table->string('localite', 255)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('mail', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->integer('cercle_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned()->nullable();
            $table->integer('ecolesuivante_id')->unsigned()->nullable();
            $table->integer('sort_order')->nullable();
            $table->text('complement')->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_eco');
    }
}