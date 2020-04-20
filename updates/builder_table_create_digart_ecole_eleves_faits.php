<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEnseignementElevesFaits extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_eleves_faits', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('eleve_id');
            $table->date('debut');
            $table->date('fin')->nullable();
            $table->string('designation', 255);
            $table->text('complement')->nullable();
            $table->boolean('is_closed')->default(0);
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_eleves_faits');
    }
}