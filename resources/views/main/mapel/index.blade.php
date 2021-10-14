@extends('layouts.master')

@section('title')
    Mata Pelajaran
@endsection

@section('breadcumbs')
    <h6>
        {{ Breadcrumbs::render('mapel') }}
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
                <form action="{{ route('mapel.store')}}" method="post">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input type="text" name="nama" class="form-control">
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
                        @foreach ($mapels as $index=>$mapel)
                            <div class="col-md-8">
                                <p class="text-muted">{{ $index+1 ?? ''}} . {{ $mapel->nama ?? ''}}</p>
                            </div>
                            <div class="col-md-4 ">
                                {{-- /{{ route('staff.edit',  ['staff' => $staff])}} --}}
                               

                                <form class="d-inline " role="alert" action="{{ route('mapel.destroy', ['mapel' => $mapel])}}" method="POST"
                                    alert-title="Hapus Mata Pelajaran" 
                                    alert-message="Hapus data {{$mapel->name}}"
                                    alert-btn-cancel="Batal"
                                    alert-btn-ok="Hapus">

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger float-right mr-1">
                                    <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                                 <a href="{{ route('mapel.edit',  ['mapel' => $mapel])}}" class="btn btn-sm btn-success float-right mr-1" role="button">
                                    <i class="fas fa-pen"></i>
                                </a> 
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