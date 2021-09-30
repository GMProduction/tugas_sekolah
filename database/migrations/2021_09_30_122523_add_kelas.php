<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('materi', function (Blueprint $table){
            $table->bigInteger('id_kelas')->unsigned()->nullable(true)->default(null);
            $table->foreign('id_kelas')->references('id')->on('kelas');
        });

        Schema::table('tugas', function (Blueprint $table){
            $table->bigInteger('id_kelas')->unsigned()->nullable(true)->default(null);
            $table->foreign('id_kelas')->references('id')->on('kelas');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('id_kelas')->unsigned()->nullable(true)->default(null);
            $table->foreign('id_kelas')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
