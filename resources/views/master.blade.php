<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }}</title>
        <style>
            body {
                background-color: #213247;
                margin-top: 30px;
            }

            .container {
                margin: 0 15% 0 15%;
                padding: 30px;
                background-color: white;
                border-radius: 30px;
            }
        </style>
        @yield('css')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
            @yield('js')
    </body>
</html>
