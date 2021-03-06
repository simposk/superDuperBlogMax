<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to my blog</title>

        <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
        
    <body>
        @include('partials._nav');
        @include('partials._messages');

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
