@extends('backend.master')

@section('title')
    Admin Dashboard
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
               @include('backend.partials.slider')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="top-recharge mb-3">
                            <div class="d-flex-small">
                                <div class="bord_icon">
                                    <a class="d-flex align-items-center" href="#">
                                        <img src="https://timerni.com/backend/new_theme/assets/img/service/menu/home.png" alt="">
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
                        </div>

                        <div class="sub-heading mb-4">
                            <h2 class="common-color content-padding-b" data-aos="zoom-in">
                                <p class="font-weight-bold font-size-40" style="margin: 0"> CoviTel </p>
                                <p style="font-size: 30px;margin: 0"> Telemedicine Service Covid-19 Support. </p>
                                <p class="common-color" style="font-size: 30px;margin: 0" data-aos="zoom-in">
                                    24/7 Helpline: <a href="tel:01860439636">01860439636</a> , <a href="tel:01683153475">01683153475</a> , <a href="tel:01742880304">01742880304</a>
                                </p>
                            </h2>
                        </div>

                        @if(Auth::guard('admin')->user()->user_role == 10)
                            <div class="piechartResponsive" id="piechart2" ></div>
                            @include('backend.questionAnswer.admin-analytics')
                        @endif
                        @if(Auth::guard('admin')->user()->user_role == 1)
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="piechartResponsive mb-3" id="piechart2" style="99%"></div>
                                    @include('backend.questionAnswer.admin-analytics')
                                </div>
                                {{-- <div class="col-sm-12 col-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="piechartResponsive mb-3" id="piechart3" style="99%"></div>
                                    @include('backend.questionAnswer.admin-analytics')
                                </div> --}}
                            </div>
                        @endif
                        @if(Auth::guard('admin')->user()->user_role == 2)
                            <div class="piechartResponsive" id="piechart" ></div>
                            @include('backend.questionAnswer.manager-analytics')
                        @endif

                        <div class="container pt-5">
                            <div class="sub-heading">
                                <h2 class="common-color content-padding-b" data-aos="zoom-in">
                                    <p class="font-weight-bold" style="font-size: 30px;margin: 0"> A pilot study to treat and understand covid patients through telemedicine. </p>
                                    <p style="font-size: 30px;margin: 0"> Supported By </p>

                                </h2>
                            </div>
                            <div class="row justify-content-center pt-5">
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <a href="http://www.dsf-org.com/" target="_blank">
                                            <img class="h-50" src="{{ asset('assets/frontend/img/dsf.png') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="h-50" src="{{ asset('assets/frontend/img/imgpsh_fullsize_anim__10_-removebg-preview.png') }}" alt="">
                                    </div>
                                    <div class="col-md-4">
                                        <img class="h-50" src="{{ asset('assets/frontend/img/care and shine logo.png') }}" alt="">
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <a href="https://timeaid.org/" target="_blank">
                                            <img class="h-50" src="{{ asset('assets/frontend/img/Asset 6@4x.png') }}" alt="">
                                        </a>

                                    </div>
                                    <div class="col-md-4">
                                        <a href="https://timerni.com/" target="_blank">
                                            <img class="" src="{{ asset('assets/frontend/img/Asset 3@4x.png') }}" alt="">
                                        </a>

                                    </div>
                                    <div class="col-md-2"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <style>
        .piechartResponsive{
            height: 500px;
            /* width: 900px; */
            width: 100%;
        }
        @media screen and (max-width: 767px) {
            .piechartResponsive {
                    width: 300px;
                    height: 300px;
                }
            }
    </style>
@endsection


