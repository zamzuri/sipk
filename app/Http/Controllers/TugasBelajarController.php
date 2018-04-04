<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Response;

use App\TugasBelajar;

class TugasBelajarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugasbelajar = TugasBelajar::all();
        return view('tugasbelajar.index', compact('tugasbelajar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tugasbelajar.create');
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
            for ($i = 0; $i < count($input); $i++)
            {
                $insert = [
                    'pegawai_id'=> $input[$i],
                    'tahun_belajar'=> $request->get('tahun_belajar'),
                    'created_at'=>\Carbon\Carbon::now(),
                    'updated_at'=>\Carbon\Carbon::now()
                ];
                TugasBelajar::updateOrCreate(['pegawai_id'=>$input[$i],'tahun_belajar'=>$request->get('tahun_belajar')],$insert);
            }
            return redirect()->route('tugasbelajar.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($year)
    {
        $data = TugasBelajar::where('tahun_belajar', '=', $year)->get();
        
        $i = 0;
        $pegawai = array();

        while($i < count($data)){
            $pegawai[] = array(
                'file'         => $data[$i]->pegawai->photo,
                'nama'          => $data[$i]->pegawai->nama,
                'departemen'     => $data[$i]->pegawai->departemen->nama,
            );
            $i++;
        }
        return Response::json(array('error' => 0, 'pegawai' => $pegawai));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!TugasBelajar::destroy($id))
        {
            return redirect()->back();
        }

        \Flash::success('Data berhasil dihapus!');
        return redirect()->route('tugasbelajar.index');
    }
}
