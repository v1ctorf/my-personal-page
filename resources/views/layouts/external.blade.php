<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html lang="en">

<head>
    @if(env('APP_ENV') == 'production')

    @endif

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>victorf | sw dev</title>

    <link href="{{ secure_asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>

    <link href="{{secure_asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{secure_asset('css/creative.min.css')}}" rel="stylesheet">

    @yield('style')
</head>

<body id="page-top">
    <div id="app">
        @yield('content')
        <welcome-footer></welcome-footer>
    </div>

    @include('layouts.routes')

    <script src="{{secure_asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{secure_asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{secure_asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{secure_asset('js/creative.min.js')}}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
