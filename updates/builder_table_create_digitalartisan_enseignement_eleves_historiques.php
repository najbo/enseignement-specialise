<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementElevesHistoriques extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_eleves_historiques', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('eleve_id');
            $table->integer('annee_id');
            $table->integer('passage_id')->nullable();
            $table->date('debut')->nullable();
            $table->date('fin')->nullable();
            $table->string('designation', 10)->nullable();
            $table->text('complement')->nullable();
            $table->string('programme', 10)->nullable();
            $table->string('programme_next', 10)->nullable();
            $table->integer('decallage_next')->nullable();
            $table->integer('ecole_id')->nullable();
            $table->string('ecole_libre', 255)->nullable();
            $table->string('ecole_lieu', 255)->nullable();
            $table->boolean('is_auto')->nullable()->default(0);
            $table->boolean('is_done')->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_eleves_historiques');
    }
}