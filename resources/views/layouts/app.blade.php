<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Academic Writing</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/logo.png')}}"/>
    @livewireStyles
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased bg-light">
@include('navigation-menu')
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
