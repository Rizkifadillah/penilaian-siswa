<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = User::whereNotIn('role', ['siswa', ''])->get();
        return view('main.staff.index',compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // '#' . sprintf("%08d", $index),
        $kode = Staff::count();
        $urutan = 'STF-' . sprintf("%08d", $kode);
        $urutan++;
        
        // dd($urutan);
        return view('main.staff.create',compact('urutan'));
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
            'role' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'pendidikan_terakhir' => 'required',
            'no_tlp_staff' => 'required',
            // 'num' => 'required',
            'foto' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
            

        try {

            $user = User::create([
                'name' => $request['name'],
                'role' => $request['role'],
                'foto' => $request['foto'],
                'email' => $request['email'],
                'password' => bcrypt($request->password),
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
            ]);

            $staff = Staff::create([
                'user_id' => $user['id'],
                'nip' => $request['nip'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jenis_kelamin' => $request['jenis_kelamin'],
                'agama' => $request['agama'],
                'alamat' => $request['alamat'],
                'pendidikan_terakhir' => $request['pendidikan_terakhir'],
                'no_tlp_staff' => $request['no_tlp_staff'],
                
                'created_at' => date('y-m-d H:i:s'),
                'updated_at' => date('y-m-d H:i:s'),
            ]);
            //code...
            // User::insert($data);
            // dd($user['id']);
    
            Alert::success(
                'Menambah data staff',
                'Data Staff Berhasil di tambah'
            );
        } catch (\Throwable $th) {
            //throw $th;
            \dd($th->getMessage());
            Alert::error(
                'Menambah data staff',
                'Data Staff Berhasil di tambah'. $th->getMessage()
            );
            return \redirect()->back();

        }
        return \redirect()->route('staff.index');
        
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
        $user = User::find($id);
        // $staff = Staff::where('user_id',$user->id)->first();
        // dd($user);
        return \view('main.staff.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * //        Kandidat::where('id',$id)->update($data);

     */
    public function update(Request $request, $id)
    {
        {
            //validasi
            $this->validate($request,[
               'name' => 'required',
               'role' => 'required',
               // 'num' => 'required',
               'foto' => 'required',
               'email' => 'required',
            //    'password' => 'required|min:6|confirmed',
               ]);
               
           //variable array data yg ingin di isi
           $data['name'] = $request->name;
           $data['role'] = $request->role;
           // $data['num'] = $request->num;
           $data['foto'] = parse_url($request->foto)['path'];
   
           // $data['no_pendaftaran'] = 'REG-'.date('YmdHis');
           $data['email'] = $request->email;
        //    $data['password'] = bcrypt($request->password);
        //    $data['created_at'] = date('y-m-d H:i:s');
           $data['updated_at'] = date('y-m-d H:i:s');
   
           try {
               //code...
               
            //    User::insert($data);
               User::where('id',$id)->update($data);
       
               Alert::success(
                   'Menambah data staff',
                   'Data Staff Berhasil di tambah'
               );
           } catch (\Throwable $th) {
               //throw $th;
               Alert::error(
                   'Menambah data staff',
                   'Data Staff Berhasil di tambah'. $th->getMessage()
               );
               return \redirect()->back();
   
           }
           return \redirect()->route('staff.index');
           
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            // dd($user->role);

            if ($user->role == "guru") {
                # code...DB::beginTransaction();
                try {
                    //prosess delete data
                    $guru = User::find($id);
                    // dd($guru);
                    // $guru->guru()->detach();
                    $guru->guru()->delete();
                    $guru->delete();
                    //update untuk pivot bukan dengan attach tp dengan sync

                    Alert::success(
                        'Menghapus data Staff Guru',
                        'Data Staff Guru Berhasil di hapus'
                    );

                    return redirect()->route('staff.index');

                    } catch (\Throwable $th) {
                    //throw $th;
                    DB::rollBack();
                    Alert::error(
                        'Menghapus data Staff Guru',
                        'Data Staff Guru Gagal di hapus'. $th->getMessage()
                    );
                    
                } finally {
                    DB::commit();

                    return redirect()->back();
                }
            } else {
                # code...
                DB::beginTransaction();
                try {
                    //prosess delete data
                    // $user = User::find($id);
                    // dd($user);
                    // $user->user()->detach();
                    // $user->user()->delete();
                    $delete = $user->delete();
                    //update untuk pivot bukan dengan attach tp dengan sync

                    Alert::success(
                        'Menghapus data Guru',
                        'Data Guru Berhasil di hapus'
                    );

                    return redirect()->route('staff.index');

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
            
            
            User::where('id',$id)->delete();

            Alert::success(
                'Hapus Data Staff',
                'Data Berhasil Dihapus'
            );
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error(
                'Hapus Data Staff',
                'Data Staff Gagal di hapus'. $th->getMessage()
            );

        }

        return redirect()->back();
    }
}
