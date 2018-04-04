<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JabatanFungsional;
use App\SubFungsional;

class JabatanFungsionalController extends Controller
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
    public function index(Request $request)
    {
        $q = $request->get('q');
        $fungsional = JabatanFungsional::where('nama', 'LIKE', '%'.$q.'%')
                          ->orderBy('nama')->get();
        return view('fungsional.index', compact('fungsional', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fungsional.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|unique:jabatanfungsional'
        ]);

        $data = $request->only('nama');
        $fungsional = JabatanFungsional::create($data);
        \Flash::success($fungsional->nama . ' saved.');
        return redirect()->route('fungsional.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fungsional = JabatanFungsional::findOrFail($id);
        return view('fungsional.edit', compact('fungsional'));
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
        $fungsional = JabatanFungsional::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required|unique:jabatanfungsional,nama,'. $fungsional->id
        ]);

        $data = $request->only('nama');
        $fungsional->update($data);
        \Flash::success($fungsional->nama . ' updated.');
        return redirect()->route('fungsional.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = JabatanFungsional::find($id);
        $jabatan->delete();
        \Flash::success('Jabatan fungsional deleted.');
        return redirect()->route('fungsional.index');
    }
}
