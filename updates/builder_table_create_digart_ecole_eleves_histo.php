<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleElevesHisto extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_eleves_histo', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('eleve_id');
            $table->integer('annee_id');
            $table->integer('passage_id')->nullable();
            $table->date('debut')->nullable();
            $table->date('fin')->nullable();
            $table->timestamp('bouclement')->nullable();
            $table->string('designation', 255)->nullable();
            $table->text('complement')->nullable();
            $table->integer('programme_id')->nullable();
            $table->string('programme', 10)->nullable();
            $table->string('programme_next', 10)->nullable();
            $table->integer('programme_next_id')->nullable();
            $table->integer('decalage_next')->nullable();
            $table->integer('ecole_id')->nullable();
            $table->string('ecole_libre', 255)->nullable();
            $table->string('ecole_lieu', 255)->nullable();
            $table->boolean('is_auto')->nullable()->default(0);
            $table->boolean('is_done')->nullable()->default(0);
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_eleves_histo');
    }
}