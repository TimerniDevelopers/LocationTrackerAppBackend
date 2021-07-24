@extends('backend.master')

@section('title')
    Show Answer
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: kalpurush">
                        <h1 class="m-0 text-dark">Show Answer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Show Answer</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">
                        <select name="category_id" id="category_id" onchange="showAnswer(this.id);"
                            class="form-control select2">
                            <option selected disabled>Selcet Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="fa-pull-left">
                                    <h3 class="card-title">
                                        <i class="fas fa-list"></i> Show Answer
                                    </h3>
                                </div>

                                <div class="fa-pull-right">
                                    <a href="{{ route('show.maps.all') }}">
                                        <button class="btn btn-light"><b>Data Collected Maps</b></button>
                                    </a>
                                </div>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="defaultData">
                                    <table id="list" class="table dt-responsive table-bordered table-striped nowrap">
                                        <thead>
                                            <tr>
                                                <th style="font-family: Kalpurush">#</th>
                                                <th style="font-family: Kalpurush">User/Volunteer Name</th>
                                                <th style="font-family: Kalpurush">Patient ID</th>
                                                <th style="font-family: Kalpurush">Patient Name</th>
                                                <th style="font-family: Kalpurush">Phone</th>
                                                <th style="font-family: Kalpurush">Date</th>
                                                <th style="font-family: Kalpurush">Time</th>
                                                <th style="font-family: Kalpurush">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                        </tbody>

                                    </table>
                                </div>
                                <div class="newData">

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
        function showAnswer() {
            $('.defaultData').hide();
            var id = $('#category_id').val();
            // console.log(id);
            $.ajax({
                url: '/admin/get-answer',
                type: 'get',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.defaultData').hide();
                    // $('.newData').show();
                    $('.newData').html(data.answers)
                }
            })
        }

        function showAnswerAll(){
            $('#list').DataTable({
               bAutoWidth: false,
               processing: true,
               serverSide: true,
               iDisplayLength: 10,
               ajax: {
                   url: '{{url("admin/get-answer-all")}}',
                   method: 'post',
                   data: function (d) {
                       d._token = $('input[name="_token"]').val();
                   }
               },
               columns: [
                   {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                   {data: 'user_name', name: 'user_name'},
                   {data: 'unique_id', name: 'unique_id'},
                   {data: 'name', name: 'name'},
                   {data: 'phone', name: 'phone'},
                   {data: 'date', name: 'date'},
                   {data: 'time', name: 'time'},
                   {data: 'action', name: 'action', orderable: false, searchable: false},
               ],
               "aaSorting": []
           });
        }

        showAnswerAll();
    </script>
@endsection
