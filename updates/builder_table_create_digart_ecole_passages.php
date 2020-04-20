<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEnseignementPassages extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_passages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('designation', 255);
            $table->string('abreviation', 20)->nullable();
            $table->text('complement')->nullable();
            $table->integer('passagetype_id')->nullable(); // 1 = Promu ; 2 = Redouble / 3 = Saute une année / 4 = Fin / sortie d'école / 5 = Pause
            $table->integer('sort_order')->nullable();
            $table->integer('decalage')->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_passages');
    }
}