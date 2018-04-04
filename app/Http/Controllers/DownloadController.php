<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pegawai;
use App\Files;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:pegawai');
    }

    public function download($file_id,$pegawai_id) 
    {
        $pegawai = Pegawai::findOrFail($pegawai_id);
        
        $berkas = Files::findOrFail($file_id);
        
        $file_path = public_path('file/'.$pegawai->files[0]->file.$berkas->nama);
        
        return response()->download($file_path);
    }
}
