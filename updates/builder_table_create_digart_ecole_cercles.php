<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleCercles extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_cercles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('code', 20)->nullable();
            $table->string('designation', 255);
            $table->string('abrege', 100)->nullable();
            $table->string('entete_document', 255);
            #$table->string('responsable', 255);
            $table->string('initiales', 5)->nullable();
            $table->string('nom', 255)->nullable();
            $table->string('prenom', 255)->nullable();
            $table->string('telephonemobile', 20)->nullable();
            $table->string('telephonprof', 20)->nullable();
            $table->string('mail', 255)->nullable();
            $table->string('adresse', 255)->nullable();
            $table->string('npa', 255)->nullable();
            $table->string('localite', 255)->nullable();
            $table->text('complement')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->boolean('is_statistiques')->nullable()->default(1);
            $table->boolean('is_default')->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_cercles');
    }
}
