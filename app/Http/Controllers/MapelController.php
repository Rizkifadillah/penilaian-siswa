<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = Mapel::all();
        return view('main.mapel.index',compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $this->validate($request,[
           'nama' => 'required',
           ]);
           
       //variable array data yg ingin di isi
       $data['nama'] = $request->nama;
       $data['created_at'] = date('y-m-d H:i:s');
       $data['updated_at'] = date('y-m-d H:i:s');

       try {
           //code...
           Mapel::insert($data);
   
           Alert::success(
               'Menambah data Mata Pelajaran',
               'Data Mata Pelajaran Berhasil di tambah'
           );
       } catch (\Throwable $th) {
           //throw $th;
           Alert::error(
               'Menambah data Mata Pelajaran',
               'Data Mata Pelajaran Berhasil di tambah'. $th->getMessage()
           );
           return \redirect()->back();

       }
       return \redirect()->route('mapel.index');
       
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        // $mapeldata = $mapel->name;
        $mapels = Mapel::all();
        // dd($mapel);

        return view('main.mapel.edit',compact('mapels','mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        //validasi
        $this->validate($request,[
            'nama' => 'required',
            ]);
            
        //variable array data yg ingin di isi
        $data['nama'] = $request->nama;
        // $data['created_at'] = date('y-m-d H:i:s');
        $data['updated_at'] = date('y-m-d H:i:s');
 
        try {
            //code...
            $mapel->update($data);
    
            Alert::success(
                'Edit data Mata Pelajaran',
                'Data Mata Pelajaran Berhasil di ubah'
            );
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error(
                'Edit data Mata Pelajaran',
                'Data Mata Pelajaran Gagal diubah'. $th->getMessage()
            );
            return \redirect()->back();
 
        }
        return \redirect()->route('mapel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        try {
            //code...
            $mapel->delete();
    
            Alert::success(
                'Hapus data Mata Pelajaran',
                'Data Mata Pelajaran Berhasil di hapus'
            );
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error(
                'Hapus data Mata Pelajaran',
                'Data Mata Pelajaran Gagal di hapus'. $th->getMessage()
            );
            return \redirect()->back();
 
        }
        return \redirect()->route('mapel.index');
    }
}
