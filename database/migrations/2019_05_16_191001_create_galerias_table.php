<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('galerias', function(Blueprint $table){
        $table->increments('id');
        $table->string('titulo');
        $table->string('descripcion');
        $table->string('img');
        $table->date('fecha_expiracion');
        $table->integer('usuario_id')->unsigned()->nullable();
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
        Schema::drop('galerias');
    }
}
