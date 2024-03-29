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

    <!-- ios support -->
<!--    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-72x72.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-96x96.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-128x128.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-144x144.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-152x152.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-192x192.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-384x384.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/icons/icon-512x512.png') }}" />-->
    <meta name="apple-mobile-web-app-status-bar" content="#db4938" />
    <meta name="theme-color" content="#db4938" />

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        body {
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
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">
    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>T</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Account</b>AT</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a title="New Invoice" href="{{ route('invoices.create') }}">
                            <i class="fa fa-edit"></i>
                            New Invoice
                        </a>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->name }} - {{ auth()->user()->role }}
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ route('logout') }}"
                                       class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    >Sign out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{ auth()->user()->name }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">ADMINISTRATION</li>
                <li class="treeview {{ (str_contains(request()->path(), 'settings')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-gears"></i>
                        <span>Settings</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('items.index') }}"><i class="fa fa-circle-o"></i>Business Settings</a></li>
                        <li><a href="{{ route('stocks.add') }}"><i class="fa fa-circle-o"></i>Invoice Settings</a></li>
                        <li><a href="{{ route('stocks.history') }}"><i class="fa fa-circle-o"></i>General Settings</a></li>
                    </ul>
                </li>
                <li class="header">INVENTORY</li>

                <li class="{{ (str_contains(request()->path(), 'dashboard')) ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i>
                        <span>Inventory</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('items.index') }}"><i class="fa fa-circle-o"></i>Items</a></li>
                        <li><a href="{{ route('stocks.add') }}"><i class="fa fa-circle-o"></i>Stock In</a></li>
                        <li><a href="{{ route('stocks.history') }}"><i class="fa fa-circle-o"></i> Stock History</a></li>
                    </ul>
                </li>
                <li class="treeview {{ (str_contains(request()->path(), 'invoices')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Invoices</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('invoices.index') }}"><i class="fa fa-circle-o"></i>All invoices</a></li>
                        <li><a href="{{ route('invoices.create') }}"><i class="fa fa-circle-o"></i>New invoice</a></li>
                    </ul>
                </li>
                <li class="treeview {{ (str_contains(request()->path(), 'customers')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Customers</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('customers.index') }}"><i class="fa fa-circle-o"></i>All Customers</a></li>
                        <li><a href="{{ route('customers.create') }}"><i class="fa fa-circle-o"></i>New Customer</a></li>
                        <li><a href="{{ route('bikes.index') }}"><i class="fa fa-circle-o"></i>Bikes</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i>
                        <span>Data Center</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/"><i class="fa fa-circle-o"></i>Items</a></li>
                        <li><a href="{{ route('item_categories.index') }}"><i class="fa fa-circle-o"></i>Item Categories</a></li>
                        <li><a href="{{ route('partners.index') }}"><i class="fa fa-circle-o"></i>Partners</a></li>
                        <li><a href="/"><i class="fa fa-circle-o"></i>Office Documents</a></li>
                    </ul>
                </li>


<!--
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-database"></i>
                        <span>Purchases</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i>Product list</a></li>
                        <li><a href="{{ route('purchases.index') }}"><i class="fa fa-circle-o"></i>Purchases</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>Sales Analysis</a></li>
                    </ul>
                </li>
-->

<!--                <li>
                    <a href="{{ route('products.index') }}">
                        <i class="fa fa-files-o"></i>
                        <span>Products</span>
                    </a>
                </li>-->

                <li class="{{ (str_contains(request()->path(), 'users')) ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="header">Communication</li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> <span>Send Email</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @if(Session::has('success'))
            <div class="alert alert-success">
                <p> {{ Session::get('success') }} </p>
            </div>
        @endif

        @if(Session::has('warning'))
            <div class="alert alert-warning ">
                <p> {{ Session::get('warning') }} </p>
            </div>
        @endif

        @if(Session::has('info'))
            <div class="alert alert-info">
                <p> {{ Session::get('info') }} </p>
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
                <p> {{ Session::get('error') }} </p>
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

        @yield('content')

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} <a href="https://thegriffontechnologies.com">Griffon Technologies Nig</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


@yield('footer-script')
</body>

</html>
