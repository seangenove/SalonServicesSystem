<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log in with your account</title>

    <!-- Bootstrap core CSS -->
    <link href="/newAuth/resources/vends/bootstrap4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/newAuth/resources/css/modern-business.css" rel="stylesheet">

    <link rel="stylesheet" href="/newAuth/resources/vends/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/newAuth/resources/css/form-elements.css">
    <link rel="stylesheet" href="/newAuth/resources/css/style.css">

    <style>
        body{
            background: url("/newAuth/resources/images/background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            margin-top: 30px;
        }
        .help-block{
            color: red;
        }
        a{
            text-decoration: none !important;
        }
    </style>

</head>
<body>

{{-- include header--}}
@include('layouts.homepageHeader')

<!-- Page Content -->
<div class="inner-bg">
    <div class="container">
        <div class="col-sm-5">
            <div class="form-box">
                <div class="form-top">
                    <div class="form-top-left">
                        <h3 style="color: white">Log in</h3>
                    </div>
                    <div class="form-top-right">
                        <i class="fa fa-lock"></i>
                    </div>
                </div>
                <div class="form-bottom">
                    <form class="form-horizontal form-signin" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-2 control-label">E-Mail Address</label>--}}

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Username" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-8">
                                    <a  href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                                <div class="col-md-4">
                                    <a  href="{{ url('register') }}">
                                        Register
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<!-- /container -->

{{--include footer--}}
{{--@include('layouts.homepageFooter')--}}

<script src="/newAuth/resources/vends/jquery/jquery.min.js"></script>
<script src="/newAuth/resources/js/bootstrap.min.js"></script>
</body>
</html>