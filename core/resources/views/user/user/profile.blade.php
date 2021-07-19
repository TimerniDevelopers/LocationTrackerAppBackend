@extends('user.master')

@section('title')
    {{ Auth::guard('web')->user()->first_name }}'s Profile
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
                                            <input type="file">

                                            <img src="assets/img/avatar4.png" alt="">
                                            <!-- <i class="fas fa-camera"></i> -->
                                        </div>
                                    </div>
                                    <h2>David Smith</h2>
                                    <div class="d-none clearfix">
                                        <div class="f-right">
                                            <div class="eidt-dot d-flex align-items-center">

                                                <a href="#" class="mr-10">
                                                    <div class="dot-item">
                                                        <div class="dot1"></div>
                                                        <div class="dot2"></div>
                                                        <div class="dot3"></div>
                                                    </div>
                                                </a>
                                                <a href="#" class="btn btn-follow">
                                                    follow
                                                </a>
                                            </div>
                                        </div>
                                        <div class="f-left">
                                            <h2>David Smith</h2>
                                        </div>


                                    </div>

                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has
                                        been the industry's standard dummy text it to make a type specimen book.</p>
                                    <div class="profile-link">
                                        <a href="#">
                                            GitHub: https://github.com/example
                                        </a><br>
                                        <a href="#">
                                            https://demotech.com/
                                        </a>
                                    </div>
                                    <div class="mt-10 join">
                                        <a href="#"><i class="fas fa-map-marker-alt"></i>
                                            <span>Melbourne, Australia</span>
                                        </a>
                                        <a href="#" class="pl-50"><i class="fas fa-birthday-cake"></i>
                                            <span>Melbourne, Australia</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-xl-2 d-none d-md-block">
                            <div class="f-right">
                                <div class="eidt-dot d-flex align-items-center">
                                    <a href="#" class="mr-10">
                                        <div class="dot-item">
                                            <div class="dot1"></div>
                                            <div class="dot2"></div>
                                            <div class="dot3"></div>
                                        </div>
                                    </a>
                                    <a href="#" class="btn btn-follow">
                                        follow
                                    </a>
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
                                        <input type="file">

                                        <img src="assets/img/avatar4.png" alt="">
                                        <!-- <i class="fas fa-camera"></i> -->
                                    </div>
                                </div>
                                <div class="profile-nav-wrapper">
                                    <div class="profile-header d-flex align-items-center justify-content-between">

                                        <div>
                                            <!-- BEGIN profile-header-tab -->
                                            <div class="d-none d-lg-block">
                                                <ul class="profile-header-tab nav nav-tabs">
                                                    <li class="nav-item "><a href="#profile-post" class="nav-link active"
                                                            data-toggle="tab">POSTS</a>
                                                    </li>
                                                    <li class="nav-item "><a href="#profile-about" class="nav-link"
                                                            data-toggle="tab">ABOUT</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#photos" class="nav-link"
                                                            data-toggle="tab">PHOTOS</a></li>

                                                    <li class="nav-item"><a href="#profile-friends" class="nav-link"
                                                            data-toggle="tab">FRIENDS</a></li>
                                                    <!-- <li class="nav-item">
                                                        <a href="#videos" class="nav-link" data-toggle="tab">
                                                        MORE
                                                            <i class="fas fa-caret-down ml-1"></i></a>
                                                        </li> -->
                                                        <li class="nav-item dropdown"><a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown"
                                                                role="button"
                                                                aria-haspopup="true" aria-expanded="false">MORE<span class="caret"></span></a>
                                                            <ul class="dropdown-menu  more-item">
                                                                <li><a href="#">About</a></li>
                                                                <li><a href="#">Friends</a></li>
                                                            </ul>
                                                        </li>

                                                </ul>
                                            </div>
                                            <div class="d-block d-lg-none">
                                                <ul class="profile-header-tab nav nav-tabs ">
                                                    <li class="nav-item "><a href="#profile-post" class="nav-link active" data-toggle="tab">POSTS</a>
                                                    </li>
                                                    <li class="nav-item dropdown"><a href="#" class="dropdown-toggle nav-link " data-toggle="dropdown"
                                                            role="button" aria-haspopup="true" aria-expanded="false">MORE<span class="caret"></span></a>
                                                        <ul class="dropdown-menu  more-item">
                                                            <li><a href="#">About</a></li>
                                                            <li><a href="#">Friends</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>

                                            </div>

                                            <!-- END profile-header-tab -->
                                        </div>
                                        <div>
                                            <div class="f-right">
                                                <div class="eidt-dot d-flex align-items-center k">

                                                    <a href="#" class="btn grey-btn  ml-2">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit Profile
                                                    </a>
                                                    <a href="#">
                                                        <div class="dot-item">
                                                            <div class="dot1"></div>
                                                            <div class="dot2"></div>
                                                            <div class="dot3"></div>
                                                        </div>
                                                    </a>

                                                </div>

                                            </div>
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
                                <div class="tab-pane fade in active show" id="profile-post">
                                    <!-- begin row -->
                                    <div class="row mb-3">
                                        <!-- begin col-6 -->
                                        <div class="col-md-5">
                                            <div class="title-wrapper box_shadow pt-y-10">
                                                <div class="title">
                                                    <h3>Intro</h3>
                                                </div>

                                                <div class="about-title">
                                                    <i class="fas fa-graduation-cap"></i>
                                                    <a href="#">Work at <b>Time research &amp; innovation</b> </a>
                                                </div>
                                                <div class="about-title">
                                                    <i class="fas fa-briefcase"></i>
                                                    <a href="#">Work at <b>Time research &amp; innovation</b> </a>
                                                </div>
                                                <div class="about-title">
                                                    <i class="fas fa-wifi"></i>
                                                    <a href="#">Work at <b>Time research &amp; innovation</b> </a>
                                                </div>
                                                <div class="">
                                                    <a href="#" class="btn grey-btn d-block">Edit Details</a>
                                                </div>
                                            </div>
                                            <div class="title-wrapper box_shadow pt-y-10">
                                                <div class="title d-flex justify-content-between">
                                                    <h3>Skills</h3>
                                                    <a href="#">
                                                        <div class="dot-item">
                                                            <div class="dot1"></div>
                                                            <div class="dot2"></div>
                                                            <div class="dot3"></div>
                                                        </div>
                                                    </a>

                                                </div>

                                                <div class="about-title">
                                                    <ul class="btn-wrapper">
                                                        <li class="btn-item">
                                                            <a href="#" class="btn btn-default">Html</a>
                                                        </li>
                                                        <li class="btn-item">
                                                            <a href="#" class="btn btn-default">Html</a>
                                                        </li>
                                                        <li class="btn-item">
                                                            <a href="#" class="btn btn-default">Html</a>
                                                        </li>
                                                        <li class="btn-item pb-0">
                                                            <a href="#" class="btn btn-default">CSS</a>
                                                        </li>
                                                        <li class="btn-item pb-0">
                                                            <a href="#" class="btn btn-default">Javascript</a>
                                                        </li>

                                                    </ul>
                                                </div>


                                            </div>
                                            <div class="title-wrapper box_shadow pt-y-10">
                                                <div class="title d-flex justify-content-between">
                                                    <h3>Language</h3>
                                                    <a href="#">
                                                        <div class="dot-item">
                                                            <div class="dot1"></div>
                                                            <div class="dot2"></div>
                                                            <div class="dot3"></div>
                                                        </div>
                                                    </a>

                                                </div>

                                                <div class="about-title">
                                                    <h6>Language: <b>English</b> </h6>
                                                    <h6>Language: <b> Bangla</b></h6>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="col-md-7  mb-3">
                                            <div class="post-grid-wrapper">
                                                <div class="title-wrapper box_shadow pt-y-10 pb-0">
                                                    <div class="title">
                                                        <h3>Post</h3>
                                                    </div>
                                                    <ul class="profile-header-tab nav nav-tabs">
                                                        <li class="nav-item"><a href="#list-view" class="nav-link active"
                                                                data-toggle="tab"><i class="fas fa-bars"></i> List-view</a>
                                                        </li>
                                                        <li class="nav-item"><a href="#gird-view" class="nav-link"
                                                                data-toggle="tab"><i class="fas fa-th-large"></i>
                                                                Gird-view</a>
                                                        </li>
                                                    </ul>



                                                </div>
                                                <div class="tab-content p-0">
                                                    <div class="tab-pane active" id="list-view">
                                                        <div class="post-list list-post">
                                                            <div class="pt-y-10 bg-white">
                                                                <div class="media media-xs overflow-visible">
                                                                    <a class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </a>
                                                                    <div class="media-body valign-middle">
                                                                        <div>
                                                                            <div class="d-flex">
                                                                                <div>
                                                                                    <b class="text-inverse">
                                                                                        <span>Radowan Bhuiyan </span>

                                                                                        <i
                                                                                            class="fas fa-caret-right pl-1"></i>
                                                                                        <span>Lorem ipsum dolor sit, amet
                                                                                            consectetur
                                                                                            adipisicing elit.</span>
                                                                                    </b>

                                                                                </div>


                                                                                <div>
                                                                                    <a href="#">
                                                                                        <div class="dot-item">
                                                                                            <div class="dot1"></div>
                                                                                            <div class="dot2"></div>
                                                                                            <div class="dot3"></div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>


                                                                            </div>
                                                                            <div class="post-position">
                                                                                <a href="#">1 hour</a>
                                                                                <button type="button" data-toggle="tooltip"
                                                                                    data-placement="top" title=""
                                                                                    data-original-title="public">
                                                                                    <i class="fas fa-globe-asia"></i>
                                                                                </button>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                    <div>

                                                                    </div>

                                                                </div>
                                                                <div class="post-details">
                                                                    <div class="post-heading">
                                                                        <p>Lorem ipsum dolor sit amet consectetur
                                                                            adipisicing elit.
                                                                            Officiis, fuga!</p>
                                                                    </div>
                                                                    <div class="poster-img">
                                                                        <img src="assets/img/avatar6.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <div>

                                                                    <div class="post-wrapper pt-15 ">
                                                                        <div class="post-left">
                                                                            <div class="agree">

                                                                                <div>
                                                                                    <a href="#">
                                                                                        <img src="assets/img/like.png"
                                                                                            alt="">

                                                                                    </a>
                                                                                </div>


                                                                                <p class="overly">
                                                                                    <a href="#"><i
                                                                                            class="fas fa-thumbs-up"></i></a>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-thumbs-up"></i></a>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-thumbs-up"></i></a>
                                                                                </p>


                                                                            </div>
                                                                            <div class="agree">
                                                                                <div>
                                                                                    <a href="#">
                                                                                        <img src="assets/img/unlike.png"
                                                                                            alt="">

                                                                                    </a>
                                                                                </div>



                                                                                <p class="overly">
                                                                                    <a href="#"><i
                                                                                            class="fas fa-thumbs-up"></i></a>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-thumbs-up"></i></a>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-thumbs-up"></i></a>
                                                                                    <a href="#"><i
                                                                                            class="fas fa-thumbs-up"></i></a>
                                                                                </p>


                                                                            </div>

                                                                            <p>
                                                                                <a href="">
                                                                                    <i class="far fa-star"></i>
                                                                                    <i class="far fa-star"></i>
                                                                                    <i class="far fa-star"></i>
                                                                                    <i class="far fa-star"></i>
                                                                                    <i class="far fa-star"></i>
                                                                                </a>
                                                                            </p>
                                                                        </div>
                                                                        <div class="post-right">
                                                                            <div class="agree">
                                                                                <a href="#">

                                                                                    <img src="assets/img/ask.png" alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="agree">
                                                                                <a href="#">

                                                                                    <img src="assets/img/discussion.png"
                                                                                        alt="">
                                                                                </a>
                                                                            </div>
                                                                            <div class="agree">
                                                                                <a href="#">

                                                                                    <img src="assets/img/share.png" alt="">
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="tab-pane" id="gird-view">
                                                        <div class="post-list grid-post pt-y-10 bg-white">

                                                            <div class="grid-wrapper">

                                                                <div class="post-details">
                                                                    <div class="poster-img">
                                                                        <img src="assets/img/avatar6.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="media media-xs overflow-visible">
                                                                    <a class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </a>
                                                                    <div class="media-body valign-middle">
                                                                        <div>
                                                                            <div class="d-flex">
                                                                                <div>
                                                                                    <p class="text-inverse">
                                                                                        <span>Radowan Bhuiyan </span>

                                                                                        <i
                                                                                            class="fas fa-caret-right pl-1"></i>
                                                                                        <span>Lorem ipsum dolor sit, amet
                                                                                            consec......</span>
                                                                                    </p>

                                                                                </div>

                                                                            </div>
                                                                            <div class="post-position">
                                                                                <a href="#">1 hour</a>
                                                                                <button type="button" data-toggle="tooltip"
                                                                                    data-placement="top" title=""
                                                                                    data-original-title="public">
                                                                                    <i class="fas fa-globe-asia"></i>
                                                                                </button>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                    <div>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="grid-wrapper">

                                                                <div class="post-details">
                                                                    <div class="poster-img">
                                                                        <img src="assets/img/avatar6.png" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="media media-xs overflow-visible">
                                                                    <a class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </a>
                                                                    <div class="media-body valign-middle">
                                                                        <div>
                                                                            <div class="d-flex">
                                                                                <div>
                                                                                    <p class="text-inverse">
                                                                                        <span>Radowan Bhuiyan </span>

                                                                                        <i
                                                                                            class="fas fa-caret-right pl-1"></i>
                                                                                        <span>Lorem ipsum dolor sit,
                                                                                            amet....</span>
                                                                                    </p>

                                                                                </div>

                                                                            </div>
                                                                            <div class="post-position">
                                                                                <a href="#">1 hour</a>
                                                                                <button type="button" data-toggle="tooltip"
                                                                                    data-placement="top" title=""
                                                                                    data-original-title="public">
                                                                                    <i class="fas fa-globe-asia"></i>
                                                                                </button>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                    <div>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end col-6 -->

                                    </div>
                                    <!-- end row -->

                                </div>
                                <!-- end #profile-friends tab -->
                                <!-- begin #profile-friends tab -->
                                <div class="tab-pane fade in " id="profile-about">
                                    <div class="border-relative bg-white p-b-r">
                                        <h4 class="py-2">About</h4>
                                        <div class="row row-space-2 mb-3 ">

                                            <!-- begin col-6 -->
                                            <div class="col-md-4">

                                                <div class="about-left">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active"><a href="#overview" class=" "
                                                                data-toggle="tab">Overview</a>
                                                        </li>
                                                        <li><a href="#works" data-toggle="tab">Works &amp; Education</a>
                                                        </li>
                                                        <li><a href="#contact" data-toggle="tab">Contact</a>
                                                        </li>
                                                        <li><a href="#family" data-toggle="tab">family &amp; Relation</a>
                                                        </li>

                                                        <li><a href="#family" data-toggle="tab">Cv &amp; Resume</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-8 border-md-top border-left">
                                                <div class="tab-content pl-3 " id="nav-tabContent">

                                                    <div class="tab-pane fade in show active" id="overview" role="tabpanel"
                                                        aria-labelledby="nav-home-tab">
                                                        <div class="about-history">
                                                            <div class="about-title">
                                                                <i class="fas fa-briefcase"></i>
                                                                <a href="#">Time research &amp; innovation</a>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">
                                                                <i class="fas fa-graduation-cap"></i>
                                                                <a href="#">Time research &amp; innovation</a>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">
                                                                <i class="fas fa-graduation-cap"></i>
                                                                <a href="#">Time research &amp; innovation</a>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">
                                                                <i class="fas fa-graduation-cap"></i>
                                                                <a href="#">Time research &amp; innovation</a>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">
                                                                <i class="fas fa-graduation-cap"></i>
                                                                <a href="#">Time research &amp; innovation</a>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="works" role="tabpanel"
                                                        aria-labelledby="nav-home-tab">

                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                                        aria-labelledby="nav-home-tab">

                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="tab-pane fade" id="family" role="tabpanel"
                                                        aria-labelledby="nav-home-tab">

                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>
                                                        <div class="about-history">
                                                            <div class="about-title">

                                                                <div class="media media-xs overflow-visible">
                                                                    <div class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt=""
                                                                            class="media-object img-circle">
                                                                    </div>
                                                                    <div class="media-body valign-middle">
                                                                        <p class="text-inverse">Radowan Bhuiyan</p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="about-edit">

                                                                <button type="button" data-toggle="tooltip"
                                                                    data-placement="top" title=""
                                                                    data-original-title="public">
                                                                    <i class="fas fa-globe-asia"></i>
                                                                </button>

                                                                <a href="#">
                                                                    <div class="dot-item">
                                                                        <div class="dot1"></div>
                                                                        <div class="dot2"></div>
                                                                        <div class="dot3"></div>

                                                                    </div>
                                                                </a>


                                                            </div>

                                                        </div>

                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <!-- end #profile-friends tab -->
                                <!-- begin #profile-friends tab -->
                                <div class="tab-pane fade in " id="photos">
                                    <div class="row row-space-2 mb-3">
                                        <!-- begin col-6 -->
                                        <div class="col-md-12 m-b-2">
                                            <h4>photos</h4>
                                        </div>
                                    </div>

                                    <!-- begin row -->
                                    <div class="row row-space-2 mb-3">
                                        <!-- begin col-6 -->
                                        <div class="col-md-12  m-b-2">
                                            <div class="post">
                                                <div class="pt-y-10 bg-white">
                                                    <div class="photos-area">
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a href="#">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->

                                    </div>
                                    <!-- end row -->

                                </div>
                                <!-- end #profile-friends tab -->
                                <!-- begin #profile-friends tab -->
                                <div class="tab-pane fade in " id="videos">
                                    <div class="row row-space-2 mb-3">
                                        <!-- begin col-6 -->
                                        <div class="col-md-12 m-b-2">
                                            <h4>Videos</h4>
                                        </div>
                                    </div>

                                    <!-- begin row -->
                                    <div class="row row-space-2 mb-3">
                                        <!-- begin col-6 -->
                                        <div class="col-md-12  m-b-2">
                                            <div class="post">
                                                <div class="pt-y-10 bg-white">
                                                    <div class="photos-area">
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <a class="videos-icon"
                                                                href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-6 -->

                                    </div>
                                    <!-- end row -->

                                </div>
                                <!-- end #profile-friends tab -->
                                <!-- begin #profile-friends tab -->
                                <div class="tab-pane fade in" id="profile-friends">
                                    <h4 class="mb-3">Friend List (14)</h4>
                                    <!-- begin row -->
                                    <div class="row row-space-2 mb-4">
                                        <div class="col-md-12">
                                            <div class="friends-wrapper box_shadow pt-y-10">
                                                <div class="title-wrapper ">
                                                    <div class="title">
                                                        <div class="d-flex-item-f">
                                                            <div class="btn-group dropdown sort-by">
                                                                <p>Sort by: </p>
                                                                <a href="#" data-toggle="dropdown" class="btn-default dropdown-toggle"
                                                                    aria-expanded="true">Recently
                                                                    Added</a>
                                                                <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end">
                                                                    <li><a href="#">Action 1</a></li>
                                                                    <li><a href="#">Action 2</a></li>
                                                                    <li><a href="#">Action 3</a></li>
                                                                    <li class="divider"></li>
                                                                    <li><a href="#">Action 4</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="search-filter">
                                                                <form action="">
                                                                    <div class="form-group has-search">
                                                                        <i class="fa fa-search"></i>
                                                                        <input type="text" class="form-control" placeholder="Search">
                                                                    </div>
                                                                    <div>
                                                                        <a href="#">Search With Filter</a>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="media media-xs overflow-visible">

                                                            <div class="media-body valign-middle ">
                                                                <div class="d-flex align-items-center">
                                                                    <a class="media-left" href="#">
                                                                        <img src="assets/img/avatar4.png" alt="" class="media-object img-circle">
                                                                    </a>
                                                                    <div>
                                                                        <p>Lorem ipsum dolor sit amet.</p>
                                                                        <p><b class="text-inverse">Radowan Bhuiyan</b></p>
                                                                        <p>Lorem ipsum dolor sit amet. sdc</p>
                                                                    </div>

                                                                </div>




                                                            </div>
                                                            <div class="media-body valign-middle">
                                                                <div class="messages">
                                                                    <a href="#" class="btn btn-transparent">
                                                                        Messages
                                                                    </a>
                                                                    <a href="#">
                                                                        <div class="dot-item">
                                                                            <div class="dot1"></div>
                                                                            <div class="dot2"></div>
                                                                            <div class="dot3"></div>
                                                                        </div>
                                                                    </a>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>

                                            </div>
                                        </div>



                                    </div>
                                    <!-- end row -->
                                    <div class="row row-space-2">
                                        <div class="col-md-12">
                                            <div class="friends-follow box_shadow pt-y-10">
                                                <div class="d-flex justify-content-between mb-20">
                                                    <p>People who are in Bangladesh also follow these pages</p>
                                                    <a href="#"">See all</a>
                                                </div>

                                                <div class="follow-grid">
                                                    <div class="friends-follow-wrapper">
                                                        <div class="top-img">
                                                            <img src="assets/img/banner.jpg" alt="">
                                                        </div>
                                                        <div class="follow-content">
                                                            <div class="middle-img">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                            </div>
                                                            <div class="follow-s">
                                                                <p><b>Jobs</b></p>
                                                                <p>Radowan</p>
                                                                <p><span>120 follower</span></p>
                                                            </div>
                                                            <a href="#" class="btn btn-transparent">follow</a>
                                                        </div>


                                                    </div>
                                                    <div class="friends-follow-wrapper">
                                                        <div class="top-img">
                                                            <img src="assets/img/banner.jpg" alt="">
                                                        </div>
                                                        <div class="follow-content">
                                                            <div class="middle-img">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                            </div>
                                                            <div class="follow-s">
                                                                <p><b>Jobs</b></p>

                                                                <p><span>120 follower</span></p>
                                                            </div>
                                                            <a href="#" class="btn btn-transparent">follow</a>
                                                        </div>


                                                    </div>
                                                    <div class="friends-follow-wrapper">
                                                        <div class="top-img">
                                                            <img src="assets/img/banner.jpg" alt="">
                                                        </div>
                                                        <div class="follow-content">
                                                            <div class="middle-img">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                            </div>
                                                            <div class="follow-s">
                                                                <p><b>Jobs</b></p>
                                                                <p>Radowan</p>
                                                                <p><span>120 follower</span></p>
                                                            </div>
                                                            <a href="#" class="btn btn-transparent">follow</a>
                                                        </div>


                                                    </div>
                                                    <div class="friends-follow-wrapper">
                                                        <div class="top-img">
                                                            <img src="assets/img/banner.jpg" alt="">
                                                        </div>
                                                        <div class="follow-content">
                                                            <div class="middle-img">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                            </div>
                                                            <div class="follow-s">
                                                                <p><b>Jobs</b></p>

                                                                <p><span>120 follower</span></p>
                                                            </div>
                                                            <a href="#" class="btn btn-transparent">follow</a>
                                                        </div>


                                                    </div>
                                                    <div class="friends-follow-wrapper">
                                                        <div class="top-img">
                                                            <img src="assets/img/banner.jpg" alt="">
                                                        </div>
                                                        <div class="follow-content">
                                                            <div class="middle-img">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                            </div>
                                                            <div class="follow-s">
                                                                <p><b>Jobs</b></p>
                                                                <p>Radowan</p>
                                                                <p><span>120 follower</span></p>
                                                            </div>
                                                            <a href="#" class="btn btn-transparent">follow</a>
                                                        </div>


                                                    </div>
                                                    <div class="friends-follow-wrapper">
                                                        <div class="top-img">
                                                            <img src="assets/img/banner.jpg" alt="">
                                                        </div>
                                                        <div class="follow-content">
                                                            <div class="middle-img">
                                                                <img src="assets/img/avatar4.png" alt="">
                                                            </div>
                                                            <div class="follow-s">
                                                                <p><b>Jobs</b></p>

                                                                <p><span>120 follower</span></p>
                                                            </div>
                                                            <a href="#" class="btn btn-transparent">follow</a>
                                                        </div>


                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
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
                                            @if(Auth::guard('web')->user()->status == 1)
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
