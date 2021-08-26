@extends('backend.master')

@section('title')
    Manage Manager
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: kalpurush">
                        <h1 class="m-0 text-dark">Manage Manager</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Manage Manager</li>
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
                                        <i class="fas fa-list"></i> Manage Manager
                                    </h3>
                                </div>

                                <div class="fa-pull-right">
                                    <a href="{{ route('add.manager') }}">
                                        <button class="btn btn-info"><i class="fa fa-plus"></i><b> Add Manager</b></button>
                                    </a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="list" class="table dt-responsive table-bordered table-striped nowrap">
                                    <thead>
                                    <tr>
                                        <th style="font-family: Kalpurush">#</th>
                                        <th style="font-family: Kalpurush">Organization Name</th>
                                        <th style="font-family: Kalpurush">Name</th>
                                        <th style="font-family: Kalpurush">Mobile Number</th>
                                        <th style="font-family: Kalpurush">Email</th>
                                        <th style="font-family: Kalpurush">Area</th>
                                        <th style="font-family: Kalpurush">Status</th>
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
        </section>
    </div>
@endsection

@section('js')
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<script src="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
        function showManger(){
            $('#list').DataTable({
               bAutoWidth: false,
               processing: true,
               serverSide: true,
               iDisplayLength: 10,
               ajax: {
                   url: '{{url("admin/get-manager")}}',
                   method: 'post',
                   data: function (d) {
                       d._token = $('input[name="_token"]').val();
                   }
               },
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'organization_name', name: 'organization_name'},
                   {data: 'first_name', name: 'first_name'},
                   {data: 'name', name: 'phone'},
                   {data: 'email', name: 'email'},
                   {data: 'name', name: 'name'},
                   {data: 'status', name: 'status'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
               "aaSorting": []
           });
        }

        showManger();

        function deleteManager(id,e){
            e.preventDefault();
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this Manager!",
                icon: "warning",
                showCloseButton: true,
                // showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `Delete`,
                // dangerMode: true,
            }).then((result) => {
                if (result.value == true) {
                    swal.fire({
                        title: 'Success',
                        text: 'Manager is deleted Successfully!',
                        icon: 'success'
                    }).then(function () {
                        $.ajax({
                            url: '{{ url("admin/delete/manager") }}',
                            method: 'POST',
                            data: {id: id, "_token": "{{ csrf_token() }}"},
                            dataType: 'json',
                            success: function () {
                                location.reload(); 
                            }
                        })
                    })
                }
                else if (result.value == false) {
                    swal.fire("Cancelled", "Manager is safe :)", "error");
                }
            })
        }
</script>
    
@endsection
