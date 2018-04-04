<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Pangkat;

class PangkatController extends Controller
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
        $pangkat = Pangkat::where('nama', 'LIKE', '%'.$q.'%')
                        ->orderBy('nama')->get();
        return view('pangkat.index', compact('pangkat', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pangkat.create');
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
            'nama' => 'required|unique:pangkat'
        ]);

        $data = $request->only('nama');
        $pangkat = Pangkat::create($data);
        \Flash::success($pangkat->nama . ' saved.');
        return redirect()->route('pangkat.index');
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
        $pangkat = Pangkat::findOrFail($id);
        return view('pangkat.edit', compact('pangkat'));
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
        $pangkat = Pangkat::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required|unique:pangkat,nama,'. $pangkat->id
        ]);

        $data = $request->only('nama');
        $pangkat->update($data);
        \Flash::success($pangkat->nama . ' updated.');
        return redirect()->route('pangkat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pangkat = Pangkat::find($id);
        $pangkat->delete();
        \Flash::success('Pangkat deleted.');
        return redirect()->route('pangkat.index');
    }
}
