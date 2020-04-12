<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementProgrammes extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_programmes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('designation', 10);
            $table->text('complement')->nullable();
            $table->integer('typecole_id')->nullable()->unsigned();
            $table->integer('cycle_id')->nullable()->unsigned();
            $table->integer('programmesuivant_id')->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->integer('sort_order')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_programmes');
    }
}