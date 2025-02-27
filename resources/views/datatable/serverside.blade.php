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
              <li class="breadcrumb-item active">Data User (Server Side)</li>
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
                  <table class="table table-hover text-nowrap" id="serverside">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>

                      </tr>
                    </thead>



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
        loadData();
    } );

    function loadData(){
        $('#serverside').DataTable({
            processing:true,
            pagination:true,
            resphonsive:false,
            serverSide:true,
            searching:true,
            ordering:false,
            ajax:{
                url:"{{route('admin.serverside')}}"
            },
            columns:[
                {
                    data: 'no',
                    name: 'no'
                },
                {
                    data: 'photo',
                    name: 'photo'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        })
    }
</script>
@endsection
