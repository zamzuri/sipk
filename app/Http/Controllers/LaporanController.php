<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use App\Pegawai;
use Auth;
use View;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDepartemen()
    {
        $list = DB::table('departemen')
		        ->leftJoin('pegawai', function ($join) {
		            $join->on('departemen.id', '=', 'pegawai.departemen_id');
		        })
		        ->select('departemen.nama',DB::raw("SUM( CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END ) AS total_laki"),DB::raw("SUM( CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END ) AS total_pr"))
		        ->groupBy('departemen.id')
		        ->orderBy('departemen.nama', 'asc')
		        ->get();
		$total = DB::table('pegawai')->count('departemen_id');

		return view('laporan.departemen', compact('list','total'));
    }
}
