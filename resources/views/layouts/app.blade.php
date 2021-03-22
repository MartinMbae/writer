<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Academic Writing</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/dropzone/dropzone.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/logo.png')}}"/>
    @livewireStyles

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone/dropzone.min.js') }}"></script>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <style>
        .form-error {
            border: 2px solid #e74c3c;
        }
        .entry:not(:first-of-type)
        {
            margin-top: 10px;
        }

        .glyphicon
        {
            font-size: 12px;
        }


    </style>
</head>
<body class="font-sans antialiased bg-light">
@yield('navbar')
<!-- Page Heading -->
<header class="d-flex py-3 bg-white shadow-sm border-bottom">
    <div class="container">
        @yield('header')
    </div>
</header>

<main class="container my-5">
    @yield('content')
</main>
@stack('modals')

@livewireScripts
@stack('scripts')


</body>
</html>
