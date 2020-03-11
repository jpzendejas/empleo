<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkVacantesAplicacionesvacantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aplicaciones_vacantes', function(Blueprint $table){
          $table->foreign('vacante_id')->references('id')->on('vacantes')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aplicaciones_vacantes', function(Blueprint $table){
          $table->dropForeign(['vacante_id']);
        });
    }
}
