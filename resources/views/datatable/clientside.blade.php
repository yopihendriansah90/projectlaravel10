@extends('layout.main')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User (Client Side)</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.user.create')}}" class="btn btn-primary mb-3">Tambah</a>
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Responsive Hover Table</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="clientside">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{asset('storage/photo-user/'.$d->image)}}" width="100"></td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->email}}</td>
                            <td>
                                <a href="{{route('admin.user.edit',['id'=>$d->id])}}" class="btn btn-primary"><i class="fas fa-pen">Edit</i></i></a>
                                <a data-toggle="modal" data-target="#modal-delete{{$d->id}}"  class="btn btn-danger"><i class="fas fa-trash-alt">Hapus</i></i></a>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-delete{{$d->id}}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Default Modal </h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah kamu yaking ingin menghapus data user <b>{{$d->name}}</b>&hellip;</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <form action="{{ route('admin.user.delete', ['id'=>$d->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                    </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection

@section('script')
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

<script>
    $(document).ready( function () {
    $('#clientside').DataTable();
    } );
</script>
@endsection
