<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use Auth;

use App\Pegawai;
use App\Bidang;
use App\Pangkat;
use DB;
use View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $data = array(
            'total_pegawai' => DB::table('pegawai')->count('id'),
            'jml_laki' => DB::table('pegawai')
                            ->select(DB::raw("SUM( CASE WHEN jenis_kelamin = 'Laki-laki' THEN 1 ELSE 0 END ) AS total_laki"))
                            ->first(),
            'jml_pr' => DB::table('pegawai')
                            ->select(DB::raw("SUM( CASE WHEN jenis_kelamin = 'Perempuan' THEN 1 ELSE 0 END ) AS total_pr"))
                            ->first(),
        );

        // Sharing is caring
        View::share('data',$data);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Show the profil user.
     *
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        if(Auth::user()->can('pegawai-access')) 
        {
            $user_id = Auth::user()->id;
            $pegawai = Pegawai::where('user_id',$user_id)->first();
            $photo = $pegawai->photo;
            return view('profil.index',compact('pegawai','photo'));
        }
    }

    public function grafikPendidikan()
    {
        $pegawai = DB::table('pegawai')
                     ->select(DB::raw('count(*) as jml, tingkat_ijazah'))
                     ->groupBy('tingkat_ijazah')
                     ->get();
        $data = array();
        $categories = "";         
        $comma = "";
        foreach ($pegawai as $value) {
            array_push($data, $value->jml);
            $categories .= $comma."'".$value->tingkat_ijazah."'";               
            $comma = ",";
        }
        return view('grafik.pendidikan',compact('data','categories'));
    }

    public function grafikPangkat()
    {
        $data = array();
        $categories = "";         
        $comma = "";
        foreach (Pangkat::all() as $p) {
            array_push($data,$p->pegawai->count());
            $categories .= $comma."'".$p->nama."'";               
            $comma = ",";
        }

        return view('grafik.pangkat',compact('categories','data'));
    }

    public function grafikBidang()
    {
        $data = array();
        $categories = "";         
        $comma = "";
        foreach (Bidang::all() as $f) {
            array_push($data,$f->pegawai->count());
            $categories .= $comma."'".$f->nama."'";               
            $comma = ",";
        }
        return view('grafik.bidang',compact('categories','data'));
    }
    
}
