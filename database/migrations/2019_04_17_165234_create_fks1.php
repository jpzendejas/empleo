<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFks1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('estados', function(Blueprint $table){
    $table->foreign('pais_id')->references('id')->on('paises')->onUpdate('cascade')->onDelete('set null');
    });
    Schema::table('municipios', function(Blueprint $table){
    $table->foreign('estado_id')->references('id')->on('estados')->onUpdate('cascade')->onDelete('set null');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('estados', function(Blueprint $table){
      $table->dropForeign(['pais_id']);
    });
    Schema::table('municipios', function(Blueprint $table){
      $table->dropForeign(['estado_id']);
    });
    }
}
