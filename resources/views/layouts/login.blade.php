<!DOCTYPE html>
<html class="no-js before-run" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">
        <title>{{ $title }}</title>
        <link rel="apple-touch-icon" href="{{ asset(env('ASSET_DIR').'images/apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ asset(env('ASSET_DIR').'images/favicon.ico') }}">
        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'css/bootstrap-extend.min.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'css/site.min.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/animsition/animsition.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/asscrollable/asScrollable.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/switchery/switchery.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/intro-js/introjs.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/slidepanel/slidePanel.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'vendor/flag-icon-css/flag-icon.css') }}">
        <!-- Page -->
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'css/pages/login.css') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/web-icons/web-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/brand-icons/brand-icons.min.css') }}">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <!--[if lt IE 9]>
        <script src="vendor/html5shiv/html5shiv.min.js"></script>
        <![endif]-->
        <!--[if lt IE 10]>
        <script src="vendor/media-match/media.match.min.js"></script>
        <script src="vendor/respond/respond.min.js"></script>
        <![endif]-->
        <!-- Scripts -->
        <script src="{{ asset(env('ASSET_DIR').'vendor/modernizr/modernizr.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/breakpoints/breakpoints.js') }}"></script>
        <script>
            Breakpoints();
        </script>
    </head>
    <body class="page-forgot-password layout-full" style="background-color: #E2E2E2">
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Page -->
        <div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
            data-animsition-out="fade-out">
            <div class="page-content vertical-align-middle">
                <div class="brand">
                    <img class="brand-img" src="{{ asset(env('ASSET_DIR').'images/pgn-saka.png') }}" width="400px" height="100px" alt="...">
                </div>
                <h2 class="page-title"></h2>
                {!! Form::open(['url'=>'login','method'=>'POST','class'=>'width-300 margin-top-30 center-block']) !!}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                	{!! Form::email('email',old('email'),['class'=>'form-control','placeholder'=>'Email']) !!}
                	@if ($errors->has('email'))
	                    <span class="help-block pull-left">
	                        <strong>{{ $errors->first('email') }}</strong>
	                    </span>
	                @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                	{!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
                	@if ($errors->has('password'))
	                    <span class="help-block pull-left">
	                        <strong>{{ $errors->first('password') }}</strong>
	                    </span>
	                @endif
                </div>
                <div class="form-group clearfix">
                    <div class="checkbox-custom checkbox-inline pull-left">
                        {!! Form::checkbox('remember',1,false,['id'=>'inputCheckbox']) !!}
                        <label for="inputCheckbox">Remember me</label>
                    </div>
                </div>
                <div class="form-group">
                	{!! Form::submit('Submit',['class'=>'btn btn-primary btn-block']) !!}
                </div>
                {!! Form::close() !!}
                <footer class="page-copyright">
                    <p>SYSTEM BY PGN</p>
                    <p>© {{ date("Y") }}. All RIGHT RESERVED.</p>
                </footer>
            </div>
        </div>
        <!-- End Page -->
        <!-- Core  -->
        <script src="{{ asset(env('ASSET_DIR').'vendor/jquery/jquery.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/animsition/jquery.animsition.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/asscroll/jquery-asScroll.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/mousewheel/jquery.mousewheel.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/asscrollable/jquery.asScrollable.all.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/ashoverscroll/jquery-asHoverScroll.js') }}"></script>
        <!-- Plugins -->
        <script src="{{ asset(env('ASSET_DIR').'vendor/switchery/switchery.min.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/intro-js/intro.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/screenfull/screenfull.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/slidepanel/jquery-slidePanel.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/jquery-placeholder/jquery.placeholder.js') }}"></script>
        <!-- Scripts -->
        <script src="{{ asset(env('ASSET_DIR').'js/core.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/site.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/sections/menu.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/sections/menubar.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/sections/sidebar.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/configs/config-colors.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/configs/config-tour.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/components/asscrollable.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/components/animsition.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/components/slidepanel.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/components/switchery.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'js/components/jquery-placeholder.js') }}"></script>
        <script>
            (function(document, window, $) {
              'use strict';
            
              var Site = window.Site;
              $(document).ready(function() {
                Site.run();
              });
            })(document, window, jQuery);
        </script>
    </body>
</html>