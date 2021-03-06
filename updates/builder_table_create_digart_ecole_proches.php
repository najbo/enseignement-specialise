<?php namespace DigArt\Ecole\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDigartEcoleProches extends Migration
{
    public function up()
    {
        Schema::create('digart_ecole_proches', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('eleve_id');
            $table->string('nom', 255);
            $table->string('prenom', 255);
            $table->string('adresse', 255)->nullable();
            $table->string('npa', 10)->nullable();
            $table->string('localite', 255)->nullable();
            $table->string('telephonemobile', 20)->nullable();
            $table->string('telephoneprof', 20)->nullable();
            $table->string('mail', 255)->nullable();
            $table->string('profession', 255)->nullable();
            $table->text('remarque')->nullable();
            $table->string('role_id', 10)->nullable();
            $table->string('role', 255)->nullable();
            $table->string('permis_id', 10)->nullable();
            $table->boolean('is_autoriteparentale')->nullable()->default(0);
            $table->boolean('is_autredomicile')->nullable()->default(0);
            $table->boolean('is_actif')->nullable()->default(1);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('digart_ecole_proches');
    }
}