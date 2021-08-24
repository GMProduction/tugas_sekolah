<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('roles');
            $table->string('nama')->nullable(true)->default(null);
            $table->text('alamat')->nullable(true)->default(null);
            $table->string('no_hp')->nullable(true)->default(null);
            $table->date('tanggal_lahir')->nullable(true)->default(null);
            $table->text('image')->nullable(true)->default(null);
            $table->text('token')->nullable(true)->default(null);
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
