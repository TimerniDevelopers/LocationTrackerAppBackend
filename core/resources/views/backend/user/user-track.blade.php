@extends('backend.master')

@section('title')
    User Track | DcoTrack
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: kalpurush">
                        <h1 class="m-0 text-dark">User Track</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Track</li>
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
                                        <i class="fas fa-list"></i> User Track
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">
                                    <thead>
                                    <tr>
                                        <th style="font-family: Kalpurush">#</th>
                                        <th style="font-family: Kalpurush">Category</th>
                                        <th style="font-family: Kalpurush">Name</th>
                                        <th style="font-family: Kalpurush">Mobile Number</th>
                                        <th style="font-family: Kalpurush">Area</th>
                                        <th style="font-family: Kalpurush">Total Survey</th>
                                        <th style="font-family: Kalpurush">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($users as $user)
                                    <?php
                                        $survey = DB::table('user_questions')->where('user_id', $user->id)->count();
                                    ?>
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $user->categoryName->name ?? '' }}</td>
                                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->upazilaName->name }}, {{ $user->upazilaName->districtName->name }}</td>
                                            <td>{{ $survey }}</td>
                                            <td>
                                                <a href="{{ route('admin.view.user.servey', ['id'=>$user->id]) }}" target="_blank" class="btn btn-primary text-white">
                                                    <span class="fa fa-eye"> Total Survey ({{ $survey }})</span>
                                                </a>
                                                <a href="{{ route('admin.view.login.history', ['id'=>$user->id]) }}" target="_blank" class="btn btn-primary text-white">
                                                    <span class="fa fa-lock"> Login History</span>
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
