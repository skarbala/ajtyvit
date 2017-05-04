<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/ico"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>


    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style>
        .navbar-default a.navbar-brand {
            font-size: 30px;
            color: #be1968;
        }

        .navbar-default a.navbar-brand:hover {
            color: #002060;
        }

        .navbar-default {
            background-color: #fff;

        }

        .navbar-default .navbar-nav > li > a {
            color: #cd2c77;
            font-weight: 600;
            text-transform: uppercase;
        }

        .navbar-default .navbar-nav > li > a:hover, tbody a:hover {
            text-decoration: none;
            color: #002060;
        }

        tbody a {
            color: #cd2c77;
            font-weight: 600;
        }

    </style>
</head>
<body>
<div id="app">
    @include('partials.navigation')
    @yield('content')
</div>
@yield('script')
</html>
