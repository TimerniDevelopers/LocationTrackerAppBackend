@extends('user.master')

@section('title')
    Collected Data
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: kalpurush">
                        <h1 class="m-0 text-dark">Collected Data</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Collected Data</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="fa-pull-left">
                                    <h3 class="card-title">
                                        <i class="fas fa-list"></i> Collected Data
                                    </h3>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="defaultData">
                                    <table id="list" class="table dt-responsive table-bordered table-striped nowrap">                                        <thead>
                                            <tr>
                                                <th style="font-family: Kalpurush">#</th>
                                                <th style="font-family: Kalpurush">Survey By</th>
                                                <th style="font-family: Kalpurush">Date</th>
                                                <th style="font-family: Kalpurush">Time</th>
                                                <th style="font-family: Kalpurush">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
        function showuserTrack(){
            $('#list').DataTable({
               bAutoWidth: false,
               processing: true,
               serverSide: true,
               iDisplayLength: 10,
               ajax: {
                   url: '{{url("user/get-collected-data")}}',
                   method: 'post',
                   data: function (d) {
                       d._token = $('input[name="_token"]').val();
                   }
               },
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'userName', name: 'userName'},
                   {data: 'date', name: 'date'},
                   {data: 'time', name: 'time'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
               "aaSorting": []
           });
        }

        showuserTrack();
</script>

@endsection

