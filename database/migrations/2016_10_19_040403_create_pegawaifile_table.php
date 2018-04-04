<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaifileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawaifile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pegawai_id')->unsigned();
            $table->integer('files_id')->unsigned();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->foreign('files_id')->references('id')->on('file')->onDelete('cascade');
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
        Schema::drop('pegawaifile');
    }
}
