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
                                    <table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">                                        <thead>
                                            <tr>
                                                <th style="font-family: Kalpurush">#</th>
                                                <th style="font-family: Kalpurush">Patient ID</th>
                                                <th style="font-family: Kalpurush">Patient Name</th>
                                                <th style="font-family: Kalpurush">Phone</th>
                                                <th style="font-family: Kalpurush">Date</th>
                                                <th style="font-family: Kalpurush">Time</th>
                                                <th style="font-family: Kalpurush">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($collecteds as $collected)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $collected->unique_id }}</td>
                                                <td>{{ $collected->name }}</td>
                                                <td>{{ $collected->phone }}</td>
                                                <td>{{ \Carbon\Carbon::parse($collected->created_at)->format('d M Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($collected->created_at)->format('h:i A') }}</td>
                                                <td>
                                                    <a href="{{ route('user.view.collected.data',['id'=>$collected->id,'user_id'=>$collected->user_id]) }}" class="btn btn-sm btn-success"><span class="fa fa-eye"> View Data</span></a>
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
            </div>
        </section>
    </div>
@endsection
