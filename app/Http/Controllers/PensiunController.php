<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pensiun;

class PensiunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pensiun = Pensiun::all();
        return view('pensiun.index', compact('pensiun'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()) {
            $input=$request->get('pegawai_id');
            if(empty($input))
            {
                Pensiun::where('tahun_pensiun','=',$request->get('tahun_pensiun'))->delete();
            }
            else
            {
                for ($i = 0; $i < count($input); $i++)
                {
                    $insert = [
                        'pegawai_id'=> $input[$i],
                        'tahun_pensiun'=> $request->get('tahun_pensiun'),
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now()
                    ];
                    Pensiun::updateOrCreate(['pegawai_id'=>$input[$i]],$insert);
                }
            }
            return redirect()->back();
        }
    }
}
