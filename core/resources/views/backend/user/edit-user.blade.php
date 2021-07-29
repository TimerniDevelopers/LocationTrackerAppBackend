@extends('backend.master')

@section('title')
    Update User
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Update User</h1>
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
                                <h3 class="card-title" style="font-family: kalpurush">Update User</h3>
                            </div>
                            <form name="edit_user" method="POST" action="{{ route('update.user') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Category/Field <span class='required-star'>*</span></label>
                                                <select name="category_id" id="" class="form-control select2">
                                                    <option selected disabled>Select Category/Field</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Role <span class=' required-star text-danger'>*</span></label>
                                                <select name="role_id" id="" class="form-control select2">
                                                    @if ($user->role_id == 1)
                                                        <option value="1">Doctor</option>
                                                        <option value="2">Volunteer</option>
                                                    @elseif ($user->role_id == 2)
                                                        <option value="2">Volunteer</option>
                                                        <option value="1">Doctor</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>First Name <span class='required-star'>*</span></label>
                                                <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ $user->first_name }}" autofocus>
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Last Name <span class='required-star'>*</span></label>
                                                <input type="text" name="last_name" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ $user->last_name }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number <span class='required-star'>(Min:11,Max:11)*</span></label>
                                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $user->phone }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profession <span class='required-star'></span></label>
                                                <input type="text" name="profession" class="form-control {{ $errors->has('profession') ? ' is-invalid' : '' }}" value="{{ $user->profession }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gender <span class='required-star'></span></label>
                                                <select name="gender" class="form-control">
                                                    @if($user->gender == 1)
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                        <option value="3">Others</option>
                                                    @elseif($user->gender == 2)
                                                        <option value="2">Female</option>
                                                        <option value="3">Others</option>
                                                        <option value="1">Male</option>
                                                    @else
                                                        <option value="3">Others</option>
                                                        <option value="1">Male</option>
                                                        <option value="2">Female</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address <span class='required-star'>*</span></label>
                                                <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" autofocus>{{ $user->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @if($user->image)
                                                <a href="{{ asset($user->image) }}" target="_blank">
                                                    <img src="{{ asset($user->image) }}" alt="{{ $user->first_name }}" style="max-height: 50px;max-width: 50px">
                                                </a>
                                            @endif
                                            <div class="form-group">
                                                <label>Image <span class='required-star'></span></label>
                                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-Mail <span class='required-star'>*</span></label>
                                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}" autofocus>
                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Password <span class='required-star'>*</span></label>--}}
{{--                                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" autofocus>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
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
                                                    @foreach($districts as $district)
                                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Select Upazila / Thana <span class='required-star'>*</span></label>
                                                <select name="upazilla_id" id="upazilla_id" class="form-control">
                                                    @foreach($upazilas as $upazila)
                                                        <option value="{{ $upazila->id }}">{{ $upazila->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status <span class='required-star'></span></label>
                                                <select name="status" class="form-control">
                                                    @if($user->status == 1)
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    @else
                                                        <option value="0">Inactive</option>
                                                        <option value="1">Active</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-danger">Close</button>
                                    <button type="submit" class="btn btn-info float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        document.forms['edit_user'].elements['category_id'].value = '{{ $user->category_id }}';
        document.forms['edit_user'].elements['division_id'].value = '{{ $user->upazilaName->districtName->division_id }}';
        document.forms['edit_user'].elements['district_id'].value = '{{ $user->upazilaName->district_id }}';
        document.forms['edit_user'].elements['upazilla_id'].value = '{{ $user->upazilla_id }}';
    </script>
@endsection
