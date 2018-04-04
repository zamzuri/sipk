<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bidang;

class BidangController extends Controller
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
        $bidang = Bidang::where('nama', 'LIKE', '%'.$q.'%')
                          ->orderBy('nama')->get();
        return view('bidang.index', compact('bidang', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bidang.create');
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
            'nama' => 'required|unique:bidang'
        ]);

        $data = $request->only('nama');
        $bidang = Bidang::create($data);
        \Flash::success($bidang->nama . ' saved.');
        return redirect()->route('bidang.index');
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
        $bidang = Bidang::findOrFail($id);
        return view('bidang.edit', compact('bidang'));
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
        $bidang = Bidang::findOrFail($id);
        $this->validate($request, [
            'nama' => 'required|unique:bidang,nama,'. $bidang->id
        ]);

        $data = $request->only('nama');
        $bidang->update($data);
        \Flash::success($bidang->nama . ' updated.');
        return redirect()->route('bidang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Bidang::destroy($id))
        {
            return redirect()->back();
        }

        \Flash::success('Data deleted.');
        return redirect()->route('bidang.index');
    }
}
