<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('empresas', function(Blueprint $table){
        $table->increments('id');
        $table->string('empresa');
        $table->integer('numero_empleados');
        $table->string('direccion');
        $table->string('colonia');
        $table->string('rfc');
        $table->integer('codigo_postal');
        $table->string('telefono');
        $table->string('correo_electronico');
        $table->string('logo');
        $table->integer('municipio_id')->unsigned()->nullable();
        $table->integer('sector_id')->unsigned()->nullable();
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
        Schema::drop('empresas');
    }
}
