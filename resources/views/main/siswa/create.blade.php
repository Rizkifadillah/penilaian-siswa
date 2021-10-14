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
                <h3 class="card-title">Input Data Siswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('siswa.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card m-2">
                            <div class="card-body">
                                <div class="row d-flex align-items-stretch">
                                    <div class="col-md-12">


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nis" class="font-weight-bold">
                                                        NIS
                                                    </label>
                                                    <input id="nis" value="{{ $urutan }}" name="nis" type="text"
                                                        class="form-control @error('nis') is-invalid @enderror"
                                                        placeholder="NIS" readonly />
                                                    @error('nis')
                                                        <span class="invalid-feedback" role="alert">
                                                            <small>{{ $message }}</small>
                                                            <br>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Kelas</label>
                                                    <select class="form-control select2" name="kelas_id" id="">
                                                        <option selected="" disabled="" value="{{ old('kelas_id')}}">Pilih Kelas</option>
                                                        @foreach ($kelas_id as $kelas)
                                                            <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('role'))
                                                        <span class="help-block" role="alert">
                                                            <small style="color: red">
                                                                {{ $errors->first('role') }}
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
                                            </div>
                                        </div>
                                        <!-- title -->
                                        <div class="form-group">
                                            <label for="name" class="font-weight-bold">
                                                Nama Lengkap
                                            </label>
                                            <input id="name" value="{{ old('name') }}" name="name" type="text"
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
                                                    <input id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                                                        name="tempat_lahir" type="text"
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
                                                    <input id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                                        name="tanggal_lahir" type="date"
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
                                                        <option value="">Pilih Agama</option>
                                                        <option value="islam"
                                                            {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam
                                                        </option>
                                                        <option value="katolik"
                                                            {{ old('agama') == 'katolik' ? 'selected' : '' }}>Katolik
                                                        </option>
                                                        <option value="protestan"
                                                            {{ old('agama') == 'protestan' ? 'selected' : '' }}>Protestan
                                                        </option>
                                                        <option value="hindu"
                                                            {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu
                                                        </option>
                                                        <option value="budha"
                                                            {{ old('agama') == 'budha' ? 'selected' : '' }}>Budha
                                                        </option>
                                                    </select>
                                                    @if ($errors->has('agama'))
                                                        <span class="help-block" role="alert">
                                                            <small style="color: red">
                                                                {{ $errors->first('agama') }}
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
                                                    <label for="no_tlp_siswa" class="font-weight-bold">
                                                        No. Handphone
                                                    </label>
                                                    <input id="no_tlp_siswa" value="{{ old('no_tlp_siswa') }}"
                                                        name="no_tlp_siswa" type="text"
                                                        class="form-control @error('no_tlp_siswa') is-invalid @enderror"
                                                        placeholder="Masukan No. Handphone" />
                                                    @error('no_tlp_siswa')
                                                        <span class="invalid-feedback" role="alert">
                                                            <small>{{ $message }}</small>
                                                            <br>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" class="form-control">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="laki_laki"
                                                            {{ old('jenis_kelamin') == 'laki_laki' ? 'selected' : '' }}>
                                                            Laki-laki</option>
                                                        <option value="perempuan"
                                                            {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>
                                                            Perempuan</option>
                                                    </select>
                                                    @if ($errors->has('jenis_kelamin'))
                                                        <span class="help-block" role="alert">
                                                            <small style="color: red">
                                                                {{ $errors->first('jenis_kelamin') }}
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

                                        </div>



                                        <div class="form-group col">
                                            <label for="alamat" class="font-weight-bold">
                                                Alamat
                                            </label>
                                            <textarea name="alamat" id="alamat" class="form-control"></textarea>

                                        </div>

                                        <!-- slug -->
                                        <div class="form-group">
                                            <label for="email" class="font-weight-bold">
                                                Email
                                            </label>
                                            <input id="email" value="{{ old('email') }}" name="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Masukan email" />
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
                                                    <input id="password" type="password" value="{{ old('password') }}"
                                                        placeholder="Password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password"  autocomplete="new-password">
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
                                                    <input id="password-confirm" type="password"
                                                        value="{{ old('password_confirmation') }}"
                                                        placeholder="Konfirmasi password" class="form-control"
                                                        name="password_confirmation"  autocomplete="new-password">
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <small>{{ $message }}</small>
                                                            <br>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="input_post_thumbnail" class="font-weight-bold">
                                                Input Foto
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button id="button_siswa_thumbnail" data-input="input_post_thumbnail"
                                                        data-preview="holder" class="btn btn-secondary" type="button">
                                                        Foto
                                                    </button>
                                                </div>
                                                <input id="input_post_thumbnail" name="foto" value="{{ old('foto') }}"
                                                    type="text" class="form-control @error('foto') is-invalid @enderror"
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
                    </div>
                    <div class="col-md-4">
                        <div class="card m-2">
                            <div class="card-body">
                                <div class="row d-flex align-items-stretch">
                                    <div class="col-md-12">

                                        <!-- thumbnail -->
                                       <div class="form-group">
                                          <label for="nama_ayah" class="font-weight-bold">
                                             Nama Ayah
                                          </label>
                                          <input id="nama_ayah" value="{{ old('nama_ayah') }}" name="nama_ayah" type="text"
                                             class="form-control @error('nama_ayah') is-invalid @enderror"
                                             placeholder="Masukan Nama Ayah" />
                                          @error('nama_ayah')
                                             <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                <br>
                                             </span>
                                          @enderror
                                       </div>

                                       <div class="form-group">
                                          <label for="nama_ibu" class="font-weight-bold">
                                             Nama Ibu
                                          </label>
                                          <input id="nama_ibu" value="{{ old('nama_ibu') }}" name="nama_ibu" type="text"
                                             class="form-control @error('nama_ibu') is-invalid @enderror"
                                             placeholder="Masukan Nama Ibu" />
                                          @error('nama_ibu')
                                             <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                <br>
                                             </span>
                                          @enderror
                                       </div>

                                       <div class="form-group">
                                          <label for="pekerjaan_ayah" class="font-weight-bold">
                                             Pekerjaan Ayah
                                          </label>
                                          <input id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" name="pekerjaan_ayah" type="text"
                                             class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                             placeholder="Masukan Pekerjaan Ayah" />
                                          @error('pekerjaan_ayah')
                                             <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                <br>
                                             </span>
                                          @enderror
                                       </div>

                                       <div class="form-group">
                                          <label for="pekerjaan_ibu" class="font-weight-bold">
                                             Pekerjaan Ibu
                                          </label>
                                          <input id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" name="pekerjaan_ibu" type="text"
                                             class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                             placeholder="Masukan Pekerjaan Ibu" />
                                          @error('pekerjaan_ibu')
                                             <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                                <br>
                                             </span>
                                          @enderror
                                       </div>

                                        <div class="form-group">
                                            <label for="no_tlp_ortu" class="font-weight-bold">
                                                No. Handphone Orang Tua
                                            </label>
                                            <input id="no_tlp_ortu" value="{{ old('no_tlp_ortu') }}" name="no_tlp_ortu"
                                                type="text" class="form-control @error('no_tlp_ortu') is-invalid @enderror"
                                                placeholder="Masukan No. Handphone" />
                                            @error('no_tlp_ortu')
                                                <span class="invalid-feedback" role="alert">
                                                    <small>{{ $message }}</small>
                                                    <br>
                                                </span>
                                            @enderror
                                        </div>


                                        
                                        <div class="form-group col">
                                          <label for="alamat_ortu" class="font-weight-bold">
                                              Alamat Orang Tua
                                          </label>
                                          <textarea name="alamat_ortu" id="alamat_ortu" class="form-control"></textarea>

                                      </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <div class="row mr-6 mb-2">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <a class="btn btn-warning px-4" href="{{ route('guru.index') }}">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4 mr-2">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!--/. container-fluid -->
@endsection


@push('javascript-external')
    {{-- <script src="{{ asset('select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('select2/js/i18n/' .app()->getLocale(). '.js')}}"></script> --}}
    {{-- laravel-filemanager --}}
    {{-- content dengan plugin tinymc --}}
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

@endpush

@push('javascript-internal')
    <script>
        $(function() {
            //event:thumbnail
            $('#button_siswa_thumbnail').filemanager('image');
        });
    </script>
@endpush
