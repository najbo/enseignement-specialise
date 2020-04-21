<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleTypesfaits extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_typesfaits', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('designation', 255);
            $table->text('complement')->nullable();
            $table->integer('sort_order')->nullable()->default(0);
            $table->boolean('is_actif')->nullable()->default(1);
            $table->boolean('is_enseignant')->nullable()->default(1);
            $table->boolean('is_eleve')->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_typesfaits');
    }
}