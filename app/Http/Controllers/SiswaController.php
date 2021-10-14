<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('main.siswa.index',\compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = Siswa::count();
        $urutan = 'SISWA-' . sprintf("%08d", $kode);
        $urutan++;
        $kelas_id = Kelas::all();
        return view('main.siswa.create',compact('kelas_id','urutan'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        
        //validasi
        $this->validate($request,[
            
            'name' => 'required',
            'kelas_id' => 'required',
            // 'role' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_tlp_siswa' => 'required',
            'no_tlp_ortu' => 'required',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',
            'alamat_ortu' => 'required',
            // 'num' => 'required',
            'foto' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
            

        try {

            $user = User::create([
                'name' => $request['name'],
                'role' => 'siswa',
                'foto' => $request['foto'],
                'email' => $request['email'],
                'password' => bcrypt($request->password),
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
            ]);

            $siswa = Siswa::create([
                'user_id' => $user['id'],
                'kelas_id' => $request['kelas_id'],
                'nis' => $request['nis'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'agama' => $request['agama'],
                'alamat' => $request['alamat'],
                'no_tlp_siswa' => $request['no_tlp_siswa'],
                'no_tlp_ortu' => $request['no_tlp_ortu'],
                'nama_ayah' => $request['nama_ayah'],
                'nama_ibu' => $request['nama_ibu'],
                'pekerjaan_ayah' => $request['pekerjaan_ayah'],
                'pekerjaan_ibu' => $request['pekerjaan_ibu'],
                'alamat_ortu' => $request['alamat_ortu'],

                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
            ]);
            //code...
            // User::insert($data);
            // dd($user['id']);
    
            Alert::success(
                'Menambah data Siswa',
                'Data Siswa Berhasil di tambah'
            );
        } catch (\Throwable $th) {
            //throw $th;
            \dd($th->getMessage());
            Alert::error(
                'Menambah data Siswa',
                'Data Siswa Berhasil di tambah'. $th->getMessage()
            );
            return \redirect()->back();

        }
        return \redirect()->route('siswa.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        // dd($siswa);
        DB::beginTransaction();
        try {
            //prosess delete data
            // $siswa = User::find($id);
            // dd($siswa);
            $siswa->user()->delete();
            $siswa->delete();
            // $siswa->delete();
            //update untuk pivot bukan dengan attach tp dengan sync

            Alert::success(
                'Menghapus data siswa',
                'Data siswa Berhasil di hapus'
            );

            return redirect()->route('siswa.index');

            } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Alert::error(
                'Menghapus data siswa',
                'Data siswa Gagal di hapus'. $th->getMessage()
            );
            
        } finally {
            DB::commit();

            return redirect()->back();
        }
    }
}
