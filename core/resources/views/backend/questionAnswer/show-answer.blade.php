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
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="fa-pull-left">
                                    <h3 class="card-title">
                                        <i class="fas fa-list"></i> Show Answer
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">
                                    <thead>
                                    <tr>
                                        <th style="font-family: Kalpurush">#</th>
                                        <th style="font-family: Kalpurush">User Name</th>
                                        <th style="font-family: Kalpurush">Stall Name</th>
                                        <th style="font-family: Kalpurush">Date</th>
                                        <th style="font-family: Kalpurush">Time</th>
                                        <th style="font-family: Kalpurush">Latitude</th>
                                        <th style="font-family: Kalpurush">Longitude</th>
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
                                            <td>{{ $answer->stall_name }}</td>
                                            <td>{!! date('d-M-y', strtotime($temp[0])) !!}</td>
                                            
                                            <td>{{ date('h:i A', strtotime($temp[1])) }}</td>
                                            
                                            <td>{{ $answer->latitude }}</td>
                                            <td>{{ $answer->longitude }}</td>
                                            
                                            <td> <a href="{{ route('view_answer', ['id'=>$answer->id]) }}" class="btn btn-primary text-white">
                                                    <span class="fas fa-eye"></span> Show Data
                                                </a></td>
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
