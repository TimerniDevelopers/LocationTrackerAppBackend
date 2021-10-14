@extends('backend.master')

@section('title')
    Add Vehicle
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        {{-- <div class="content-header">
            <div class="container-fluid"> --}}
                {{-- <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Add Vehicle</h1>
                    </div><!-- /.col -->
                </div><!-- /.row --> --}}
            {{-- </div>
        </div> --}}
        <br>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="font-family: kalpurush">Add Vehicle</h3>
                            </div>
                            <form method="POST" action="{{ route('save.vehicle') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row" id="included_all_description">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Vehicle Name <span class='required-star'>*</span></label>
                                                <input type="text" name="vehicle_name" class="form-control @error('vehicle_name') is-invalid @enderror" placeholder="Enter the vehicle name"/>
                                                @error('vehicle_name')
                                                    <div class="text-danger">{{ $errors->first('vehicle_name') }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea type="text" name="description" class="form-control" value="" placeholder="Enter the description"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status<span class='required-star'></span></label>
                                                <select name="status" id="status" class="form-control select2">
                                                    <option selected value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="list" class="table dt-responsive table-bordered table-striped nowrap">
                                    <thead>
                                    <tr>
                                        <th style="font-family: Kalpurush">#</th>
                                        <th style="font-family: Kalpurush">Vehicle Name</th>
                                        <th style="font-family: Kalpurush">Description</th>
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
        function showVehicle(){
            $('#list').DataTable({
               bAutoWidth: false,
               processing: true,
               serverSide: true,
               iDisplayLength: 10,
               ajax: {
                   url: '{{url("admin/get-vehicle")}}',
                   method: 'post',
                   data: function (d) {
                       d._token = $('input[name="_token"]').val();
                   }
               },
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'vehicle_name', name: 'vehicle_name'},
                   {data: 'description', name: 'description'},
                   {data: 'status', name: 'status'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
               "aaSorting": []
           });
        }

        showVehicle();

        function deleteVehicle(id,e){
            e.preventDefault();
            swal.fire({
                title: "Are you sure?",
                text: "You want to delete this Vehicle!",
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
                        text: 'Vehicle is deleted Successfully!',
                        icon: 'success'
                    }).then(function () {
                        $.ajax({
                            url: '{{ url("admin/delete/vehicle") }}',
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
                    swal.fire("Cancelled", "vehicle is safe :)", "error");
                }
            })
        }
</script>
    
@endsection
