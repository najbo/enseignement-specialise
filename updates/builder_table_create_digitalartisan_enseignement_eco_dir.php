<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementEcoDir extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_eco_dir', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('eco_id')->unsigned();
            $table->integer('ens_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['eco_id','ens_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_eco_dir');
    }
}
