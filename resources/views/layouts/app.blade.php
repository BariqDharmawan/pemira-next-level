<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="{{ asset('template/vendor/nucleo/css/nucleo.css') }}">
    <link rel="stylesheet" 
    href="{{ asset('template/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/argon.css?v=1.2.0') }}">
</head>
<body>
    
    @yield('content')
    @yield('component')

    <script src="{{ asset('template/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}">
    </script>
    <script src="{{ asset('template/js/argon.js?v=1.2.0') }}"></script>
    @stack('script')
</body>
</html>
