<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


class Pegawai extends Model {

	protected $table = 'pegawai';

    protected $dates = ['tanggal'];

    protected $fillable = ['nip','nama','pangkat_id','tmt_pangkat','pangkat_gol_cpns','tmt_pangkat_gol_cpns',
                            'jabatan','tmt_jabatan','tahun_masa_kerja','bulan_masa_kerja','nama_latihan_jabatan',
                            'thn_bln_latihan_jabatan','jumlah_jam_latihan_jabatan','nama_pendidikan','jurusan_pendidikan',
                            'tahun_lulus','tingkat_ijazah','photo','ktp','telepon','email','tempat_lahir','tanggal_lahir',
                            'usia','jenis_kelamin','agama','detail_alamat','batas_pensiun','waktu_pensiun',
                            'mutasi','user_id'];

    public function pensiun()
    {
        return $this->hasOne('App\Pensiun','pegawai_id','id');
    }

    public function belajar()
    {
        return $this->hasOne('App\TugasBelajar','pegawai_id','id');
    }

    public function pangkat()
    {
        return $this->belongsTo('App\Pangkat');
    }

    public function bidang()
    {
        return $this->belongsTo('App\Bidang');
    }

    public function jabatanfungsional()
    {
        return $this->belongsTo('App\JabatanFungsional');
    }

    public function files() {
		return $this->belongsToMany('App\Files', 'pegawaifile');
	}

    public function getTanggalAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y'); ///  2016-09-08
    }

    public function setTanggalAttribute($value)
    {
        $this->attributes['tanggal'] = Carbon::createFromFormat('Y-m-d', $value)->toDateString();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}