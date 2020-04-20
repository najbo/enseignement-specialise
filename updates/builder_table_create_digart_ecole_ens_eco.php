<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleEnsEco extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_ens_eco', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('ens_id')->unsigned();
            $table->integer('eco_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['ens_id','eco_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_ens_eco');
    }
}