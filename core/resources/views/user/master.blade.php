<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    @yield('css')
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/common/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/sitelogo.png') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('assets/admin/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/datatable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/common/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.css') }}">
    <link href="{{ asset('assets/backend/css/select2.min.css') }}" rel="stylesheet" />

</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <style>
        .tc-font {
            font-family: Kalpurush
        }
    </style>
    <style>
        .select2-container .select2-selection--single {
            height: 36px !important;

        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ced4da;
            padding: 5px !important;
        }
    </style>

<div class="wrapper">
    <!-- Navbar -->
    @include('user.partials.header')
    @include('user.partials.sidebar')
    @yield('content')
    @include('user.partials.footer')



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="{{ asset('assets/common/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/common/jquery-ui/jquery-ui.min.js') }}"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
    $( document ).ready(function() {
        $('.services-carousel1').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                800:{
                    items:2
                },

                1000:{
                    items:2
                },
                1200:{
                    items:3
                },
                1600:{
                    items:3
                }
            }
        })


    });
</script>

<script src="{{ asset('assets/common/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('assets/common/jquery-knob/jquery.knob.min.js') }}"></script>

<script src="{{ asset('assets/common/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/js/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/common/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/admin/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/admin/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/admin/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/js/toastr.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#table_id').dataTable();
    });
</script>

<script src="{{ asset('assets/backend/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

<script src="{{ asset('assets/user_profile/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/user_profile/js/user_manual.js') }}"></script>
@include('backend.partials.notifications')
@include('user.partials.js')
@yield('js')
</body>
</html>
