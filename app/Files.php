<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model {

	protected $table = 'file';

	protected $fillable = ['nama','file','size'];

	public function pegawai() {
		return $this->belongsToMany('App\Pegawai', 'pegawaifile');
	}
}