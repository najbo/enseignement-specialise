<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

// Types d'activités

class BuilderTableCreateDigitalartisanEnseignementTypes extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('designation', 255);
            $table->text('complement')->nullable();
            $table->boolean('is_archived')->nullable()->default(false);
            $table->integer('sort_order')->nullable()->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_types');
    }
}