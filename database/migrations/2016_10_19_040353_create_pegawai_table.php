<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip');
            $table->string('nama');
            $table->string('email');
            $table->string('ktp');
            $table->string('photo');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->integer('usia');
            $table->string('telepon');
            $table->string('detail_alamat');
            $table->string('agama');
            $table->integer('pangkat_id')->unsigned();
            $table->date('tmt_pangkat');
            $table->string('jabatan');
            $table->date('tmt_jabatan');
            $table->integer('tahun_masa_kerja');
            $table->integer('bulan_masa_kerja');
            $table->string('nama_pendidikan');
            $table->string('jurusan_pendidikan');
            $table->date('tahun_lulus');
            $table->string('tingkat_ijazah');
            $table->string('pangkat_gol_cpns');
            $table->date('tmt_pangkat_gol_cpns');
            $table->string('nama_latihan_jabatan');
            $table->string('thn_bln_latihan_jabatan');
            $table->integer('jumlah_jam_latihan_jabatan');
            $table->integer('batas_pensiun');
            $table->integer('waktu_pensiun'); 
            $table->string('mutasi');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pangkat_id')->references('id')->on('pangkat')->onDelete('cascade');
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
        Schema::drop('pegawai');
    }
}
