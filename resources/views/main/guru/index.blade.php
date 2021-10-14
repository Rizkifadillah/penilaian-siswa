@extends('layouts.master')

@section('title')
    Beranda
@endsection

@section('breadcumbs')
    <h6>
        {{ Breadcrumbs::render('guru') }}
    </h6>
@endsection

@section('content')
<div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <form action="{{ route('guru.index')}}" method="GET">
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
                        <a href="{{ route('guru.create')}}" class="btn btn-primary float-right" role="button">
                            {{-- {{ trans('tags.button.create.value') }} --}}
                            Tambah guru
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
              <tr>
                <th style="width: 10px">#</th>
                <th>Nama</th>
                <th>Email</th>
                <th style="width: 40px">Bagian</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($gurus as $index=>$guru)
                <tr>
                        <td>{{ $index+1}}</td>
                        <td>{{ $guru->name}}</td>
                        <td>{{ $guru->guru->tempat_lahir}}</td>
                        <td>{{ $guru->role}}</td>
                        <td>    
                                <a href="{{ route('guru.show', ['guru' => $guru])}}" class="btn btn-sm btn-primary" role="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                           
                                <a href="{{ route('guru.edit',  ['guru' => $guru])}}" class="btn btn-sm btn-info" role="button">
                                    <i class="fas fa-pen"></i>
                                </a>
                                
                                <form class="d-inline" role="alert" action="{{ route('guru.destroy', ['guru' => $guru])}}" method="POST"
                                    alert-title="Hapus guru" 
                                    alert-message="Hapus data {{$guru->name}}"
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



@push('javascript-internal')
<script>
    $(document).ready(function(){
        //event : delete category
        $("form[role='alert']").submit(function (event) {
            event.preventDefault();
            Swal.fire({
                title: $(this).attr('alert-title'),
                text: $(this).attr('alert-message'),
                icon: 'warning',
                allowOutsideClick: false,
                showCancelButton: true,
                cancelButtonText: $(this).attr('alert-btn-cancel'),
                reverseButtons: true,
                confirmButtonText: $(this).attr('alert-btn-ok'),
                }).then((result) => {
                if (result.isConfirmed) {
                    // todo: process of deleting categories
                    event.target.submit();
                }
            });



        });
    })
</script>
    
@endpush