<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleTherapies extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_therapies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('designation', 255);
            $table->string('abreviation', 20)->nullable();
            $table->text('complement')->nullable();
            $table->string('color', 20)->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->boolean('is_statistiques')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_therapies');
    }
}