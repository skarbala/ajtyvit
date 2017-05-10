<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/ico"/>

    <title>{{ config('app.name') }}@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Arial';
            color: #5c5c5c;
        }

        h1 {
            font-family: 'Shadows Into Light Two', cursive;
            text-align: center;
            text-transform: uppercase;
            font-size: 40px;
            font-weight: 600;
        }

        ul {
            margin: 0;
            margin-top: 10px;
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        a.btn-default:hover, button.btn-default:hover {
            background-color: #002060;
            color: #fff;
        }

        a.btn, button.btn {
            border-radius: 0;
            transition: all 0.3s ease-out;

        }

        a.heading {
            text-decoration: none;
            color: #5c5c5c;
        }

        footer {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1rem;
            background-color: #efefef;
            text-align: center;
        }

        input.form-control, select.form-control {
            border-radius: 0px;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>@yield('title','Dovolenkovač')</h1>
    <hr>
    @yield('content')
</div>
<footer>
    <small>version 132</small>
</footer>
</body>
</html>
