<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleActivStatuts extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_activstatuts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('designation', 255);
            $table->text('complement')->nullable();
            $table->string('color_txt', 20)->default('#000000')->nullable();
            $table->string('color_bg', 20)->default('#bdc3c7')->nullable();
            $table->integer('sort_order')->nullable();
            $table->boolean('is_finished')->nullable()->default(0);
            $table->boolean('is_actif')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_activstatuts');
    }
}