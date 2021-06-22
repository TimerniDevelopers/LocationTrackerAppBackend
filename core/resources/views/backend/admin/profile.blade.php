@extends('backend.master')

@section('title')
    {{ Auth::guard('admin')->user()->first_name }}'s Profile
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">{{ Auth::guard('admin')->user()->first_name }}' Profile</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title" style="font-family: kalpurush">{{ Auth::guard('admin')->user()->first_name }}'s Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="row" id="included_all_description">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->first_name }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number </label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->phone }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Profession </label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->profession }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address </label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->address }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->email }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            @if(Auth::guard('admin')->user()->status == 1)
                                                <button class="form-control text-left" disabled>Active</button>
                                            @else
                                                <button class="form-control text-left" disabled>Inactive</button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Division</label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->upazilaName->districtName->divisionName->name ?? '' }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>District</label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->upazilaName->districtName->name ?? '' }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Upazila/Thana</label>
                                            <input type="text" value="{{ Auth::guard('admin')->user()->upazilaName->name ?? '' }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
