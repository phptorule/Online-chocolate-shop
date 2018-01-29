<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <link rel="stylesheet" href="{{ asset('libs/bootstrap-4.0.0/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('libs/bootstrap-4.0.0/css/bootstrap-reboot.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/fonts.css') }}" />
        <link rel="stylesheet" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/media.css') }}" />
    </head>
    <body>
        @yield('content')
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="{{ asset('libs/bootstrap-4.0.0/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('libs/bootstrap-4.0.0/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('libs/PageScroll2id/PageScroll2id.min.js') }}"></script>
        <script src="{{ asset('js/common.js') }}"></script>    
    </body>
</html>
