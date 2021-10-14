@extends('layouts.master')

@section('title')
    Tambah guru
@endsection

@section('breadcumbs')
    <h6>
        {{ Breadcrumbs::render('add_guru') }}
    </h6>
@endsection

@section('content')
<div class="container-fluid">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Tambah guru</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('guru.store')}}" method="post">
            @csrf
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
                                   <input id="name" value="{{ old('name')}}" name="name" type="text" 
                                      class="form-control @error('name') is-invalid @enderror"
                                      placeholder="Masukan nama lengkap" />
                                     @error('name')
                                     <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                        <br>
                                     </span>
                                     @enderror
                                </div>
                                <div class="form-row">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="tempat_lahir" class="font-weight-bold">
                                             Tempat 
                                          </label>
                                          <input id="tempat_lahir" value="{{ old('tempat_lahir')}}" name="tempat_lahir" type="text" 
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
                                       <input id="tanggal_lahir" value="{{ old('tanggal_lahir')}}" name="tanggal_lahir" type="date" 
                                          class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                          placeholder="Tanggal Lahir" />
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
                                         <option value="" >Pilih Agama</option>
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
                                         <option value="" >Pilih Jenis Kelamin</option>
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
                                         <input id="pendidikan_terakhir" value="{{ old('pendidikan_terakhir')}}" name="pendidikan_terakhir" type="text" 
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
                                 <textarea name="alamat" id="alamat" class="form-control" ></textarea>
                                 
                                </div>
                                <!-- slug -->
                                <div class="form-group">
                                   <label for="email" class="font-weight-bold">
                                      Email
                                   </label>
                                   <input id="email" value="{{ old('email')}}" name="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                     placeholder="Masukan email"/>
                                      @error('email')
                                      <span class="invalid-feedback" role="alert">
                                         <small>{{ $message }}</small>
                                         <br>
                                      </span>
                                      @enderror
                                </div>
       
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label for="password" class="font-weight-bold">
                                            Password
                                         </label>
                                         <input id="password" type="password" value="{{ old('password')}}" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                         @error('password')
                                            <span class="invalid-feedback" role="alert">
                                               <small>{{ $message }}</small>
                                               <br>
                                            </span>
                                            @enderror
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label for="password_confirmation" class="font-weight-bold">
                                            Konfirmasi Password
                                         </label>
                                         <input id="password-confirm" type="password" value="{{ old('password_confirmation')}}" placeholder="Konfirmasi password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                         @error('password_confirmation')
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
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card m-2">
                       <div class="card-body">
                          <div class="row d-flex align-items-stretch">
                             <div class="col-md-12">
                               
                                <!-- thumbnail -->
                              <div class="form-group">
                                 <label for="nip" class="font-weight-bold">
                                    NIP 
                                 </label>
                                 <input id="nip" value="{{ $urutan}}" name="nip" type="text" 
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
                                 <label for="no_tlp_guru" class="font-weight-bold">
                                    No. Handphone 
                                 </label>
                                 <input id="no_tlp_guru" value="{{ old('no_tlp_guru')}}" name="no_tlp_guru" type="text" 
                                    class="form-control @error('no_tlp_guru') is-invalid @enderror"
                                    placeholder="Masukan No. Handphone" />
                                    @error('no_tlp_guru')
                                    <span class="invalid-feedback" role="alert">
                                       <small>{{ $message }}</small>
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
                                         <button id="button_guru_thumbnail" data-input="input_post_thumbnail" data-preview="holder"
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
          
                                </div>
                             </div>
                          </div>
                          
                        </div>
                    </div>
                    <br>
                    <div class="row mr-6 mb-2">
                       <div class="col-md-12">
                          <div class="float-right">
                             <a class="btn btn-warning px-4" href="{{ route('guru.index')}}">
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
       $('#button_guru_thumbnail').filemanager('image');
    });
 
 </script>
@endpush