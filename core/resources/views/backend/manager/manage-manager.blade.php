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
                                <table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">
                                    <thead>
                                    <tr>
                                        <th style="font-family: Kalpurush">#</th>
                                        <th style="font-family: Kalpurush">Name</th>
                                        <th style="font-family: Kalpurush">Mobile Number</th>
                                        <th style="font-family: Kalpurush">Email</th>
                                        <th style="font-family: Kalpurush">Area</th>
                                        <th style="font-family: Kalpurush">Status</th>
                                        <th style="font-family: Kalpurush">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($managers as $manager)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $manager->first_name }}</td>
                                            <td>{{ $manager->phone }}</td>
                                            <td>{{ $manager->email }}</td>
                                            <td>{{ $manager->name }}</td>
                                            <td>
                                                @if($manager->status == 1)
                                                    <button class="btn btn-sm btn-success"><span class="fa fa-check"></span> Active</button>
                                                @else
                                                    <button class="btn btn-sm btn-danger"><span class="fa fa-ban"></span> Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.manager', ['id'=>$manager->id]) }}" class="btn btn-primary text-white">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                <a href="#deleteManager-{{ $manager->id }}" data-toggle="modal" class="btn btn-danger text-white">
                                                    <span class="fa fa-trash"></span> 
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="deleteManager-{{ $manager->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('delete.manager') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">Delete Manager!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this?</p>
                                                            <input type="hidden" name="id" value="{{ $manager->id }}">
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
