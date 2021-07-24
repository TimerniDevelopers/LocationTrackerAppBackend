@extends('frontend.master')

@section('title')
    Home | Dcotrack
@endsection

@section('content')
    <div id="home">
        <section class="hero-area ptr-15" id="hero-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <div class="hero-carousel owl-carousel owl-theme">
                            <div class="hero-grid">
                                <div class="hero-content wow animate__fadeInDownBig" data-wow-duration=".8s"
                                    data-wow-delay=".4s">
                                    <div class="section-heading">
                                        <h1 class="common-color" ata-aos="zoom-in">Try Dcotrack <br>
                                            and it is Free !!!!</h1>
                                    </div>
                                    <div>
                                        <p> We encourage people from across the community to try Dcotrack for free up to a
                                            limited user licencing. Furthermore, a special discount will be given to NGOs,
                                            universities, small businesses and students.</p>
                                        <div class="text-sm-center text-xs-center">
                                            <a href="javascript:void(0);" class="custom-btn register-btn">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wow animate__fadeInUp hero-img" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <div>
                                        <img loading="lazy" src="{{ asset('assets/frontend/img/Comp 3.gif') }}" alt="covid">
                                    </div>
                                </div>
                            </div>

                            <div class="hero-grid">
                                <div class="hero-content wow animate__fadeInDownBig" data-wow-duration=".8s"
                                    data-wow-delay=".4s">
                                    <div class="section-heading">
                                        <h1 class="common-color" ata-aos="zoom-in">Collect Qualitative <br>
                                            and Quantitive Data </h1>
                                    </div>
                                    <div>
                                        <p> In this competitive world, Data is everything you need for sustainable
                                            development. We provide a effecient system for data collections to reach the
                                            exact goal </p>
                                        <div class="text-sm-center text-xs-center">
                                            <a href="javascript:void(0);" class="custom-btn register-btn">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wow animate__fadeInUp hero-img" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <div>
                                        <img loading="lazy" src="{{ asset('assets/frontend/img/Statistics (1).gif') }}"
                                            alt="covid">
                                    </div>
                                </div>
                            </div>
                            <div class="hero-grid">
                                <div class="hero-content wow animate__fadeInDownBig" data-wow-duration=".8s"
                                    data-wow-delay=".4s">
                                    <div class="section-heading">
                                        <h1 class="common-color" ata-aos="zoom-in">Locate your <br>
                                            Sales Representative </h1>
                                    </div>
                                    <div>
                                        <p>Business Owner often finds it difficult to track the report of field sales
                                            Representative,"Dcotrack" provides a unique way to solve this problem with live
                                            location Update of sales person </p>
                                        <div class="d-lg-block  d-sm-flex justify-content-sm-center text-sm-center">
                                            <a href="javascript:void(0);" class="custom-btn register-btn">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wow animate__fadeInUp hero-img" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <div>
                                        <img loading="lazy" src="{{ asset('assets/frontend/img/Take Away.gif') }}"
                                            alt="covid">
                                    </div>
                                </div>
                            </div>
                            <div class="hero-grid">
                                <div class="hero-content wow animate__fadeInDownBig" data-wow-duration=".8s"
                                    data-wow-delay=".4s">
                                    <div class="section-heading">
                                        <h1 class="common-color" ata-aos="zoom-in"> Record Audiovisual <br>
                                            Data with dcotrack </h1>
                                    </div>
                                    <div>
                                        <p>We often finds it difficult to record audio and visual data,"Dcotrack" can store
                                            your audio and video data.</p>
                                        <div class="d-lg-block  d-sm-flex justify-content-sm-center text-sm-center">
                                            <a href="javascript:void(0);" class="custom-btn register-btn">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wow animate__fadeInUp hero-img" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <div>
                                        <img loading="lazy" src="{{ asset('assets/frontend/img/Record-audiovisual-1.gif') }}"
                                            alt="covid">
                                    </div>
                                </div>
                            </div>

                            <div class="hero-grid">
                                <div class="hero-content wow animate__fadeInDownBig" data-wow-duration=".8s"
                                    data-wow-delay=".4s">
                                    <div class="section-heading">
                                        <h1 class="common-color" ata-aos="zoom-in">Make Progress <br>
                                            With proper analysis</h1>
                                    </div>
                                    <div>
                                        <p> With the help of our application, business owner and researchers can find the
                                            insight of collected data </p>
                                        <div class="d-lg-block  d-sm-flex justify-content-sm-center text-sm-center">
                                            <a href="javascript:void(0);" class="custom-btn register-btn">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wow animate__fadeInUp hero-img" data-wow-duration="1s" data-wow-delay="1.5s">
                                    <div>
                                        <img loading="lazy" src="{{ asset('assets/frontend/img/Revenue.gif') }}"
                                            alt="covid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Hero End ======-->

        <!-- App section -->
        <section class="qr-code-area content-padding-t" id="QR">
            <div class="container">
                <div class="sub-heading">
                    <h2 class="common-color content-padding-b" data-aos="zoom-in">
                        <p class="font-weight-bold font-size-40">Are You a Researcher or Business Owner!!</p>
                        <p class="common-color content-padding-b font-size-40" data-aos="zoom-in">
                            Track Your Data With Dcotrack App</p>
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center sm-margin-b" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="before-srarting-img">
                                    <ul>
                                        <li>
                                            Set Questions for your research or business
                                        </li>
                                        <li>
                                            Get feedback from customers
                                        </li>
                                        <li>

                                            Track your sales record
                                        </li>
                                        <li>
                                            Get proper visualisation of collected data
                                        </li>
                                        <li>
                                            Analyse your data and make progress
                                        </li>
                                        <li>
                                            Manage your asked questions and answers
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="rcord-img qrcode-img">
                                    <img src="{{ asset('assets/frontend/img/Dectrack illustration.gif') }}"
                                        alt="qrcode" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end app section -->

        <!-- Do Something Foundation section -->
        <section class="qr-code-area content-padding-t" id="collaborator">
            <div class="container">
                <div class="sub-heading">
                    <h2 class="common-color content-padding-b" data-aos="zoom-in">
                        <p class="font-weight-bold font-size-40">Do Something Foundation</p>
                        <p class="common-color content-padding-b" style="font-size: 30px" data-aos="zoom-in">
                            24/7 Helpline: +880 1737-799 100
                        </p>
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-12">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center sm-margin-b" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="before-srarting-img">
                                    <ul>
                                        <li>
                                            Basic health education and training.
                                        </li>
                                        <li>
                                            To achieve universal primary education.
                                        </li>
                                        <li>
                                            Quality sanitation.
                                        </li>
                                        <li>
                                            Clean water and sanitation.
                                        </li>
                                        <li>
                                            Good health and well being.
                                        </li>
                                        <li>
                                            Zero figure of street children
                                        </li>
                                        <li>
                                            Good nutrition to mother and children.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="rcord-img qrcode-img">
                                    <img src="{{ asset('assets/frontend/img/Dectrack illustration.gif') }}"
                                        alt="qrcode" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end app section -->

        <!--====== About Start ======-->
        <section class="about-area content-padding-t" id="about">
            <div class="container">
                <div class="section-heading text-center" data-aos="zoom-in">
                    <h1 class="common-color">About 'Dcotrack'</h1>
                    <p>
                        Our priority is to make data collection digital in low and middle-income countries around the world.
                        Therefore, the purpose of the "Dcotrack" is to make data collection and visualisation simple for the
                        researcher and business owner. A single place to track data collectors
                        and manage collected data. With this app, anyone from any discipline can work on multiple projects
                        at the same time. Get a specific insight into your collected data while collecting them on the go.
                        Furthermore,
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
        <!--====== About End ======-->

        <!--====== Covid  Start ======-->
        <section class="covid-area content-padding-t" id="covid">
            <div class="container">
                <div class="sub-heading content-padding-b" data-aos="zoom-in">
                    <h2 class="common-color font-size-40">Analyze Your <span class="red-color">Business Or Research</span>
                        Data !!!</h2>
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
                                        <p> <img src="{{ asset('assets/frontend/img/piechart3.png') }}" height="100px"
                                                width="100px" alt="recod" loading="lazy"> </p>
                                    </div>
                                    <div>
                                        <h3> User</h3>
                                        <p> <img src="{{ asset('assets/frontend/img/piechart5.png') }}" height="100px"
                                                width="100px" alt="recod" loading="lazy"></p>
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
                                        <p> <img src="{{ asset('assets/frontend/img/piechart1.png') }}" height="100px"
                                                width="100px" alt="recod" loading="lazy"> </p>
                                    </div>
                                    <div>
                                        <h3> Business</h3>
                                        <p> <img src="{{ asset('assets/frontend/img/piechart6.png') }}" height="100px"
                                                width="100px" alt="recod" loading="lazy"></p>
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
        <section class="vaccin-area content-padding-t" id="Vaccin">
            <div class="container">
                <div class="sub-heading">
                    <h2 class="common-color content-padding-b font-size-40" data-aos="fade-up">Record Multidisciplinary Data
                    </h2>
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
                            <img src="{{ asset('assets/frontend/img/Data extraction.gif') }}" alt="recod"
                            {{-- <img src="{{ asset('assets/frontend/img/Data.gif') }}" alt="recod" --}}
                                loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Vaccin Details End ======-->

        <!--====== QR Start ======-->

        <!--====== QR End ======-->

        <!--====== Consultant Start ======-->
        <section class="consultant-area content-padding-t" id="Consultant">
            <div class="container">
                <div class="sub-heading">
                    <h2 class="common-color content-padding-b font-size-40" data-aos="zoom-in">
                        Consult with Our Expert consultant
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7 col-md-6 d-flex align-items-center justify-content-center sm-margin-b"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="consultant-content vaccin-area">
                            <div class="before-srarting-img">
                                <ul>
                                    <li>
                                        Sales and marketing consultants are also available with us
                                    </li>
                                    <li>
                                        Internationally recognised research consultant and advisor
                                    </li>
                                    <li>
                                        Business, market and big data analyst
                                    </li>
                                    <li>
                                        Special discount for NGO, university, small business and student
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="rcord-img qrcode-img">
                            <img src="{{ asset('assets/frontend/img/Analytics (1).gif') }}" alt="qrcode" loading="lazy">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Consultant Details End ======-->
        <!--====== Health Start ======-->
        <section class="consultant-area content-padding-t" id="Consultant">
            <div class="container">
                <div class="sub-heading">
                    <h2 class="common-color content-padding-b font-size-40" data-aos="zoom-in">
                        Monitor your Progress
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5 sm-margin-b" data-aos="fade-up" data-aos-delay="100">
                        <div class="rcord-img qrcode-img">
                            <img src="{{ asset('assets/frontend/img/Visual data.gif') }}" alt="qrcode" loading="lazy">
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-7 d-flex align-items-center justify-content-center" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="consultant-content vaccin-area">
                            <div class="before-srarting-img">
                                <ul>
                                    <li>
                                        Track your daily data
                                    </li>
                                    <li>
                                        Monitor your data collectors
                                    </li>
                                    <li>

                                        Find loopholes of your research or business
                                    </li>
                                    <li>

                                        Take proper actions for betterment
                                    </li>
                                    <li>

                                        Overcome your difficulties with advance AI technology
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Consultant Details End ======-->
        <section class="section_about py-4">

        </section>
        <!--====== Location End ======-->

        <!--====== Social-media Start ======-->
        <section class="newsletter-area section-padding" id="Newsletter">
            <div class="container">
                <div class="sub-heading">
                    <h2 class="common-color content-padding-b font-size-40" data-aos="zoom-in">
                        Download Application
                    </h2>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <img src="{{ asset('assets/frontend/img/Dectrack illustration.gif') }}" alt="App_Logo">
                    </div>
                    <div class="col-sm-7 pt-5 d-flex align-items-center" id="apps-img">
                        <div>
                            <div class="app-img">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/frontend/img/googleplay.png') }}" alt="App_Logo">
                                </a>
                            </div>
                            <div class="app-img">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/frontend/img/googleapk.png') }}" alt="App_Logo">
                                </a>
                            </div>
                        </div>
                        <div>
                            <div class="app-img">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/frontend/img/appleplay.png') }}" alt="App_Logo">
                                </a>
                            </div>

                            <div class="app-img">
                                <a href="javascript:void(0);">
                                    <img src="{{ asset('assets/frontend/img/appleapk.png') }}" alt="App_Logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Social-media  End ======-->

        <!--====== Newsletter Start ======-->
        <section class="newsletter-area section-padding" id="Newsletter">
            <div class="container">
                <div class="sub-heading">
                    <h2 class="common-color content-padding-b font-size-40" data-aos="zoom-in">
                        Subscribe to our newsletter
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 sm-margin-b">
                        <div class="newsletter-left-img">
                            <img src="{{ asset('assets/frontend/img/Full inbox.gif') }}" alt="newsletter">
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="subscribe-area">
                            <div class="search-content">
                                <div>
                                    <h3 class="font-25"></h3>
                                </div>
                                <div class="py-3">
                                    <p>Contact with our professionals </p>
                                </div>

                                <form action="{{ route('save.subscribe') }}" method="POST">
                                    <div class="input-group search-input">
                                        @csrf
                                        <input name="email" type="email" required class="form-control py-2 border-right-0 border" id="example-search-input" placeholder=" Write your email ">
                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-append custom-btn">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
