<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicacionesVacantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplicaciones_vacantes',function(Blueprint $table){
          $table->increments('id');
          $table->string('nombre');
          $table->string('apellidos');
          $table->string('genero');
          $table->integer('edad');
          $table->integer('telefono');
          $table->string('correo');
          $table->string('cv');
          $table->date('fecha_aplicacion');
          $table->integer('vacante_id')->unsigned()->nullable();
          $table->integer('escolaridad_id')->unsigned()->nullable();
          $table->integer('estatus_aplicacion_id')->unsigned()->nullable();
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
        Schema::drop('aplicaciones_vacantes');
    }
}
