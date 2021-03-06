<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleInter extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_inter', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('code', 255)->nullable();
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('adresse', 255)->nullable();
            $table->string('npa', 10)->nullable();
            $table->string('localite', 255)->nullable();
            $table->string('telephonepro', 20)->nullable();
            $table->string('telephoneprive', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('titre', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('mail', 255)->nullable();
            $table->text('remarque')->nullable();
            $table->boolean('is_actif')->nullable()->default(1);
            $table->integer('auteur_id')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_inter');
    }
}