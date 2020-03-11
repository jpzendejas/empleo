<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFksVacantes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('vacantes', function(Blueprint $table){
      $table->foreign('estado_civil_id')->references('id')->on('estados_civil')->onUpdate('cascade')->onDelete('set null');
      });
      Schema::table('vacantes', function(Blueprint $table){
      $table->foreign('escolaridad_id')->references('id')->on('escolaridades')->onUpdate('cascade')->onDelete('set null');
      });
      Schema::table('vacantes', function(Blueprint $table){
      $table->foreign('experiencia_id')->references('id')->on('experiencias')->onUpdate('cascade')->onDelete('set null');
      });
      Schema::table('vacantes', function(Blueprint $table){
      $table->foreign('causa_id')->references('id')->on('causas')->onUpdate('cascade')->onDelete('set null');
      });
      Schema::table('vacantes', function(Blueprint $table){
      $table->foreign('empresa_id')->references('id')->on('empresas')->onUpdate('cascade')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('vacantes', function(Blueprint $table){
      $table->dropForeign(['estado_civil_id']);
    });
    Schema::table('vacantes', function(Blueprint $table){
      $table->dropForeign(['escolaridad_id']);
    });
     Schema::table('vacantes', function(Blueprint $table){
      $table->dropForeign(['experiencia_id']);
    });
    Schema::table('vacantes', function(Blueprint $table){
      $table->dropForeign(['causa_id']);
    });
    Schema::table('vacantes', function(Blueprint $table){
      $table->dropForeign(['empresa_id']);
    });
    }
}
