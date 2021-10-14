@extends('layouts.master')

@section('title')
    Beranda
@endsection

@section('breadcumbs')
    <h6>
        {{ Breadcrumbs::render('edit_mapel_name',$mapel) }}
    </h6>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <!-- MAP & BOX PANE -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Mata Pelajaran</h3>

              {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <form action="{{ route('mapel.update', ['mapel' => $mapel])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="input-group input-group-sm">
                        <input type="text" name="nama" value="{{ $mapel->nama}}" class="form-control">
                        <span class="input-group-append">
                        <button type="submit" class="btn btn-info btn-flat">
                            <i class="fas fa-plus"></i>
                        </button>
                        </span>
                    </div> 
                </form>           
            </div>
            <!-- /.card-body -->
          </div>
         
          <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="fas fa-book"></i>
                    List Mata Pelajaran
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        @foreach ($mapels as $index=>$data)
                            <div class="col-md-8">
                                <p class="text-muted">{{ $index+1 ?? ''}} . {{ $data->nama ?? ''}}</p>
                            </div>
                                                       
                        @endforeach
                    </div>
  
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <!-- /.col -->
      </div>
</div><!--/. container-fluid -->
@endsection