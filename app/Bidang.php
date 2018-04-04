<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model {

	protected $table = 'bidang';

	protected $fillable = ['nama'];

	public function pegawai()
	{
	    return $this->hasMany('App\Pegawai');
	}

	/*public static function boot()
	{
		parent::boot();

		self::deleting(function($bidang)
		{
			if($bidang->pegawai->count() > 0) {
				$html = "Bidang ini tidak bisa dihapus karena mempunyai relasi di tabel pegawai dengan rincian nama pegawai berikut ini :";
				$html .= "<ul>";
				foreach ($bidang->pegawai as $pegawai) {
					$html .= "<li>$pegawai->nama</li>";
				}
				$html .= "</ul>";
				\Flash::success($html);
				return false;
			}
		}); 

	}*/
	
}