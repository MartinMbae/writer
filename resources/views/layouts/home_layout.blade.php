<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('components.header')
<body>
@include('components.navbar')

@yield('content')

</body>
</html>


