<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>DcoTrack | Admin Login</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
      <link rel="shortcut icon" href="{{ asset('assets/frontend/img/sitelogo.png') }}" type="image/x-icon" />
      <!--=== Font family Css ===-->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
      <!--=== Bootstrap 4===-->
      <link rel="stylesheet" href="{{ asset('assets/common/bootstrap/css/bootstrap.min.css') }}">
      <!--=== Main Css ===-->
      <link rel="stylesheet" href="{{ asset('assets/admin_login/css/style.css') }}">

   </head>

   <body>
    <div class="form-height">
      <div class="container">
        <div class="text-center">
          <a href="{{ route('index') }}"><img src="{{ asset('assets/frontend/img/dcotrak.png') }}" alt="DcoTrack"></a>
          <p class="pb-2 sign">Control Panel</p>
        </div>
        <div class="row">
          <div class="col-md-6 offset-md-3">
          <div class="">
                <div id="first" >
                 <div class="myform form ">
                  <form action="{{ route('admin.loginCheck') }}" method="POST" name="login">
                    @csrf
                   <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                    {{-- <p class="font-small blue-text d-flex justify-content-end pt-2">
                        <a href="ressetpass.html" class="blue-text ml-1">Forgot Password?</a>
                  </p> --}}
                </div>
                <div class="col-md-12 text-center ">
                  <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                </div>
                {{-- <div class="form-group">
                  <p class="text-center">Don't have account? <a href="signin.html" id="signup">Sign up here</a></p>
                </div> --}}
              </form>
            </div>
          </div>
          </div>

          </div>
        </div>
        <div class="text-center">
            <p class="pt-3 sign">Sign in to stay updated on your professional world</p>
            <a target="_blank" href="https://timerni.com"><img class="pt-2" src="{{ asset('assets/admin_login/img/Tri_login_logo.png') }}" alt="TRI" style="max-height: 70px"></a>
        </div>
      </div>
    </div>

      <!--====== Footer Start ======-->
      <!--====== Footer End   ======-->
      <footer id="signup-footer" class="form-footer">
        <div class="container-fluid text-center py-2">
          <div class="col-md-8 offset-md-2">

              <div class="d-flex align-items-center justify-content-center">
                <ul >
                  <li><a href="https://timerni.com" target="_blank">
                  <img src="{{ asset('assets/admin_login/img/sitelogo.png') }}" alt="our logo">
                </a></li>
                <li class="mr-3"><p><img src="{{ asset('assets/admin_login/img/copyr8.png') }}" alt=""> Copyright Time research & innovation.</p></li>
                  {{-- <li><a href="javascript:void(0);">Terms & Conditions</a></li> --}}
                  <li><a target="_blank" href="https://timerni.com/policy">Privacy Policy</a></li>


                </ul>
              </div>

          </div>

        </div>
      </footer>

      <!--====== goTop End   ======-->
      <!--========================== javascript ======================================-->
        <script src="{{ asset('assets/common/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/common/bootstrap/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin_login/js/main.js') }}"></script>
   </body>
</html>


{{-- <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login | Location Tracker</title>

    <!-- Scripts -->
    <script src="{{ asset('assets/admin/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('assets/admin/img/logo-top.png')}}" type="image/x-icon"/>

    <!-- Styles -->
    <link href="{{ asset('assets/admin/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin/css/login.css')}}">
</head>

<body class="bg1">
<div class="conainer block-center">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="login-block">
            <div class="page-logo text-center"><a href="javascript:void(0);">
                    <img style="max-height: 70px;max-width: 90px" src="{{asset('assets/admin/img/logo-top.png')}}" class="logo-image"></a>
            </div>

            <form method="POST" action="{{ route('admin.loginCheck') }}">
                @csrf
                <div class="form-group">
                    <label for="Email Address">Email Address / Mobile Number</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="TxtPassword">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <input type="submit" id="btn_login" tabindex="3" class="btn login-button" value="Login">
                <br>
                <span id="lblmsg" style="color:Red;"></span>
            </form>

            <div class="login-footer">
                <p style="color:#fff">Powered by Time Research & Innovation</p>
                <img src=""><br><br>
            </div>
        </div>
    </div>
</div>
</body>
</html> --}}
