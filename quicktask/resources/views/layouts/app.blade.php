<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <div class="">
            <div class="header">
                <a href="" class="logo">Laravel Quicktasks</a>
            </div>
            <br/>
            <h2>Welcome to products management admin page!</h2>
        </div>
        @yield('content')
        <script type="text/javacript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
