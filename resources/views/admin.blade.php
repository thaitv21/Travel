<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ trans('admin.admin_page') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/review_travel/vendor_admin/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css_admin/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link href="{{ asset('bower_components/review_travel/vendor_admin/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ trans('admin.admin') }}</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('users') }}">
                  <i class="fas fa-fw fa-user"></i>
                  <span>{{ trans('admin.users_list') }}</span></a>
            </li>
            <hr class="sidebar-divider">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('posts') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>{{ trans('admin.posts_list') }}</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>{{ trans('admin.cmts_list') }}</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            @include('header_admin')
            @yield('content')
            </div>
            <!-- Footer -->
            @include('footer_admin')
            <!-- End of Footer -->
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('bower_components/review_travel/vendor_admin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/vendor_admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/vendor_admin/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_admin/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/vendor_admin/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_admin/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js_admin/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/vendor_adminvendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/vendor_adminvendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
