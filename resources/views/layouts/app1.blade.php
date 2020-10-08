<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tres con Raya') }}</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{!! asset('app-assets/images/ico/apple-icon-60.png')!!}">
    <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('app-assets/images/ico/apple-icon-76.png')!!}">
    <link rel="apple-touch-icon" sizes="120x120" href="{!! asset('app-assets/images/ico/apple-icon-120.png')!!}">
    <link rel="apple-touch-icon" sizes="152x152" href="{!! asset('app-assets/images/ico/apple-icon-152.png')!!}">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('app-assets/images/ico/favicon.ico')!!}">
    <link rel="shortcut icon" type="image/png" href="{!! asset('app-assets/images/ico/favicon-32.png')!!}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/bootstrap.css')!!}">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/fonts/icomoon.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/fonts/flag-icon-css/css/flag-icon.min.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/extensions/pace.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/ui/prism.min.css')!!}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/bootstrap-extended.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/app.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/colors.css')!!}">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/core/menu/menu-types/vertical-menu.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/css/core/menu/menu-types/vertical-overlay-menu.css')!!}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/style.css')!!}">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns ">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-static-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="index.html" class="navbar-brand nav-link"><img alt="branding logo" src="{!! asset('app-assets/images/logo/cursos-logo-light.png')!!}" data-expand="{!! asset('app-assets/images/logo/cero_cruz.jpg')!!}" data-collapse="{!! asset('app-assets/images/logo/cursos-logo-small.png')!!}" class="brand-logo"></a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
              <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
               </ul>
            @guest
              <ul class="nav navbar-nav float-xs-right">
              <li><a href="{{ route('login') }}">Loguearse</a></li>
              <li><a href="{{ route('register') }}">Registrarse</a></li>
              </ul>
            @else
            <ul class="nav navbar-nav float-xs-right">


              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online">
               <img src="{!! asset('app-assets/images/portrait/small/avatar-s-1.png')!!}" alt="avatar"><i></i></span><span class="user-name">{{ Auth::user()->name }}</span></a>

                <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="icon-power3"></i>
                    Desloguearse
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>

                </div>

              </li>

             </ul>
            @endguest


          </div>
        </div>
      </div>
    </nav>


    @include('includes.menu1')

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        @yield('content')
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block"> </span></p>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="{!! asset('app-assets/js/core/libraries/jquery.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/vendors/js/ui/tether.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/js/core/libraries/bootstrap.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/vendors/js/ui/unison.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/vendors/js/ui/blockUI.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/vendors/js/ui/jquery.matchHeight-min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/vendors/js/ui/screenfull.min.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/vendors/js/extensions/pace.min.js')!!}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script type="text/javascript" src="{!! asset('app-assets/vendors/js/ui/prism.min.js')!!}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="{!! asset('app-assets/js/core/app-menu.js')!!}" type="text/javascript"></script>
    <script src="{!! asset('app-assets/js/core/app.js')!!}" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
   @yield('scripts')
  </body>
</html>
