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


