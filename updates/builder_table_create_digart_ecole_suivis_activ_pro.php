<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleSuivisActivPro extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_suivis_activ_pro', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('activite_id')->unsigned();
            $table->integer('proche_id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->primary(['activite_id','proche_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_suivis_activ_pro');
    }
}