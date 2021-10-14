<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
// use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelass = Kelas::all();
        return view('main.kelas.index',compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru_id = Guru::all();
        // $guru_id = User::where('role','guru')->get();
        return view('main.kelas.create',compact('guru_id'));
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
            
            'kelas' => 'required|unique:kelas,kelas',
            // 'role' => 'required',
            'semester' => 'required',
            'tahun_ajaran' => 'required',
            'guru_id' => 'required',
            'jumlah_siswa' => 'required',
           
        ]);
            

        try {

            $kelas = Kelas::create([
                'kelas' => $request['kelas'],
                'semester' => $request['semester'],
                'tahun_ajaran' => $request['tahun_ajaran'],
                'guru_id' => $request['guru_id'],
                'jumlah_siswa' => $request['jumlah_siswa'],
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
            ]);

    
            Alert::success(
                'Menambah data Guru',
                'Data Kelas Berhasil di tambah'
            );
        } catch (\Throwable $th) {
            //throw $th;
            \dd($th->getMessage());
            Alert::error(
                'Menambah data Kelas',
                'Data Guru Berhasil di tambah'. $th->getMessage()
            );
            return \redirect()->back();

        }
        return \redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
