<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Response;

use File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use App\Pegawai;
use App\Files;


class FileController extends Controller
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
        $file = Files::where('nama', 'LIKE', '%'.$q.'%')
                          ->orderBy('nama')->get();
        return view('file.index', compact('file', 'q'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $id = Input::get('pegawai_id');
        
        if ($request->hasFile('file')) {
        	
        	$pegawai = Pegawai::findOrFail($id);
            $data['nama'] = $this->saveFile($request->file('file'),$id);
            $data['file'] = $id.DIRECTORY_SEPARATOR;
            $data['size'] = $request->file('file')->getClientSize();;
            
            $file = Files::create($data);
            
            $file->pegawai()->attach($id);
            
            \Flash::success($data['nama'] . ' saved.');
	        return redirect()->back();
	    }
      
    }

    protected function saveFile(UploadedFile $file,$id)
    {
        $fileName = $file->getClientOriginalName();
        $pegawai = Pegawai::findOrFail($id);
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'file'. DIRECTORY_SEPARATOR . $id;
        $file->move($destinationPath, $fileName);
        return $fileName;
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
        return view('file.index', compact('pegawai'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $source, string $file
     * @return \Illuminate\Http\Response
     */
    public function preview($source,$file)
    {
        return view('file.preview')->with('source',$source)->with('file', $file);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = Files::findOrFail($id);
        return view('file.edit', compact('file'));
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
        $file = Files::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required|unique:file,nama,'. $file->id
        ]);

        $data = $request->only('nama');
        $file->update($data);
        \Flash::success($file->nama . ' updated.');
        return redirect()->route('file.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Files::find($id);
        if (!is_null($file->nama)) {$this->deleteFile($file->file,$file->nama);}
        $file->delete();
        \Flash::success('file deleted.');
        return redirect()->back();
    }

    public function deleteFile($source,$filename)
    {
        $path = public_path().DIRECTORY_SEPARATOR.'file'.DIRECTORY_SEPARATOR.$source.$filename;
        return File::delete($path);
    }
}
