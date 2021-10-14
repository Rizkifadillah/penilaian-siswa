@extends('layouts.master')

@section('title')
    Data Kelas
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
                 <form action="{{ route('kelas.index')}}" method="GET">
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
                      <a href="{{ route('kelas.create')}}" class="btn btn-primary float-right" role="button">
                          {{-- {{ trans('tags.button.create.value') }} --}}
                          Tambah Kelas
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
              <th>Kelas</th>
              <th>Semester</th>
              <th>Tahun Ajaran</th>
              <th>Wali Kelas</th>
              <th>Jumlah Siswa</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($kelass as $index=>$kelas)
              <tr align="center">
                      <td>{{ $index+1}}</td>
                      <td>{{ $kelas->kelas}}</td>
                      <td>{{ $kelas->semester}}</td>
                      <td>{{ $kelas->tahun_ajaran}}</td>
                      <td>{{ $kelas->guru->user->name}}</td>
                      <td>{{ $kelas->jumlah_siswa}}</td>
                      <td>    
                              <a href="{{ route('kelas.show', ['kela' => $kelas])}}" class="btn btn-sm btn-primary" role="button">
                                  <i class="fas fa-eye"></i>
                              </a>
                         
                              <a href="{{ route('kelas.edit',  ['kela' => $kelas])}}" class="btn btn-sm btn-info" role="button">
                                  <i class="fas fa-pen"></i>
                              </a>
                              
                              <form class="d-inline" role="alert" action="{{ route('kelas.destroy', ['kela' => $kelas])}}" method="POST"
                                  alert-title="Hapus guru" 
                                  alert-message="Hapus data {{$kelas->kelas}}"
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