<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEnseignementProgrammes extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_programmes', function($table)
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
        Schema::dropIfExists('digart_ecole_programmes');
    }
}