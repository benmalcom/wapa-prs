<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $appName }}</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')

    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <!-- /core JS files -->
    @stack('scripts')

<!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/plugins/ui/nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/core/app.js') }}"></script>

    <!-- /theme JS files -->
    <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- /core JS files -->


</head>

<body class="login-container relative">
@if(Session::has('flash_message'))
    {!! Session::get('flash_message') !!}
@endif
@include('errors.errors')
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Simple login form -->
                <form action="{{ url('/login') }}" method="post" class="mt-50">
                    {!! csrf_field() !!}
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <h5>{{$appName}}</h5>
                            <div class="icon-object border-slate-300 text-slate-300"><i class="fa fa-female"></i></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" required class="form-control" placeholder="Email" name="email">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" required class="form-control" placeholder="Password" name="password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
                        </div>

{{--                        <div class="text-center">
                            <a href="login_password_recover.html">Forgot password?</a>
                        </div>--}}
                    </div>
                </form>
                <!-- /simple login form -->


                <!-- Footer -->
                <div class="footer text-muted text-center">
                    &copy; 2017
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
