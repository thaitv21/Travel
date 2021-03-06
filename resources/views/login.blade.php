<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>

    <!-- Font Icon -->
    <link rel="stylesheet" 
        href="{{ asset('bower_components/review_travel/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('bower_components/review_travel/css/style.css') }}">
</head>
<body>

    <div class="main">
        <!-- Sign up form -->
        @yield('content')
        <!-- Sing in  Form -->
    </div>

    <!-- JS -->
    <script src="{{ asset('bower_components/review_travel/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/review_travel/js/main.js') }}"></script>
</body>
</html>
