@extends('backend.master')

@section('title')
    Request Demo List
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6" style="font-family: kalpurush">
                        <h1 class="m-0 text-dark">Request Demo List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Request Demo List</li>
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
                                        <i class="fas fa-list"></i> Request Demo List
                                    </h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="table_id" class="table dt-responsive table-bordered table-striped nowrap">
                                    <thead>
                                    <tr>
                                        <th style="font-family: Kalpurush">#</th>
                                        <th style="font-family: Kalpurush">Name</th>
                                        <th style="font-family: Kalpurush">Email</th>
                                        <th style="font-family: Kalpurush">Phone</th>
                                        <th style="font-family: Kalpurush">Comapany Name</th>
                                        <th style="font-family: Kalpurush">Number of Employee</th>
                                        <th style="font-family: Kalpurush">Country</th>
                                        <th style="font-family: Kalpurush">City</th>
                                        <th style="font-family: Kalpurush">Industry Type</th>
                                        <th style="font-family: Kalpurush">Address</th>
                                        <th style="font-family: Kalpurush">Message</th>
                                        <th style="font-family: Kalpurush">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($requestDemos as $requestDemo)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $requestDemo->name }}</td>
                                            <td>{{ $requestDemo->email }}</td>
                                            <td>{{ $requestDemo->phone }}</td>
                                            <td>{{ $requestDemo->company_name }}</td>
                                            <td>{{ $requestDemo->employee }}</td>
                                            <td>{{ $requestDemo->countryName->country_name ?? '' }}</td>
                                            <td>{{ $requestDemo->city_id }}</td>
                                            <td>{{ $requestDemo->industry_type }}</td>
                                            <td>{{ $requestDemo->address }}</td>
                                            <td>{{ $requestDemo->message }}</td>
                                            <td>
                                                <a href="#deleteRequestDemo-{{ $requestDemo->id }}" data-toggle="modal" class="btn btn-danger text-white">
                                                    <span class="fa fa-trash"></span> 
                                                </a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="deleteRequestDemo-{{ $requestDemo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('delete.request.demo') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabelLogout">Delete Request Demo!</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this?</p>
                                                            <input type="hidden" name="id" value="{{ $requestDemo->id }}">
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
