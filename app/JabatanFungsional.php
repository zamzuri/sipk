<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JabatanFungsional extends Model {

	protected $table = 'jabatanfungsional';

	protected $fillable = ['nama'];

	public function pegawai()
	{
	    return $this->hasMany('App\Pegawai','jabatanfungsional_id');
	}
}