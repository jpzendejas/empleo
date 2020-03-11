<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('vacantes', function(Blueprint $table){
        $table->increments('id');
        $table->string('puesto');
        $table->float('salario');
        $table->integer('numero_plazas');
        $table->string('edad');
        $table->string('habilidades');
        $table->string('pdf');
        $table->date('fecha_expiracion');
        $table->integer('estado_civil_id')->unsigned()->nullable();
        $table->integer('escolaridad_id')->unsigned()->nullable();
        $table->integer('experiencia_id')->unsigned()->nullable();
        $table->integer('causa_id')->unsigned()->nullable();
        $table->integer('empresa_id')->unsigned()->nullable();
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
        Schema::drop('vacantes');
    }
}
