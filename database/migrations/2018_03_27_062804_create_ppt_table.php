<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jenis_jabatan');
            $table->string('jabatan');
            $table->string('pendidikan');
            $table->date('tanggal_lahir');
            $table->integer('usia');
            $table->date('tmt');
            $table->integer('masa_kerja');
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
        Schema::drop('ppt');
    }
}
