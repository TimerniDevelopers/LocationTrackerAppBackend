@extends('backend.master')

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
                                <table id="table_id" class="table dt-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            @foreach ($questions as $key => $question)
                                                <th style="font-family: Kalpurush;">{{ $question->name }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            @foreach ($questions as $key => $question)
                                                @foreach ($answer as $key => $ans)
                                                    @if ($question->id == $ans->question_id)
                                                        @if ($ans->question_id != '')
                                                            <td>{{ $ans->question_ans }}</td>
                                                        @else
                                                            <td> null </td>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tr>
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
