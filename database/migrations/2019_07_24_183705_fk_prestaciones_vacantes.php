<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkPrestacionesVacantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('vacante_prestaciones', function(Blueprint $table){
        $table->foreign('vacante_id')->references('id')->on('vacantes')->onUpdate('cascade')->onDelete('set null');
        $table->foreign('prestacion_id')->references('id')->on('prestaciones')->onUpdate('cascade')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacante_prestaciones', function(Blueprint $table){
          $table->dropForeign(['vacante_id']);
          $table->dropForeign(['prestacion_id']);
        });
    }
}
