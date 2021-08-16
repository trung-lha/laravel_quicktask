<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <a href="" class="logo">Laravel Quicktasks</a>
                
                <div class="float-end">
                <a href="{{ route('language', ['en']) }}"><i class="flag-icon flag-icon-us"></i>English</a>
                <a href="{{ route('language', ['vi']) }}"><i class="flag-icon flag-icon-vn">Vietnamese</a>
                </div>
            </div>
            <br/>
            <h2 class="welcome">{{  __('index.welcome')  }}</h2>
             <br/>
        </div>
        
        <script src="{{ asset('js/project.js') }}"></script>
        @include('/layouts/flash-message')
        @yield('content')
    </body>
</html>
