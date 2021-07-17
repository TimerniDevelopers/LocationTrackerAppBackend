@extends('backend.master')

@section('title')
    Manage Question Category
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: kalpurush">
                        <h1 class="m-0 text-dark">Manage Question Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Manage Question Category</li>
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
                                        <i class="fas fa-list"></i> Manage Question Category
                                    </h3>
                                </div>
                                <div class="fa-pull-right">
                                    <a href="{{ route('add.question.category') }}">
                                        <button class="btn btn-info"><i class="fa fa-plus"></i><b> Add Question category</b></button>
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">
                                    <thead>
                                    <tr>
                                        <th style="font-family: Kalpurush">#</th>
                                        <th style="font-family: Kalpurush">Question Category Name</th>
                                        <th style="font-family: Kalpurush">Status</th>
                                        <th style="font-family: Kalpurush">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($categories as $category)
                                    <?php
                                        $questionCount = App\Models\Question::where('category_id', $category->id)->where('status', 1)->count();
                                    ?>
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->name }} ({{ $questionCount }} Questions)</td>
                                            <td>
                                                @if($category->status == 1)
                                                    <button class="btn btn-sm btn-success"><span class="fa fa-check"></span> Active</button>
                                                @else
                                                    <button class="btn btn-sm btn-danger"><span class="fa fa-ban"></span> Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('manage.question', ['id'=>$category->id]) }}" target="_blank" class="btn btn-primary text-white">
                                                    <span class="fa fa-edit"></span> View Question
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
