@extends('backend.master')

@section('title')
    Update Manager
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">Update Manager</h1>
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
                                <h3 class="card-title" style="font-family: kalpurush">Update Manager</h3>
                            </div>
                            <form name="edit_manager" method="POST" action="{{ route('update.manager') }}" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="card-body">
                                    <div class="row" id="included_all_description">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Organization Name <span class='required-star'>*</span></label>
                                                <select name="organization_id" id="organization_id" class="form-control select2">
                                                    <option disabled>Select Organization</option>
                                                    @foreach ($organizations as $organization)
                                                        <option @if($organization->id == $manager->category_id) selected @endif value="{{ $organization->id }}">{{ $organization->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class='required-star'>*</span></label>
                                                <input type="text" name="first_name" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ $manager->first_name }}" autofocus>
                                                <input type="hidden" name="id" value="{{ $manager->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number <span class='required-star'>(Min:11,Max:11)*</span></label>
                                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ $manager->phone }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @if($manager->image)
                                                <a href="{{ asset($manager->image) }}" target="_blank">
                                                    <img src="{{ asset($manager->image) }}" alt="{{ $manager->first_name }}" style="max-height: 50px;max-width: 50px">
                                                </a>
                                            @endif
                                            <div class="form-group">
                                                <label>Image <span class='required-star'></span></label>
                                                <input type="file" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Profession <span class='required-star'></span></label>
                                                <input type="text" name="profession" class="form-control {{ $errors->has('profession') ? ' is-invalid' : '' }}" value="{{ $manager->profession }}" autofocus>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Address <span class='required-star'>*</span></label>
                                                <textarea name="address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" autofocus>{{ $manager->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>E-Mail <span class='required-star'>*</span></label>
                                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $manager->email }}" autofocus>
                                            </div>
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Password <span class='required-star'>*</span></label>--}}
{{--                                                <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ $manager->password }}" autofocus>--}}
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
                                                <label>Status<span class='required-star'></span></label>
                                                <select name="status_id" id="status_id" class="form-control select2">
                                                    <option @if($manager->status == 1) selected @endif value="1">Active</option>
                                                    <option @if($manager->status == 0) selected @endif value="0">Inactive</option>
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
        document.forms['edit_manager'].elements['division_id'].value = '{{ $manager->upazilaName->districtName->division_id }}';
        document.forms['edit_manager'].elements['district_id'].value = '{{ $manager->upazilaName->district_id }}';
        document.forms['edit_manager'].elements['upazilla_id'].value = '{{ $manager->upazilla_id }}';
    </script>
@endsection
