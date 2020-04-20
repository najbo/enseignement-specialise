<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleInterFct extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_inter_fct', function($table)
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
        Schema::dropIfExists('digart_ecole_inter_fct');
    }
}
