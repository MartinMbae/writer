<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="{{ asset('assets/concept/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/concept/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/concept/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/concept/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/concept/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/concept/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/concept/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/concept/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/concept/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/logo.png')}}"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{ asset('assets/js/dropzone/dropzone.min.css') }}">
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets/concept/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/concept/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone.min.js') }}"></script>
    <title>{{ $title }}</title>
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">

    @include('admin.header')


    @include('admin.sidebar', ['counts'=>$counts])
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" style="margin: 15px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible" style="margin: 15px;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>
                {{ session()->get('error') }}
            </strong>
        </div>
    @endif
    @yield('content')

</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- slimscroll js -->
<script src="{{ asset('assets/concept/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<!-- main js -->
<script src="{{ asset('assets/concept/libs/js/main-js.js') }}"></script>
<!-- chart chartist js -->
<script src="{{ asset('assets/concept/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
<!-- sparkline js -->
<script src="{{ asset('assets/concept/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
<!-- morris js -->
<script src="{{ asset('assets/concept/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
<script src="{{ asset('assets/concept/vendor/charts/morris-bundle/morris.js') }}"></script>
<!-- chart c3 js -->
<script src="{{ asset('assets/concept/vendor/charts/c3charts/c3.min.js') }}"></script>
<script src="{{ asset('assets/concept/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
<script src="{{ asset('assets/concept/vendor/charts/c3charts/C3chartjs.js') }}"></script>
<script src="{{ asset('assets/concept/libs/js/dashboard-ecommerce.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
