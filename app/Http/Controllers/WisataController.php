<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Wisata;

use Illuminate\Http\Request;


class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisata::all();

        return view('wisatas.wisata', ['wisata' => $wisata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisatas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wisata = new Wisata;
        $wisata->nama = $request->nama;
        $wisata->deskripsi = $request->deskripsi;
        $wisata->alamat = $request->alamat;
        $wisata->jam_buka = $request->jam_buka;
        $wisata->jam_tutup = $request->jam_tutup;

         //menyimpan data gambar ke dalam variabel file
         if($request->hasFile('gambar')){
            $file = $request->file('gambar');
         }

            if($file->isValid()){
                $nama_file = $file->getClientOriginalName();
                //isi dengan nama folder tempat kemana file di upload
                $tujuan = 'data_gambar';
                $file->move($tujuan,$nama_file);
                $wisata->gambar = $nama_file;
            }

        $wisata->save();

        return redirect('wisata')->with(['success' => 'Data berhasil di simpan !']);
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
        $wisata = Wisata::where('id',$id)->get();
        return view('wisatas.edit', ['wisata' => $wisata]);
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
 
         $wisata = Wisata::findOrFail($id);
         $wisata->nama = $request->nama;
         $wisata->deskripsi = $request->deskripsi;
         $wisata->alamat = $request->alamat;
         $wisata->jam_buka = $request->jam_buka;
         $wisata->jam_tutup = $request->jam_tutup;

          //menyimpan data gambar ke dalam variabel file
          if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            if(isset($wisata->gambar) && file_exists('data_gambar/'.$wisata->gambar)){
                unlink('data_gambar/'.$wisata->gambar);
            }

            if($file->isValid()){
                $nama_file = $file->getClientOriginalName();
                //isi dengan nama folder tempat kemana file di upload
                $tujuan = 'data_gambar';
                $file->move($tujuan,$nama_file);
                $wisata->gambar = $nama_file;
            }

         }

         $wisata->save();

         return redirect('wisata')->with(['success' => 'Data berhasil di update !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);

        
        if(isset($wisata->gambar) && file_exists('data_gambar/'.$wisata->gambar)){
            unlink('data_gambar/'.$wisata->gambar);
        }


        $wisata->delete();
        return redirect('wisata')->with(['success' => 'Data berhasil di delete !']);
    }
}
