<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sholat', function (Blueprint $table) {
            //
            $table->bigInteger('aktivitas_id')->unsigned();
            $table->foreign('aktivitas_id')->references('id')->on('aktivitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sholat', function (Blueprint $table) {
            //
        });
    }
}
