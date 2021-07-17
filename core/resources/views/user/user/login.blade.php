<!doctype html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>DcoTrack | User Login</title>
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
          <p class="pb-2 sign">User Panel</p>
        </div>
        <div class="row">
          <div class="col-md-6 offset-md-3">
          <div class="">
                <div id="first" >
                 <div class="myform form ">
                  <form action="{{ route('user.loginCheck') }}" method="POST" name="login">
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
