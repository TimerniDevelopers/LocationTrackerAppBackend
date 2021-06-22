<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Registration | Location Tracker</title>

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
<div class="conainer block-center" style="margin-top: -120px!important;">
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="login-block">
            <div class="page-logo text-center"><a href="javascript:void(0);">
                    <img style="max-height: 70px;max-width: 90px" src="{{asset('assets/admin/img/logo-top.png')}}" class="logo-image"></a>
            </div>

            <form method="POST" action="{{ route('admin.save.register') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="User Role">Your Role <span class="text-danger">*</span></label>
                        <input id="user_role" type="text" class="form-control @error('user_role') is-invalid @enderror" name="user_role" value="" required autocomplete="off" autofocus>
                        @error('user_role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="First Name">First Name <span class="text-danger">*</span></label>
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="" required autocomplete="off" autofocus>
                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="Last Name">Last Name</label>
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="" required autocomplete="off" autofocus>
                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="Mobile Number">Mobile Number <span class="text-danger">*</span></label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="" required autocomplete="off" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="Profession">Profession</label>
                        <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="" required autocomplete="off" autofocus>
                        @error('profession')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="Address">Address <span class="text-danger">*</span></label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="" required autocomplete="off" autofocus>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="Email Address">Email Address <span class="text-danger">*</span></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="off" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="TxtPassword">Password <span class="text-danger">*</span></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <input type="submit" id="btn_login" tabindex="3" class="btn login-button" value="Register">
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
</html>
