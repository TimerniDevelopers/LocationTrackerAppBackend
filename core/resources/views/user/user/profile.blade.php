@extends('user.master')

@section('title')
    {{ Auth::guard('web')->user()->first_name }}'s Profile
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user_profile/css/profile.css') }}">
@endsection


@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="banner position-relative" data-background="{{ asset('assets/user_profile/img/banner.jpg') }}">
        </div>
        <!--====== profile Start ======-->
        <div class="profile">
            <div class="container">
                <div class="profile-content box-bg">
                    <div class="row">
                        <div class="col-md-12  col-lg-10 offset-xl-2 col-xl-8">
                            <div class="prifle-heading">
                                <div class="text-center ">
                                    <div class=" d-sm-block d-md-none ">
                                        <div class="profile-upload">
                                            {{-- <input type="file"> --}}
                                            <img src="{{ asset($user_profile->image) }}" alt="">
                                            <!-- <i class="fas fa-camera"></i> -->
                                        </div>
                                    </div>
                                    <h2>{{ $user_profile->first_name }} {{ $user_profile->last_name }}</h2>
                                    <div class="d-none clearfix">
                                        <div class="f-right">
                                            <div class="eidt-dot d-flex align-items-center">
                                                <a href="javascript:void(0);" class="mr-10">
                                                    <div class="dot-item">
                                                        <div class="dot1"></div>
                                                        <div class="dot2"></div>
                                                        <div class="dot3"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="f-left">
                                            <h2>{{ $user_profile->first_name }} {{ $user_profile->last_name }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="sticky">
                            <div class="profile-navbar">
                                <div class="d-none d-md-block">
                                    <div class="profile-upload position-absolute">
                                        {{-- <input type="file"> --}}
                                        <img src="{{ asset($user_profile->image) }}" alt="">
                                        <!-- <i class="fas fa-camera"></i> -->
                                    </div>
                                </div>
                                <div class="profile-nav-wrapper">
                                    <div class="profile-header d-flex align-items-center justify-content-between">
                                        <div>
                                            <!-- BEGIN profile-header-tab -->
                                            <div class="d-none d-lg-block">
                                                <ul class="profile-header-tab nav nav-tabs">
                                                    <li class="nav-item "><a href="#profile_about" class="nav-link active"
                                                            data-toggle="tab">ABOUT</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- END profile-header-tab -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="profile-content p-0 mt-50">
                            <!-- begin tab-content -->
                            <div class="tab-content p-0">

                                <!-- begin #profile-friends tab -->
                                <div class="tab-pane fade in active show" id="profile_about">
                                    <!-- begin row -->
                                    <div class="border-relative bg-white p-b-r mt-5 mb-5">
                                        <h4 class="py-2">About</h4>
                                        <div class="row row-space-2 mb-3 ">

                                            <!-- begin col-6 -->
                                            <div class="col-md-4">

                                                <div class="about-left">
                                                    <ul class="nav nav-tabs">
                                                        {{-- <li class="active"><a href="#overview" class=" " data-toggle="tab">Overview</a>
                                                        </li> --}}
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Category</a></li>
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Name</a></li>
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Email</a></li>
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Mobile Number</a></li>
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Address</a></li>
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Profession</a></li>
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Gender</a></li>
                                                        <li><a style="text-decoration: none" href="javascript:void(0);"
                                                                data-toggle="tab">Area</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-8 border-md-top border-left">
                                                <div class="tab-content pl-3 " id="nav-tabContent">

                                                    <div class="tab-pane fade in show active" id="overview" role="tabpanel"
                                                        aria-labelledby="nav-home-tab">
                                                        <div class="about-history">
                                                            <div class="about-title">
                                                                <i class="fas fa-list-alt"></i>
                                                                <a style="text-decoration: none"
                                                                    href="javascript:void(0);">{{ $user_profile->categoryName->name ?? '' }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="about-history pt-1">
                                                            <div class="about-title">
                                                                <i class="fas fa-user"></i>
                                                                <a style="text-decoration: none"
                                                                    href="javascript:void(0);">{{ $user_profile->first_name }}
                                                                    {{ $user_profile->last_name }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="about-history pt-1">
                                                            <div class="about-title">
                                                                <i class="fas fa-envelope"></i>
                                                                <a style="text-decoration: none"
                                                                    href="javascript:void(0);">{{ $user_profile->email }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="about-history pt-1">
                                                            <div class="about-title">
                                                                <i class="fas fa-phone"></i>
                                                                <a style="text-decoration: none"
                                                                    href="javascript:void(0);">{{ $user_profile->phone }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="about-history pt-1">
                                                            <div class="about-title">
                                                                <i class="fas fa-address-book"></i>
                                                                <a style="text-decoration: none"
                                                                    href="javascript:void(0);">{{ $user_profile->address }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="about-history pt-1">
                                                            <div class="about-title">
                                                                <i class="fas fa-users"></i>
                                                                <a style="text-decoration: none"
                                                                    href="javascript:void(0);">{{ $user_profile->profession }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="about-history pt-1">
                                                            <div class="about-title">
                                                                <i class="fas fa-transgender"></i>
                                                                <a style="text-decoration: none" href="javascript:void(0);">
                                                                    @if ($user_profile->gender == 1)
                                                                        Male
                                                                    @elseif ($user_profile->gender == 2)
                                                                        Female
                                                                    @else
                                                                        Others
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="about-history pt-1">
                                                            <div class="about-title">
                                                                <i class="fas fa-globe"></i>
                                                                <a style="text-decoration: none" href="javascript:void(0);">
                                                                    {{ $user_profile->upazilaName->name }},
                                                                    {{ $user_profile->upazilaName->districtName->name }},
                                                                    {{ $user_profile->upazilaName->districtName->divisionName->name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end #profile-friends tab -->
                            </div>
                            <!-- end tab-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/user_profile/js/main.js') }}"></script>
@endsection

{{-- @extends('user.master')

@section('title')
    {{ Auth::guard('web')->user()->first_name }}'s Profile
@endsection

@section('content')
    <div class="content-wrapper" style="font-family: Roboto">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark" style="font-family: kalpurush">{{ Auth::guard('web')->user()->first_name }}' Profile</h1>
                        <img src="{{ asset(Auth::guard('web')->user()->image) }}" alt="Image" style="max-height: 80px" class="img-circle">
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
                                <h3 class="card-title" style="font-family: kalpurush">{{ Auth::guard('web')->user()->first_name }}'s Profile</h3>
                            </div>
                            <div class="card-body">
                                <div class="row" id="included_all_description">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->first_name }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile Number </label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->phone }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Profession </label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->profession }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address </label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->address }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->email }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            @if (Auth::guard('web')->user()->status == 1)
                                                <button class="form-control text-left" disabled>Active</button>
                                            @else
                                                <button class="form-control text-left" disabled>Inactive</button>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Division</label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->upazilaName->districtName->divisionName->name ?? '' }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>District</label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->upazilaName->districtName->name ?? '' }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Upazila/Thana</label>
                                            <input type="text" value="{{ Auth::guard('web')->user()->upazilaName->name ?? '' }}" class="form-control" disabled>
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
@endsection --}}
