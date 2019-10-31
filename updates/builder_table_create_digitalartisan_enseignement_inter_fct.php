<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementInterFct extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_inter_fct', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('interloc_id')->unsigned();
            $table->integer('fct_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['interloc_id','fct_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_inter_fct');
    }
}
