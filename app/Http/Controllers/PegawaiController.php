<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use DB;
use DateTime;
use View;
use App;
use Barryvdh\DomPDF\Facade as PDF;

use App\Pegawai;
use App\User;
use Auth;


class PegawaiController extends Controller
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
    public function index(Request $request)
    {
        $q = $request->get('q');
        $pegawai = Pegawai::where('nip', 'LIKE', '%'.$q.'%')
                        ->orWhere('ktp', 'LIKE', '%'.$q.'%')
                        ->orderBy('nip')->get();
        return view('pegawai.index', compact('pegawai', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validate
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'unique:pegawai',
            'nip' => 'required|unique:pegawai',
            'pangkat_gol_cpns' => 'required',
            'tmt_pangkat_gol_cpns' => 'required',
            'jabatan' => 'required',
            'pangkat_id' => 'required',
            'tmt_pangkat' => 'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'tingkat_ijazah'=>'required',
            'batas_pensiun'=>'required'
        ]);
        
        //create akun
        $user = User::create([
            'name' => $request->get('nama'),
            'email' => $request->get('nip'),
            'password' => bcrypt('lapan123')
        ]);
        $user->role = 'pegawai';
        $user->save();

        //save foto
        if ($request->hasFile('photo')) {
            $photo = $this->savePhoto($request->get('nama'),$request->file('photo'));
        } else {
            $photo = 'http://placehold.it/140X100';
        }

        //simpan data pegawai
        $data = $request->except('_token','MAX_UPLOAD_SIZE');
        $data['photo'] = $photo;
        $data['user_id'] =$user->id;
        $pegawai = Pegawai::create($data);

        //feedback sukses disimpan
        \Flash::success($pegawai->nama . ' saved.');
        return redirect()->route('pegawai.index');
    }
    
    public function deletePhoto($filename)
    {
        $path = public_path().DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$filename;
        return File::delete($path);
    }

    protected function savePhoto($user,UploadedFile $photo)
    {
        $fileName = $user . '.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

    private function FormatTanggal($tanggal) {
        return (!empty($tanggal)) ? Carbon::createFromFormat('m/d/Y', $tanggal)->format('Y-m-d') : '' ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }
    
    private function FromFormatDate($tanggal) {
        return DateTime::createFromFormat("Y-m-d", $tanggal); 
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'unique:pegawai',
            'nip' => 'required|unique:pegawai',
            'pangkat_gol_cpns' => 'required',
            'tmt_pangkat_gol_cpns' => 'required',
            'jabatan' => 'required',
            'pangkat_id' => 'required',
            'tmt_pangkat' => 'required',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'tingkat_ijazah'=>'required',
            'batas_pensiun'=>'required'
        ]);

        //update akun
        $user = User::findOrFail($request->get('user_id'));
        $user->update([
            'name' => $request->get('nama'),
            'email' => $request->get('nip')
        ]);

        $pegawai = Pegawai::findOrFail($id);

        if ($request->hasFile('photo')) {
            $photo = $this->savePhoto($user->name,$request->file('photo'));
            if ($pegawai->photo !== '') $this->deletePhoto($pegawai->photo);
        } else {
            $photo = $pegawai->photo;
        }

        $data = $request->except('_token','MAX_UPLOAD_SIZE');
        $data['photo'] = $photo;
        $data['user_id'] =$user->id;
        $pegawai->update($data);
        
        
        // $pegawai->update([
        //     'nama' => $request->get('nama'),
        //     'gelar_depan' => $request->get('gelar_depan'),
        //     'gelar_belakang'=> $request->get('gelar_belakang'),
        //     'photo'=> $photo,
        //     'ktp'=> $request->get('ktp'),
        //     'telepon'=> $request->get('telepon'),
        //     'email'=> $request->get('email'),
        //     'tanggal_lahir'=> (!$this->FromFormatDate($request->get('tanggal_lahir')))?$this->FormatTanggal($request->get('tanggal_lahir')):$request->get('tanggal_lahir'),
        //     'usia'=> $request->get('usia'),
        //     'jenis_kelamin'=> $request->get('jenis_kelamin'),
        //     'agama'=> $request->get('agama'),
        //     'detail_alamat'=> $request->get('detail_alamat'),
        //     'province_id'=> $this->checkInput($request->get('province_id')),
        //     'regency_id'=> $this->checkInput($request->get('regency_id')),
        //     'kecamatan'=> $request->get('kecamatan'),
        //     'kelurahan'=> $request->get('kelurahan'),
        //     'kode_pos'=> $request->get('kode_pos'),
        //     'nip'=> $request->get('nip'),
        //     'departemen_id'=> $this->checkInput($request->get('id_departemen')),
        //     'golongan_id'=> $this->checkInput($request->get('id_golongan')),
        //     'pangkat_id'=> $this->checkInput($request->get('id_pangkat')),
        //     'jabatan_non_pns'=> $request->get('jabatan_non_pns'),
        //     'tmt_pangkat'=> (!$this->FromFormatDate($request->get('tmt_pangkat')))?$this->FormatTanggal($request->get('tmt_pangkat')):$request->get('tmt_pangkat'),
        //     'jabatan_id'=> $this->checkInput($request->get('id_jabatan')),
        //     'tmt_jabatan'=> (!$this->FromFormatDate($request->get('tmt_jabatan')))?$this->FormatTanggal($request->get('tmt_jabatan')):$request->get('tmt_jabatan'),
        //     'jabatanfungsional_id'=> $this->checkInput($request->get('id_jabatan_fungsional')),
        //     'jabatan_struktural'=> $request->get('jabatan_struktural'),
        //     'subfungsional_id'=> $this->checkInput($request->get('id_sub_fungsional')),
        //     'tanggal_mulai_kerja'=> (!$this->FromFormatDate($request->get('tanggal_mulai_kerja')))?$this->FormatTanggal($request->get('tanggal_mulai_kerja')):$request->get('tanggal_mulai_kerja'),
        //     'tanggal_diangkat'=> (!$this->FromFormatDate($request->get('tanggal_diangkat')))?$this->FormatTanggal($request->get('tanggal_diangkat')):$request->get('tanggal_diangkat'),
        //     'tahun_masa_kerja'=> $request->get('tahun_masa_kerja'),
        //     'bulan_masa_kerja'=> $request->get('bulan_masa_kerja'),
        //     'tanggal_keluar'=> (!$this->FromFormatDate($request->get('tanggal_keluar')))?$this->FormatTanggal($request->get('tanggal_keluar')):$request->get('tanggal_keluar'),
        //     'npwp'=> $request->get('npwp'),
        //     'status'=> $request->get('status'),
        //     'pendidikan_terakhir'=> $request->get('pendidikan_terakhir'),
        //     'jurusan_pendidikan'=> $request->get('jurusan_pendidikan'),
        //     'tahun_lulus'=> $request->get('tahun_lulus'),
        //     'nama_latihan_jabatan'=> $request->get('nama_latihan_jabatan'),
        //     'tanggal_latihan_jabatan'=> (!$this->FromFormatDate($request->get('tanggal_latihan_jabatan')))?$this->FormatTanggal($request->get('tanggal_latihan_jabatan')):$request->get('tanggal_latihan_jabatan'),
        //     'jumlah_jam_latihan_jabatan'=> $request->get('jumlah_jam_latihan_jabatan'),
        //     'user_id'=> $request->get('user_id')
        // ]);

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //feedback sukses disimpan
        \Flash::success($pegawai->nama . ' updated.');
        return redirect()->route('pegawai.index');
    }

    public function getUmur()   {       
        $y = date('Y');         
        $m = date('m');         
        $d = date('d');         
        $tanggal_lahir = $this->changeDate(Input::get('tanggal_lahir'));        
        list($thn_skrg, $bln_skrg, $tgl_skrg) = explode('-',$tanggal_lahir);        
        
        // kelahiran dijadikan dalam format tanggal semua       
        $lahir = $tgl_skrg+($bln_skrg*30)+($thn_skrg*365);      
        // sekarang dijadikan dalam format tanggal semua        
        $now = $d+($m*30)+($y*365);         
        // dari format tanggal jadikan tahun, bulan, hari       
        $tahun = ($now-$lahir)/365;         
        $bulan = (($now-$lahir)%365)/30;            
        $hari  = (($now-$lahir)%365)%30;        
        $tgl_tahun = floor($tahun);         
        $tgl_bulan = floor($bulan);         
        $tgl_hari  = floor($hari);      

        return Response::json(compact('tgl_tahun','tgl_bulan','tgl_hari'));     
    }

    public function exportPdf() 
    {
        // ambil semua data
        $data = Pegawai::all();
        // mengarahkan view pada file pdf.blade.php 
        $pdf = PDF::loadView('pegawai.pdf',compact('data'));
     
        return $pdf->stream();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);

        User::find($pegawai->user_id)->delete();

        File::deleteDirectory('file/'.$pegawai->id);

        $pegawai->delete();


        \Flash::success('Pegawai deleted.');
        return redirect()->route('pegawai.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $data = Pegawai::select("nama")->where("nama","LIKE","%{$request->input('q')}%")->get();
        
        return response()->json($data);
    }
}
