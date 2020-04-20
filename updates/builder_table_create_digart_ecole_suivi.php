<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleSuivi extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_suivi', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->date('debut');
            $table->date('fin')->nullable();
            $table->string('designation', 255);
            $table->text('remarques')->nullable();
            $table->text('bilan')->nullable();
            $table->integer('eleve_id');
            $table->integer('statut_id');
            $table->integer('gestionnaire_id')->nullable()->unsigned();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_suivi');
    }
}