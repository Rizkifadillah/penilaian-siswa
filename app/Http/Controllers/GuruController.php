<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gurus = User::where('role','guru')->get();
        return view('main.guru.index',compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kode = Guru::count();
        $urutan = 'GURU-' . sprintf("%08d", $kode);
        $urutan++;
        return view('main.guru.create',compact('urutan'));
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
            
            'name' => 'required',
            // 'role' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'pendidikan_terakhir' => 'required',
            'no_tlp_guru' => 'required',
            // 'num' => 'required',
            'foto' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
            

        try {

            $user = User::create([
                'name' => $request['name'],
                'role' => 'guru',
                'foto' => $request['foto'],
                'email' => $request['email'],
                'password' => bcrypt($request->password),
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
            ]);

            $guru = Guru::create([
                'user_id' => $user['id'],
                'nip' => $request['nip'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'agama' => $request['agama'],
                'alamat' => $request['alamat'],
                'pendidikan_terakhir' => $request['pendidikan_terakhir'],
                'no_tlp_guru' => $request['no_tlp_guru'],
                
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
            ]);
            //code...
            // User::insert($data);
            // dd($user['id']);
    
            Alert::success(
                'Menambah data Guru',
                'Data Guru Berhasil di tambah'
            );
        } catch (\Throwable $th) {
            //throw $th;
            \dd($th->getMessage());
            Alert::error(
                'Menambah data Guru',
                'Data Guru Berhasil di tambah'. $th->getMessage()
            );
            return \redirect()->back();

        }
        return \redirect()->route('guru.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($guru);
        DB::beginTransaction();
        try {
            //prosess delete data
            $guru = User::find($id);
            // dd($guru);
            // $guru->guru()->detach();
            $guru->guru()->delete();
            $guru->delete();
            //update untuk pivot bukan dengan attach tp dengan sync

            Alert::success(
                'Menghapus data Guru',
                'Data Guru Berhasil di hapus'
            );

            return redirect()->route('posts.index');

            } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            Alert::error(
                'Menghapus data Guru',
                'Data Guru Gagal di hapus'. $th->getMessage()
            );
            
        } finally {
            DB::commit();

            return redirect()->back();
        }
    }
}
