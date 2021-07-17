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
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                @if($category->status == 1)
                                                    <button class="btn btn-sm btn-success"><span class="fa fa-check"></span> Active</button>
                                                @else
                                                    <button class="btn btn-sm btn-danger"><span class="fa fa-ban"></span> Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.question.category', ['id'=>$category->id]) }}" class="btn btn-primary text-white">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                <a href="#deleteQuestion-{{ $category->id }}" data-toggle="modal" class="btn btn-danger text-white">
                                                    <span class="fa fa-trash"></span> 
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="deleteQuestion-{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('delete.question.category') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">Delete Question!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this?</p>
                                                            <input type="hidden" name="id" value="{{ $category->id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-info float-right">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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