<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTugasBelajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasbelajar', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pegawai_id')->unsigned();
            $table->integer('tahun_belajar');

            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
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
        Schema::drop('tugasbelajar');
    }
}
