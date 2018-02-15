<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link rel="stylesheet" href="{{ asset('libs/bootstrap-4.0.0/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('libs/bootstrap-4.0.0/css/bootstrap-reboot.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}" />
        <link rel="stylesheet" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('libs/slick/slick.css') }}" />
	    <link rel="stylesheet" href="{{ asset('libs/slick/slick-theme.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/media.css') }}" />
    </head>
    <body>
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap-4.0.0/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap-4.0.0/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/PageScroll2id/PageScroll2id.min.js') }}"></script>
        <script  src="{{ asset('libs/slick/slick.min.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        @stack('js')
    </body>
</html>
