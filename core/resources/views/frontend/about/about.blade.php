@extends('frontend.master')

@section('title')
About | Dcotrack
@endsection

@section('content')
<section class="about-area content-padding-t mt-5" id="about">
    <div class="container">
        <div class="section-heading text-center" data-aos="zoom-in">
            <h1 class="common-color">About 'Dcotrack'</h1>
            <p>
                Our priority is to make data collection digital in low and middle-income countries around the world. Therefore, the purpose of the "Dcotrack" is to make data collection and visualisation simple for the researcher and business owner. A single place to track data collectors
                and manage collected data. With this app, anyone from any discipline can work on multiple projects at the same time. Get a specific insight into your collected data while collecting them on the go. Furthermore,
                collect and manage your audiovisual and numeric data at the same place. </p>
        </div>
        <div class="content-padding-t">
            <div class="about-system">
                <div class="about-wrapper">
                    <div class="system-content">
                        <a href="javascript:void(0);">
                            <p>1. Register</p>
                        </a>
                    </div>
                    <div class="arrow-img">
                        <img src="{{ asset('assets/frontend/img/arrow.png') }}" alt="arrow-png">
                    </div>
                </div>
                <div class="about-wrapper">
                    <div class="system-content">
                        <a href="javascript:void(0);">
                            <p>2. User Management</p>
                        </a>
                    </div>
                    <div class="arrow-img">
                        <img src="{{ asset('assets/frontend/img/arrow.png') }}" alt="arrow-png">
                    </div>
                </div>
                <div class="about-wrapper">
                    <div class="system-content">
                        <a href="javascript:void(0);">
                            <p>3. Set Questionaries </p>
                        </a>
                    </div>
                    <div class="arrow-img">
                        <img src="{{ asset('assets/frontend/img/arrow.png') }}" alt="arrow-png">
                    </div>
                </div>
                <div class="about-wrapper">
                    <div class="system-content">
                        <a href="javascript:void(0);">
                            <p>4. Get answers with location</p>
                        </a>
                    </div>
                    <div class="arrow-img">
                        <img src="{{ asset('assets/frontend/img/arrow.png') }}" alt="arrow-png">
                    </div>
                </div>

                <div class="about-wrapper">
                    <div class="system-content">
                        <a href="javascript:void(0);">
                            <p>5. Analyze your Data</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== Covid  Start ======-->
<section class="covid-area content-padding-t" id="covid">
    <div class="container">
        <div class="sub-heading content-padding-b" data-aos="zoom-in">
            <h2 class="common-color font-size-40">Analyze Your <span class="red-color">Business Or Research</span> Data !!!</h2>
            <p>

            </p>
        </div>
        <div class="row">
            <div class="col-md-6 text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="active-cases cases-wrapper">
                    <div class="cases-heading">
                        <h3>Business Analysis</h3>
                    </div>
                    <div class="cases">
                        <div class="cases-m-content">
                            <h3> Product & Service</h3>
                            <p> </p>
                        </div>
                        <div class="cases-f-content">
                            <div>
                                <h3> Sales</h3>
                                <p> <img src="{{ asset('assets/frontend/img/piechart3.png') }}" height="100px" width="100px" alt="recod" loading="lazy"> </p>
                            </div>
                            <div>
                                <h3> User</h3>
                                <p> <img src="{{ asset('assets/frontend/img/piechart5.png') }}" height="100px" width="100px" alt="recod" loading="lazy"></p>
                            </div>

                        </div>
                    </div>

                </div>



            </div>
            <div class="col-md-6 text-center" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                <div class="closed-cases cases-wrapper">
                    <div class="cases-heading">
                        <h3>Research</h3>
                    </div>
                    <div class="cases">
                        <div class="cases-m-content">
                            <h3> Survey</h3>
                            <p> </p>
                        </div>
                        <div class="cases-f-content">
                            <div>
                                <h3> Market</h3>
                                <p> <img src="{{ asset('assets/frontend/img/piechart1.png') }}" height="100px" width="100px" alt="recod" loading="lazy"> </p>
                            </div>
                            <div>
                                <h3> Business</h3>
                                <p> <img src="{{ asset('assets/frontend/img/piechart6.png') }}" height="100px" width="100px" alt="recod" loading="lazy"></p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Covid End ======-->



<!--====== Vaccin Details Start ======-->
<section class="vaccin-area content-padding-t mb-5" id="Vaccin">
    <div class="container">
        <div class="sub-heading">
            <h2 class="common-color content-padding-b font-size-40" data-aos="fade-up">Record Multidisciplinary Data</h2>
        </div>
        <br>
        <div class="row pt-5">
            <div class="col-md-6 d-flex align-items-center sm-margin-b" data-aos="fade-right" data-aos-delay="100">
                <div class="before-srarting-img">
                    <ul>
                        <li>
                            Starting from data collections
                            <ul class="before-srarting-subheading">
                                <li>
                                    <i class="fas fa-clock common-color pr-2"></i>
                                    To data visualisation and analysis
                                </li>
                            </ul>
                        </li>
                        <li>

                            Reports like customer acquisition, sales, market analysis etc
                        </li>
                        <li>

                            Survey data collection
                        </li>
                        <li>

                            Manage user with location tracking
                        </li>
                        <li>

                            Improve your business or research
                        </li>
                    </ul>

                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="rcord-img">
                    <img src="{{ asset('assets/frontend/img/Record audiovisual.png') }}" alt="recod" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Vaccin Details End ======-->
@endsection
