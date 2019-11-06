<?php namespace DigitalArtisan\Enseignement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigitalartisanEnseignementEnseignantsFaits extends Migration
{
    public function up()
    {
        Schema::create('digitalartisan_enseignement_enseignants_faits', function($table)
        {
                $table->engine = 'InnoDB';
                $table->increments('id')->unsigned();
                $table->integer('enseignant_id');
                $table->integer('typefait_id')->nullable();
                $table->date('debut');
                $table->date('fin')->nullable();
                $table->string('designation', 255);
                $table->text('complement')->nullable();
                $table->boolean('is_closed')->default(0);
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digitalartisan_enseignement_enseignants_faits');
    }
}