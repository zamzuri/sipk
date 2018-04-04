<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TugasBelajar extends Model
{
    protected $table = 'tugasbelajar';

	protected $fillable = ['pegawai_id','tahun_belajar'];

	public function pegawai()
	{
	    return $this->belongsTo('App\Pegawai','pegawai_id','id');
	}
}
