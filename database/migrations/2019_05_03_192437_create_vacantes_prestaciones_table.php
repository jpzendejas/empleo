<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantesPrestacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacante_prestaciones', function(Blueprint $table){
          $table->increments('id');
          $table->integer('vacante_id')->unsigned()->nullable();
          $table->integer('prestacion_id')->unsigned()->nullable();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('vacante_prestaciones');
    }
}
