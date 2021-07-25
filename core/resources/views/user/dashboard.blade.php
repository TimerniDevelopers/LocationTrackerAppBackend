@extends('user.master')

@section('title')
    {{ Auth::guard('web')->user()->first_name }}'s Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/user_profile/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/user_profile/css/user_manual.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                @include('user.partials.slider')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 ">
                        {{-- <div class="top-recharge mb-3">
                            <div class="d-flex-small">
                                <div class="bord_icon">
                                    <a class="d-flex align-items-center" href="#">
                                        <img src="https://timerni.com/backend/new_theme/assets/img/service/menu/home.png"
                                            alt="">
                                        <span class="mt-2 ml-3">Home</span>
                                    </a>
                                </div>
                                <div class="bord_icon">
                                    <a class="d-flex align-items-center" href="#">
                                        <img src="https://timerni.com/backend/new_theme/assets/img/dashboard.png" alt="">
                                        <span class="mt-2 ml-3">Dashboard</span>
                                    </a>
                                </div>
                                <div class="text-right country-none">

                                </div>
                            </div>
                        </div> --}}

                        {{-- <iframe width="100%" height="430px" src="https://www.youtube.com/embed/nsJD62lIzC8" title="YouTube video player"
                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe> --}}

                        {{-- @if (Auth::guard('admin')->user()->user_role == 10)
                            <div class="piechartResponsive" id="piechart2" ></div>
                            @include('backend.questionAnswer.admin-analytics')
                        @endif
                        @if (Auth::guard('admin')->user()->user_role == 1)
                            <div class="piechartResponsive" id="piechart2" ></div>
                            @include('backend.questionAnswer.admin-analytics')
                        @endif
                        @if (Auth::guard('admin')->user()->user_role == 2)
                            <div class="piechartResponsive" id="piechart" ></div>
                            @include('backend.questionAnswer.manager-analytics')
                        @endif --}}
                    </div>
                </div>
        </section>
        <!-- /.content -->

        <div class="container mb-5">
            <div class="row">
                <div class="col-md-8 col-lg-8 mb-2 chart-area content-padding-t" id="Chart_Area">
                    <div class="chart-content">
                        <div class="text-center">
                            <h3>Daily new cases</h3>
                        </div>
                        <div class="selector">
                            <div class="calender">
                                <span class="calender_date">Last 7 days</span>
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>

                            <div class="graph_bar">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label lebel_one" for="customCheck1">Bar
                                        Graph</label>
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Line Graph</label>
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="chart">
                        <ul id="numbers">
                            <li><span>100%</span></li>
                            <li><span>90%</span></li>
                            <li><span>80%</span></li>
                            <li><span>70%</span></li>
                            <li><span>60%</span></li>
                            <li><span>50%</span></li>
                            <li><span>40%</span></li>
                            <li><span>30%</span></li>
                            <li><span>20%</span></li>
                            <li><span>10%</span></li>
                            <li><span>0%</span></li>
                        </ul>

                        <ul id="bars">
                            <li>
                                <div data-percentage="56" class="bar" style="height: 56%;"></div><span>21th
                                    April</span>
                            </li>
                            <li>
                                <div data-percentage="33" class="bar" style="height: 33%;"></div><span>21th
                                    April</span>
                            </li>
                            <li>
                                <div data-percentage="54" class="bar" style="height: 54%;"></div><span>21th
                                    April</span>
                            </li>
                            <li>
                                <div data-percentage="94" class="bar" style="height: 94%;"></div><span>21th
                                    April</span>
                            </li>
                            <li>
                                <div data-percentage="44" class="bar" style="height: 44%;"></div><span>21th
                                    April</span>
                            </li>
                            <li>
                                <div data-percentage="23" class="bar" style="height: 23%;"></div><span>21th
                                    April</span>
                            </li>
                            <li>
                                <div data-percentage="10" class="bar" style="height: 10%;"></div><span>21th
                                    April</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="pt-3 text-center mb-3">User Manual</h1>
                        <div class="accordion " id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#p__detail" aria-expanded="true" aria-controls="p__detail">
                                            How to open dcotrack app
                                        </button>
                                    </h2>
                                </div>

                                <div id="p__detail" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="pop_up_item">
                                            <a class="videos-icon" href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                <p class="d-flex"><i class="fas fa-play"></i>
                                                    <span>What You'll Get in This App</span>
                                                </p>
                                            </a>
                                            <a class="videos-icon" href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                <p class="d-flex"><i class="fas fa-play"></i>
                                                    <span>What You'll Get in This App</span>
                                                </p>
                                            </a>
                                            <a class="videos-icon" href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                <p class="d-flex"><i class="fas fa-play"></i>
                                                    <span>What You'll Get in This App</span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                            data-target="#size__and__fit" aria-expanded="false"
                                            aria-controls="size__and__fit">
                                            How do I register?
                                        </button>
                                    </h2>
                                </div>
                                <div id="size__and__fit" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="pop_up_item">
                                            <a class="videos-icon" href="https://www.youtube.com/watch?v=y0uT4izH8F0">
                                                <p class="d-flex"><i class="fas fa-play"></i>
                                                    <span>What You'll Get in This App</span>
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <style>
                .services-carousel1.owl-carousel .owl-nav button.owl-next,
                .services-carousel1.owl-carousel .owl-nav button.owl-prev,
                .services-carousel1.owl-carousel button.owl-dot {
                    position: absolute;
                    top: 30%;
                }

            </style>
        </div>
    @endsection
