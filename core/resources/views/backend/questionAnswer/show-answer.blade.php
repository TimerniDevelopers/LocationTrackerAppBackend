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

                {{-- <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-4">
                        <select name="category_id" id="category_id" onchange="showAnswer(this.id);" class="form-control select2">
                            <option selected disabled>Selcet Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-4">

                    </div>
                </div> --}}

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
                                <table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">
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
                                    @php($i=1)
                                    @foreach($answers as $answer)
                                    <?php
                                    $temp = explode(' ',$answer->created_at);
                                    ?>
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $answer->userName->first_name ?? '' }}</td>
                                            <td>{{ $answer->unique_id }}</td>
                                            <td>{{ $answer->name }}</td>
                                            <td>{{ $answer->phone }}</td>
                                            <td>{!! date('d-M-y', strtotime($temp[0])) !!}</td>

                                            <td>{{ date('h:i A', strtotime($temp[1])) }}</td>

                                            <td> <a href="{{ route('show.maps', ['id'=>$answer->id]) }}" class="btn btn-primary text-white">
                                                    <span class="fas fa-eye"></span> Show Map
                                                </a>
                                                <a href="{{ route('view_answer', ['id'=>$answer->id]) }}" class="btn btn-primary text-white">
                                                    <span class="fas fa-eye"></span> Show Data
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
{{-- <script>
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

                $('.newData').hide();
                $('.newData').html(data.answers)
            }
        })
    }
    </script> --}}
@endsection

