@extends('frontend.master')

@section('title')
    Contact | Dcotrack
@endsection

@section('contactPage')
    <section class="location-area content-padding-contact" id="contact_us">
        <div class="container">
            <div class="sub-heading">
                <h2 class="common-color content-padding-b font-size-40" data-aos="zoom-in">
                    Contact us <br>We are available 24/7 every week
                </h2>
            </div>
            <section class="heroku">
                <div class="map-area-02">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2582.0290843848275!2d90.42105904841203!3d23.763758142677403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7f5bfcb33df%3A0xb4edb1bd16f60b1f!2sTime%20Research%20%26%20Innovation!5e0!3m2!1sen!2sbd!4v1615179701109!5m2!1sen!2sbd"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </section>

            <section class="border-bottom py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 text-center border-right icon_i">
                            <a class="icon-info px-3 py-2  text-white mb-2 d-inline-block"><i
                                    class="fa fa-map-marker-alt"></i></a>
                            <h5 class="adress">
                                189 Foundry Lane
                                Southampton
                                SO15 3JZ
                                United Kingdom
                                <br>
                                336/7, TV Road
                                East Rampura, Khilgaon
                                Dhaka-1219
                                Bangladesh
                            </h5>
                        </div>
                        <div class="col-md-4 text-center border-right icon_i">
                            <a class="icon-info px-3 py-2  text-white mb-2 d-inline-block"><i class="fa fa-phone"></i></a>
                            <a href="tel: +44 (0) 238 052 8262 ">
                                <h5 class="adress">
                                    +44 (0) 755 482 3078 (UK)
                                    <br>
                                    +88 (0) 17 43 966 200 (BD)
                                </h5>
                            </a>

                        </div>
                        <div class="col-md-4 text-center border-right icon_i">
                            <a class="icon-info px-3 py-2  text-white mb-2 d-inline-block"><i
                                    class="fa fa-envelope"></i></a>
                            <a href="mailto:dcotrack@timerni.com">
                                <h5 class="adress"> dcotrack@timerni.com</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section_about py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="section-title text-center mb-5">
                                <p>Time research & innovation is a research organisation based in the United Kingdom and
                                    Bangladesh.</p>
                                <strong>To contact us regarding our services and product please, send us your inquiry. </strong>
                                    <strong>and to request a demo of this application please fill in the following
                                        information. We will contact you soon to understand your need.</strong>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-10">
                            <div class="row align-items-center">
                                <div class="col-sm-12 col-md-6 mb-5 mb-md-0">
                                    <div class="contact_info">
                                        <div class="mb-4">
                                            <h5
                                                class="info-title link-title fs-18 mb-3 font-weight-600 position-relative co_info">
                                                Address</h5>
                                            <address class="mb-4">
                                                Time research & innovation, 189 Foundry Lane
                                                Southampton
                                                SO15 3JZ
                                                United Kingdom.
                                                <br>
                                                336/7, TV Road
                                                East Rampura, Khilgaon
                                                Dhaka-1219
                                                Bangladesh.
                                            </address>
                                        </div>
                                        <div class="mb-4">
                                            <h5
                                                class="info-title link-title fs-18 mb-3 font-weight-600 position-relative co_info">
                                                Phone &amp; WhatsApp Number</h5>
                                            +44 (0) 755 482 3078 (UK)<br>+88 (0) 17 43 966 200 (BD)
                                        </div>

                                        <div class="mb-4">
                                            <h5
                                                class="info-title link-title fs-18 mb-3 font-weight-600 position-relative co_info">
                                                Email</h5>
                                            dcotrack@timerni.com
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6">

                                    <ul class="nav nav-tabs text-center">
                                        <li class="active mr-2">
                                            <a data-toggle="tab" href="#home">
                                                <button class="btn" style="background-color: rgb(36, 170, 24)">Contact Us</button>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#menu2">
                                                <button class="btn" style="background-color: darkcyan">To Request a Demo</button>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active show">
                                            @include('frontend.contact.contact-form')
                                        </div>

                                        <div id="menu2" class="tab-pane fade">
                                            @include('frontend.contact.request-demo-form')
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <section class="section_about py-4">


    </section>
@endsection
