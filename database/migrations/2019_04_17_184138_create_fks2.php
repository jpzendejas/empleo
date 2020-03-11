<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFks2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('empresas', function(Blueprint $table){
      $table->foreign('municipio_id')->references('id')->on('municipios')->onUpdate('cascade')->onDelete('set null');
      });
      Schema::table('empresas', function(Blueprint $table){
      $table->foreign('sector_id')->references('id')->on('sectores')->onUpdate('cascade')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('empresas', function(Blueprint $table){
      $table->dropForeign(['municipio_id']);
      });
      Schema::table('empresas', function(Blueprint $table){
      $table->dropForeign(['sector_id']);
      });
    }
}
