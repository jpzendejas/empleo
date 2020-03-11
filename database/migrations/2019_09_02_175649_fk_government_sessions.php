<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkGovernmentSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('government_sessions', function(Blueprint $table){
          $table->foreign('session_kind_id')->references('id')->on('session_kinds')->onUpdate('cascade')->onDelete('set null');
        });

        Schema::table('session_documents', function(Blueprint $table){
          $table->foreign('government_session_id')->references('id')->on('government_sessions')->onUpdate('cascade')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('government_sessions', function(Blueprint $table){
          $table->dropForeign(['session_kind_id']);
        });
        Schema::table('session_documents', function(Blueprint $table){
          $table->dropForeign(['government_session_id']);
        });
    }
}
