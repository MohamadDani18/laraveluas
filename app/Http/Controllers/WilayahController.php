<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wilayah;
use App\Wisata;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wilayah = Wilayah::all();

        return view('wilayah.wilayah', ['wilayah' => $wilayah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wilayah = new Wilayah;
        $wilayah->nama = $request->nama;

        $wilayah->save();

        return redirect('wilayah')->with(['success' => 'Data berhasil di simpan !']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisata = Wisata::where('wilayah_id',$id)->get();
        $wilayah = Wilayah::where('id',$id)->get();
        return view('wilayah.detail', ['wilayah' => $wilayah], ['wisata' => $wisata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wilayah = Wilayah::where('id',$id)->get();
        return view('wilayah.edit', ['wilayah' => $wilayah]);
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
        $wilayah = Wilayah::findOrFail($id);

         $wilayah->nama = $request->nama;

         $wilayah->save();

         return redirect('wilayah')->with(['success' => 'Data berhasil di update !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wilayah::destroy($id);
        return redirect('wilayah')->with(['success' => 'Data berhasil di delete !']);
    }
}
