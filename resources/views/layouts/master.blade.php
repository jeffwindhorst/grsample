<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>QRSample - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        {{ HTML::style('css/app.css') }}
    </head>




    <body>
        <div class="flex-center position-ref full-height">
            <div id="header">
                <ul id="nav" class="top-right links">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div id="content-wrapper">
                @yield('content')
            </div>
        </div>
    </body>
</head>
