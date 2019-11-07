<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementAnnees extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_annees', function($table)
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
            $table->boolean('is_archived')->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_annees');
    }
}