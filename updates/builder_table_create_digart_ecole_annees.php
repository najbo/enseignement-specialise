<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleAnnees extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_annees', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('designation', 255);
            $table->date('debut');
            $table->date('fin');
            $table->integer('anneesuivante_id')->nullable();
            $table->text('complement')->nullable();
            $table->timestamp('bouclement')->nullable();
            $table->integer('gestionnaire_id')->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_annees');
    }
}