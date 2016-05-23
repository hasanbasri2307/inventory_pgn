<!DOCTYPE html>
<html class="no-js before-run" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">
        <title>PT PGN Energy - {{ $title }}</title>
        <link rel="apple-touch-icon" href="{{ asset(env('ASSET_DIR').'images/apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ asset(env('ASSET_DIR').'images/pgn-logo.ico') }}">
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

        <!-- Icon-->
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/font-awesome/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/7-stroke/7-stroke.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/ionicons/ionicons.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/material-design/material-design.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/mfglabs/mfglabs.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/open-iconic/open-iconic.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/themify/themify.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/weather-icons/weather-icons.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/glyphicons/glyphicons.css') }}">
        <!-- Page -->
        @yield("css")
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/web-icons/web-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset(env('ASSET_DIR').'fonts/brand-icons/brand-icons.min.css') }}">
        <link rel='stylesheet' href='{{ asset(env('ASSET_DIR').'font-google.css') }}'>
        @yield("css_script")
       
        <!-- Scripts -->
        <script src="{{ asset(env('ASSET_DIR').'vendor/modernizr/modernizr.js') }}"></script>
        <script src="{{ asset(env('ASSET_DIR').'vendor/breakpoints/breakpoints.js') }}"></script>
        <script>
            Breakpoints();
        </script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
                    data-toggle="menubar">
                <span class="sr-only">Toggle navigation</span>
                <span class="hamburger-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
                    data-toggle="collapse">
                <i class="icon wb-more-horizontal" aria-hidden="true"></i>
                </button>
                <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
                    data-toggle="collapse">
                <span class="sr-only">Toggle Search</span>
                <i class="icon wb-search" aria-hidden="true"></i>
                </button>
                <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
                    <img class="navbar-brand-logo" src="{{ asset(env('ASSET_DIR').'images/pgn-logo1.png') }}" title="PGN Energy">
                    <span class="navbar-brand-text"> PGN</span>
                </div>
            </div>
            <div class="navbar-container container-fluid">
                <!-- Navbar Collapse -->
                <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
                    <!-- Navbar Toolbar -->
                    <ul class="nav navbar-toolbar">
                        <li class="hidden-float" id="toggleMenubar">
                            <a data-toggle="menubar" href="#" role="button">
                            <i class="icon hamburger hamburger-arrow-left">
                            <span class="sr-only">Toggle menubar</span>
                            <span class="hamburger-bar"></span>
                            </i>
                            </a>
                        </li>
                        <li class="hidden-xs" id="toggleFullscreen">
                            <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                            <span class="sr-only">Toggle fullscreen</span>
                            </a>
                        </li>
                    </ul>
                    <!-- End Navbar Toolbar -->
                    <!-- Navbar Toolbar Right -->
                    <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
                        <li class="dropdown">
                            <a class="navbar-avatar dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"
                                data-animation="slide-bottom" role="button">
                            <span class="avatar avatar-online">
                            <img src="{{ asset(env('ASSET_DIR').'images/users.png') }}" alt="...">
                            <i></i>
                            </span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation">
                                    <a href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> {{ Auth::user()->name }} - {{ Auth::user()->department->d_name }} ({{ Auth::user()->role }}) </a>
                                </li>
                                
                                <li class="divider" role="presentation"></li>
                                <li role="presentation">
                                    <a href="{{ url('logout') }}" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <!-- End Navbar Toolbar Right -->
                </div>
                <!-- End Navbar Collapse -->
            </div>
        </nav>
        <div class="site-menubar">
            @include("includes.menu.".Auth::user()->role)
           
        </div>
        <!-- Page -->
        <div class="page animsition">
            <div class="page-header">
                <h1 class="page-title">{{ $title }}</h1>
                <ol class="breadcrumb">
                    <li><a href="{{ url('home') }}">Home</a></li>
                    @if($controller != 'HomeController')
                        <li><a href="javascript:void(0)">{{ ucfirst(str_replace('Controller','', $controller)) }}</a></li>
                    @endif
                    <li class="active">{{ ucfirst($action) }}</li>
                </ol>
            </div>
            <div class="page-content">
                @yield("content")
            </div>
        </div>
        <!-- End Page -->
        <!-- End Page -->
        <!-- Footer -->
        <footer class="site-footer">
            <span class="site-footer-legal">© {{ date("Y") }} PGN</span>
            <div class="site-footer-right">
                Created <i class="red-600 wb wb-heart"></i> by <a href="http://themeforest.net/user/amazingSurge">HB</a>
            </div>
        </footer>
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
        <script src="{{ asset(env('ASSET_DIR').'js/components/matchheight.js') }}"></script>
        @yield("js")
        @yield("js_script")
    
    </body>
</html>