@extends('backend.master')

@section('title')
    Add Manager
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Add Manager</h1>
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
                                <h3 class="card-title" style="font-family: kalpurush">Add Manager</h3>
                                <div class="fa-pull-right">
                                    <a href="{{ route('manage.manager') }}">
                                        <button class="btn btn-light"><i class="fa fa-arrow-left"></i><b> Back To Manager List</b></button>
                                    </a>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('save.manager') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row" id="included_all_description">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class='required-star'>*</span></label>
                                                <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number <span class='required-star'>(Min:11,Max:11)*</span></label>
                                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image <span class='required-star'></span></label>
                                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profession <span class='required-star'></span></label>
                                                <input type="text" name="profession" class="form-control {{ $errors->has('profession') ? ' is-invalid' : '' }}" value="{{ old('profession') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address <span class='required-star'>*</span></label>
                                                <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" autofocus></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-Mail <span class='required-star'>*</span></label>
                                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password <span class='required-star'>*</span></label>
                                                <input type="password" name="password" id="myPassword" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" autofocus>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" onclick="myPasswordFunction()" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        Show Password
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Division <span class='required-star'>*</span></label>
                                                <select name="division_id" id="division_id" onchange="getDistrict();" class="form-control select2">
                                                    <option selected disabled>Select Division</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select District <span class='required-star'>*</span></label>
                                                <select name="district_id" id="district_id" onchange="getUpazila()" class="form-control">
                                                    <option selected disabled>Select District</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Upazila / Thana <span class='required-star'>*</span></label>
                                                <select name="upazilla_id" id="upazilla_id" class="form-control">
                                                    <option selected disabled>Select Upazila / Thana</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                <a href="{{ route('manage.manager') }}">
                                    <button type="button" class="btn btn-danger">Close</button>
                                    </a>
                                    <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
