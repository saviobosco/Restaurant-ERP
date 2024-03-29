<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '') }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--
    <link rel="manifest" href="{{ asset('manifest.json') }}" />
--}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>

        body {
            font-family: Raleway,Open Sans,Helvetica Neue,Helvetica,Arial,sans-serif;
            font-size: 16px;
        }
        .m-15-30 {
            margin-top: 15px;
            margin-bottom: 30px;
        }

        .items__container {
            border-top: 1px solid #eee;
            margin: 10px 0 30px;
        }

        .item__single {
            padding: 5px 10px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }
        .item__single:hover {
            background-color: #eee;
        }
        .required label:after {
            content: "*";
            color: red
        }
        .swal2-popup {
            font-size: 1.5rem;
        }
        .nav-sidebar ul.nav-treeview {
            padding-left: 20px;
        }

        .fw-100 {
            font-weight: 200 !important;
        }

        .quick__nav__tab {
            list-style: none;
            padding: 0;
            margin-bottom: 0;
        }
        .quick__nav__tab .quick__nav__item {
            display: inline-block;
            margin-right: -5px;
        }
        .quick__nav__tab .quick__nav__link {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent;
            border-radius: 0 0 0 0;
            color: #212529;
            font-weight: 300;
        }
        .quick__nav__tab .quick__nav__link.active {
            background-color: rgba(255, 255, 255, 1);
        }
        .quick__nav__tab .quick__nav__link.inactive {
            cursor: no-drop;
        }
        .quick__nav__tab .quick__nav__link.pointer_good{
            cursor: pointer !important;

        }


        .bg__light__dark{
            background-color: #ededed;
        }
        .sale-tab {
            background-color: #ededed;
            border-radius: 0;
            border-bottom: 2px solid #979797;
            height: 100px;
            cursor: pointer;
        }
        .sale-tab:hover {
            background-color: #ffffff;
        }

        .sale-tab .inner {
            padding: 15px 15px;
        }

        .sale-tab p {
            font-size: 0.9em;
        }

        .sale__tab_added {
            border-bottom: 2px solid green;
        }
        .sale__tab__current {
            border-bottom: 2px solid orange;
        }

        .sale__side__tab {
            list-style: none;
            padding: 0;
            margin-bottom: 0;
            font-size: 0.8em;
            border-right: 1px solid #ededed;
        }

        .sale__side__tab .side__nav__link {
            display: block;
            padding: 10px 20px;
            background-color: transparent;
            border-radius: 0 0 0 0;
            font-weight: 300;
            border-bottom: 1px solid #ededed;
        }
        .sale__side__tab .side__nav__link:hover {
            background-color: #ededed;
        }
        .sale__side__tab .side__nav__link.active {
            background-color: #ededed;
        }

        .card__active {
            display: inline-block;
            height: 10px;
            width: 10px;
            border-radius: 50%;
            background-color: #41b218;
        }
        .complete__checkout label{
            font-weight: 300 !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div id="app" class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>



        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('invoices.create') }}">Sell</a>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-success navbar-badge">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">0 Notifications</span>
                    <div class="dropdown-divider"></div>
<!--                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>-->
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('invoices.create') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off text-danger"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    @include('layouts.sidebar.index')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="pt-4">
            <div class="container-fluid">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::has('warning'))
                    <div class="alert alert-warning ">
                        {{ Session::get('warning') }}
                    </div>
                @endif

                @if(Session::has('info'))
                    <div class="alert alert-info">
                        {{ Session::get('info') }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; {{ date('Y') }} <a href="https://thegriffontechnology.com">Griffon Technologies</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
</body>



</html>
