<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model {

	protected $table = 'pangkat';

	protected $fillable = ['nama'];

	public function pegawai()
	{
	    return $this->hasMany('App\Pegawai');
	}
}