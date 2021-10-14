@extends('layouts.master')

@section('title')
    Data Siswa
@endsection

@section('breadcumbs')
    <h6>
        {{ Breadcrumbs::render('dashboard') }}
    </h6>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
          <div class="row">
              <div class="col-md-6">
                 <form action="{{ route('siswa.index')}}" method="GET">
                  {{-- @csrf --}}
                    <div class="input-group">
                       <input name="keyword" value="{{ request()->get('keyword')}}" type="search" class="form-control" placeholder="Pencarian">
                       <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                             <i class="fas fa-search"></i>
                          </button>
                       </div>
                    </div>
                 </form>
              </div>
              {{-- @can('tag_create') --}}
                  <div class="col-md-6">
                      <a href="{{ route('siswa.create')}}" class="btn btn-primary float-right" role="button">
                          {{-- {{ trans('tags.button.create.value') }} --}}
                          Tambah Siswa
                          <i class="fas fa-plus"></i>
                      </a>
                  </div>
              {{-- @endcan --}}
           </div>
        </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr align="center">
              <th>#</th>
              <th>Nama</th>
              <th>NIS</th>
              <th>No Telpon</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($siswas as $index=>$siswa)
              <tr align="center">
                      <td>{{ $index+1}}</td>
                      <td>{{ $siswa->user->name}}</td>
                      <td>{{ $siswa->nis}}</td>
                      <td>{{ $siswa->no_tlp_siswa}}</td>
                      <td>{{ $siswa->jenis_kelamin}}</td>
                      <td>{{ $siswa->kelas->kelas}}</td>
                      <td>    
                              <a href="{{ route('siswa.show', ['siswa' => $siswa])}}" class="btn btn-sm btn-primary" role="button">
                                  <i class="fas fa-eye"></i>
                              </a>
                         
                              <a href="{{ route('siswa.edit',  ['siswa' => $siswa])}}" class="btn btn-sm btn-info" role="button">
                                  <i class="fas fa-pen"></i>
                              </a>
                              
                              <form class="d-inline" role="alert" action="{{ route('siswa.destroy', ['siswa' => $siswa])}}" method="POST"
                                  alert-title="Hapus guru" 
                                  alert-message="Hapus data {{$siswa->user->name}}"
                                  alert-btn-cancel="Batal"
                                  alert-btn-ok="Hapus">

                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger">
                                  <i class="fas fa-trash"></i>
                                  </button>
                              </form>
                         
                      </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
          <li class="page-item"><a class="page-link" href="#">«</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
      </div>
    </div>
</div><!--/. container-fluid -->
@endsection