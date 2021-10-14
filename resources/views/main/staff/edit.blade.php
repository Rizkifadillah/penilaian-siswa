@extends('layouts.master')

@section('title')
    Edit Staff
@endsection

@section('breadcumbs')
    <h6>
        {{ Breadcrumbs::render('edit_staff_name',$user) }}
    </h6>
@endsection

@section('content')
<div class="container-fluid">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Tambah Staff</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('staff.update', ['staff' => $user])}}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8">
                    <div class="card m-2">
                       <div class="card-body">
                          <div class="row d-flex align-items-stretch">
                             <div class="col-md-12">
                                <!-- title -->
                                <div class="form-group">
                                   <label for="name" class="font-weight-bold">
                                       Nama Lengkap
                                   </label>
                                   <input id="name" value="{{ old('name',$user->name)}}" name="name" type="text" 
                                      class="form-control @error('name') is-invalid @enderror"
                                      placeholder="Masukan nama lengkap" readonly/>
                                     @error('name')
                                     <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                        <br>
                                     </span>
                                     @enderror
                                </div>
                                {{-- <div class="form-row">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="tempat_lahir" class="font-weight-bold">
                                             Tempat 
                                          </label>
                                          <input id="tempat_lahir" value="{{ old('tempat_lahir',$staff->tempat_lahir)}}" name="tempat_lahir" type="text" 
                                             class="form-control @error('tempat_lahir') is-invalid @enderror"
                                             placeholder="Tempat" />
                                             @error('tempat_lahir')
                                             <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                <br>
                                             </span>
                                             @enderror
                                      </div>
                                   </div>
                                   <div class="col-md-8">
                                      <div class="form-group">
                                       <label for="tanggal_lahir" class="font-weight-bold">
                                          Tanggal Lahir 
                                       </label>
                                       <input type="date" value="{{ $staff->tanggal_lahir ?? '' }}" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="exampleInputEmail1" autocomplete="off" placeholder="Sampai">

                                          @error('tanggal_lahir')
                                          <span class="invalid-feedback" role="alert">
                                             <small>{{ $message }}</small>
                                             <br>
                                          </span>
                                          @enderror
                                       </div>
                                   </div>
                                </div>
                                <div class="row">
                                   <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="">Agama</label>
                                       <select name="agama" class="form-control">
                                         <option value="{{ $staff->agama}}" >{{ $staff->agama}}</option>
                                         <option value="islam" {{(old('agama') == 'islam') ? 'selected' : ''}}>Islam</option>
                                         <option value="katolik" {{(old('agama') == 'katolik') ? 'selected' : ''}}>Katolik</option>
                                         <option value="protestan" {{(old('agama') == 'protestan') ? 'selected' : ''}}>Protestan</option>
                                         <option value="hindu" {{(old('agama') == 'hindu') ? 'selected' : ''}}>Hindu</option>
                                         <option value="budha" {{(old('agama') == 'budha') ? 'selected' : ''}}>Budha</option>
                                       </select>
                                       @if($errors->has('agama'))
                                       <span class="help-block" role="alert">
                                         <small style="color: red">
                                             {{$errors->first('agama')}}
                                         </small>
                                       </span>
                                       @endif
                                       @error('agama')
                                           <span class="invalid-feedback" role="alert">
                                               <small style="color: red">{{ $message }}</small>
                                               <br>
                                           </span>
                                       @enderror
                                     </div>
                                   </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="">Jenis Kelamin</label>
                                       <select name="jenis_kelamin" class="form-control">
                                         <option value="{{ $staff->jenis_kelamin}}" >{{ $staff->jenis_kelamin}}</option>
                                         <option value="laki_laki" {{(old('jenis_kelamin') == 'laki_laki') ? 'selected' : ''}}>Laki-laki</option>
                                         <option value="perempuan" {{(old('jenis_kelamin') == 'perempuan') ? 'selected' : ''}}>Perempuan</option>
                                       </select>
                                       @if($errors->has('jenis_kelamin'))
                                       <span class="help-block" role="alert">
                                         <small style="color: red">
                                             {{$errors->first('jenis_kelamin')}}
                                         </small>
                                       </span>
                                       @endif
                                       @error('jenis_kelamin')
                                           <span class="invalid-feedback" role="alert">
                                               <small style="color: red">{{ $message }}</small>
                                               <br>
                                           </span>
                                       @enderror
                                    </div>
                                   </div>
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label for="pendidikan_terakhir" class="font-weight-bold">
                                            Pendidikan Terakhir 
                                         </label>
                                         <input id="pendidikan_terakhir" value="{{ old('pendidikan_terakhir', $staff->pendidikan_terakhir)}}" name="pendidikan_terakhir" type="text" 
                                            class="form-control @error('pendidikan_terakhir') is-invalid @enderror"
                                            placeholder="Pendidikan Terakhir" />
                                            @error('pendidikan_terakhir')
                                            <span class="invalid-feedback" role="alert">
                                               <small>{{ $message }}</small>
                                               <br>
                                            </span>
                                            @enderror
                                      </div>
                                   </div>
                                </div>
                                <div class="form-group col">
                                 <label for="alamat" class="font-weight-bold">
                                    Alamat 
                                 </label>
                                 <textarea name="alamat" id="alamat"  class="form-control" >{{ $staff->alamat}}</textarea>
                                 
                                </div> --}}
                                <!-- slug -->
                                <div class="form-group">
                                   <label for="email" class="font-weight-bold">
                                      Email
                                   </label>
                                   <input id="email" value="{{ old('email',$user->email)}}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                     placeholder="Masukan email" readonly/>
                                      @error('email')
                                      <span class="invalid-feedback" role="alert">
                                         <small>{{ $message }}</small>
                                         <br>
                                      </span>
                                      @enderror
                                </div>
       
                               
                                
                                
                             </div>
                          </div>
                          
                         
                       </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card m-2">
                       <div class="card-body">
                          <div class="row d-flex align-items-stretch">
                             <div class="col-md-12">
                               
                                <!-- thumbnail -->
                              {{-- <div class="form-group">
                                 <label for="nip" class="font-weight-bold">
                                    NIP 
                                 </label>
                                 <input id="nip" value="{{ $staff->nip}}" name="nip" type="text" 
                                    class="form-control @error('nip') is-invalid @enderror"
                                    placeholder="NIP" readonly />
                                    @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                       <small>{{ $message }}</small>
                                       <br>
                                    </span>
                                    @enderror
                              </div>
                              
                              <div class="form-group">
                                 <label for="no_tlp_staff" class="font-weight-bold">
                                    No. Handphone 
                                 </label>
                                 <input id="no_tlp_staff" value="{{ old('no_tlp_staff',$staff->no_tlp_staff)}}" name="no_tlp_staff" type="text" 
                                    class="form-control @error('no_tlp_staff') is-invalid @enderror"
                                    placeholder="Masukan No. Handphone" />
                                    @error('no_tlp_staff')
                                    <span class="invalid-feedback" role="alert">
                                       <small>{{ $message }}</small>
                                       <br>
                                    </span>
                                    @enderror
                              </div> --}}
                                <div class="form-group">
                                   <label for="">Jalur</label>
                                   <select name="role" class="form-control">
                                     <option value="" >{{ $user->role}}</option>
                                     <option value="guru" {{(old('role') == 'guru') ? 'selected' : ''}}>Guru</option>
                                     <option value="admin" {{(old('role') == 'admin') ? 'selected' : ''}}>Admin</option>
                                     <option value="kepala sekolah" {{(old('role') == 'kepala sekolah') ? 'selected' : ''}}>Kepala Sekolah</option>
                                   </select>
                                   @if($errors->has('role'))
                                   <span class="help-block" role="alert">
                                     <small style="color: red">
                                         {{$errors->first('role')}}
                                     </small>
                                   </span>
                                   @endif
                                   @error('role')
                                       <span class="invalid-feedback" role="alert">
                                           <small style="color: red">{{ $message }}</small>
                                           <br>
                                       </span>
                                   @enderror
                                 </div>
                                <div class="form-group">
                                   <label for="input_post_thumbnail" class="font-weight-bold">
                                      Input Foto
                                   </label>
                                   <div class="input-group">
                                      <div class="input-group-prepend">
                                         <button id="button_staff_thumbnail" data-input="input_post_thumbnail" data-preview="holder"
                                            class="btn btn-secondary" type="button">
                                            Foto
                                         </button>
                                      </div>
                                      <input id="input_post_thumbnail" name="foto"  value="{{ old('foto')}}" type="text" class="form-control @error('foto') is-invalid @enderror"
                                         placeholder="Masukan Foto" readonly />
                                         @error('foto')
                                         <span class="invalid-feedback" role="alert">
                                            <small>{{ $message }}</small>
                                            <br>
                                         </span>
                                         @enderror
                                   </div>
                                </div>
                                <div class="center" id="holder">
                                 @if ($user->foto)
                                 {{-- @else --}}
                                     <img src="{{ asset( $staff->foto ?? 'assets/dist/img/user2-160x160.jpg')}}"  alt="User Image" style="height: 150px;  width:150px;">
                                 @endif
                                </div>
                             </div>
                          </div>
                          
                        </div>
                    </div>
                    <br>
                    <div class="row mr-6 mb-2">
                       <div class="col-md-12">
                          <div class="float-right">
                             <a class="btn btn-warning px-4" href="{{ route('staff.index')}}">
                                 Kembali
                             </a>
                             <button type="submit" class="btn btn-primary px-4">
                                Simpan
                            </button>
                          </div>
                       </div>
                    </div>
                </div>
            </div>
          </form>
   
      </div>
</div><!--/. container-fluid -->
@endsection


@push('javascript-external')
    {{-- <script src="{{ asset('select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('select2/js/i18n/' .app()->getLocale(). '.js')}}"></script> --}}
    {{-- laravel-filemanager --}}
    {{-- content dengan plugin tinymc --}}
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>

@endpush

@push('javascript-internal')
 <script>

    $(function(){
       //event:thumbnail
       $('#button_staff_thumbnail').filemanager('image');
    });
 
 </script>
@endpush
