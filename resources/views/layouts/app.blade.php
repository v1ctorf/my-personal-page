<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 //EN">
<html lang="en">

<head>
    @if(env('APP_ENV') == 'production')
        @include('layouts.ga')
    @endif
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>victorf - web developer</title>

    <link href="{{ secure_asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' 
        rel='stylesheet' type='text/css'>

    <link href="{{ secure_asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <link href="css/creative.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
