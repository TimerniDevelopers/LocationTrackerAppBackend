<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/sitelogo.png') }}" type="image/x-icon" />
    <!--=== fontawesome-free-5.15.2 ===-->
    <!-- <link rel="stylesheet" href="assets/css/all.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--=== Bootstrap 4 ===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!--=== Animate 4.1.1 ===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}" />
    <!--=== Aos 2.3.1===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/aos.css') }}">

    <!--=== Owl carousel 2.3.4===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}">
    <!--=== Main Css ===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/contact_us.css') }}">
    <!--=== Header Css ===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/header_dropdown.css') }}">
    <!--=== Footer Css ===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/footer.css') }}">
    <!--=== Responsive Css ===-->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.css') }}">

</head>

<body>
    <!--====== Header Start ======-->
    @include('frontend.partials.header')
    <!--====== Header Start ======-->

    <!--====== Hero Start ======-->

    @yield('content')
    <div id="contact">
        @yield('contactPage')
    </div>

    <!--====== Newsletter End ======-->

    <!--====== Footer Start ======-->
    @include('frontend.partials.footer')

    <!--====== Footer End ======-->
    <!-- Cookie -->
    @include('cookieConsent::index')
    <?php
        $cookie_id = session()->getId();
        setcookie($cookie_id, 'DcoTrack', 1440);
    ?>
    <!--=== All Plugin ===-->
    <!--============= Jquery-3.6.0 =============-->
    <script type="text/javascript" src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <!-- Chart.js/3.2.0/ -->
    <script src="{{ asset('assets/frontend/js/chart.js') }}"></script>


    <!--=== Bootstrap4 js ===-->
    <script type="text/javascript" src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>

    <!--=== owl carousel ===-->
    <script type="text/javascript" src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>

    <!-- Aos js -->
    <script src="{{ asset('assets/frontend/js/aos.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>

    <!--=== Main js ===-->
    <script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script>
        new WOW().init();
        AOS.init();
    </script>
    <script src="{{ asset('assets/backend/js/toastr.js') }}"></script>
    @include('backend.partials.notifications')
    {{-- <script>
  function myContact(e) {
    let url = this.href;
    window.location.hash = url;
  }

  window.addEventListener('hashchange', () => {
    $("#contact").show(1000);
    $("#home").hide(1000);
});
  </script> --}}
  <style>
      .js-cookie-consent{
          position: absolute;
          padding: 8px;
          text-align: center;
          width: 100%;
          z-index: 9999;
          background-color: aquamarine;
          border-color: solid 1px white;
      }
      .js-cookie-consent button{
          padding: 5px;
          background-color: beige;
          border-radius: 5px;
      }
  </style>

</body>

</html>
