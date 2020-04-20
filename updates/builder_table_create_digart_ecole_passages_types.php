<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEnseignementPassagesTypes extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_passages_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id')->unsigned();
            $table->string('designation', 255);
            $table->text('complement')->nullable();
            $table->integer('sort_order')->nullable()->unsigned();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_passages_types');
    }
}
