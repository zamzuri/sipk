<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pensiun extends Model
{
    protected $table = 'pensiun';

	protected $fillable = ['pegawai_id','tahun_pensiun'];

	public function pegawai()
	{
	    return $this->belongsTo('App\Pegawai','pegawai_id','id');
	}
}
