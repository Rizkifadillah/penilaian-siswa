@extends('layouts.master')

@section('title')
    Tambah Kelas
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
          <h3 class="card-title">Tambah Kelas</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('kelas.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card m-2">
                       <div class="card-body">
                          <div class="row d-flex align-items-stretch">
                             <div class="col-md-12">
                                <!-- title -->
                                <div class="form-group">
                                   <label for="kelas" class="font-weight-bold">
                                       Nama Kelas
                                   </label>
                                   <input id="kelas" value="{{ old('kelas')}}" name="kelas" type="text" 
                                      class="form-control @error('kelas') is-invalid @enderror"
                                      placeholder="Masukan Nama Kelas" />
                                     @error('kelas')
                                     <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                        <br>
                                     </span>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label for="semester" class="font-weight-bold">
                                       Semester 
                                    </label>
                                    <input id="semester" value="{{ old('semester')}}" name="semester" type="text" 
                                       class="form-control @error('semester') is-invalid @enderror"
                                       placeholder="Semester" />
                                       @error('semester')
                                       <span class="invalid-feedback" role="alert">
                                          <small>{{ $message }}</small>
                                          <br>
                                       </span>
                                       @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun_ajaran" class="font-weight-bold">
                                       Tahun Ajaran 
                                    </label>
                                    <input id="tahun_ajaran" value="{{ old('tahun_ajaran')}}" name="tahun_ajaran" type="text" 
                                       class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                       placeholder="Tahun Ajaran" />
                                       @error('tahun_ajaran')
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
                <div class="col-md-6">
                    <div class="card m-2">
                       <div class="card-body">
                          <div class="row d-flex align-items-stretch">
                             <div class="col-md-12">
                               
                                <!-- thumbnail -->
                                <div class="form-group">
                                 <label for="exampleInputEmail1">Wali Kelas</label>
                                 <select class="form-control select2" name="guru_id" id="">
                                    <option selected="" disabled="" value="">Pilih Wali Kelas</option>
                                     @foreach($guru_id as $guru)
                                     <option value="{{ $guru->id}}">{{$guru->user->name}}</option>
                                     @endforeach
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
                                 <label for="jumlah_siswa" class="font-weight-bold">
                                    Jumlah Siswa 
                                 </label>
                                 <input id="jumlah_siswa" value="{{ old('jumlah_siswa')}}" name="jumlah_siswa" type="number" 
                                    class="form-control @error('jumlah_siswa') is-invalid @enderror"
                                    placeholder="Jumlah Siswa" />
                                    @error('jumlah_siswa')
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