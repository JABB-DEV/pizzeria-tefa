<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pizzeria Tefa</title>
<link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<script src="{{ asset('css/fontawsome/js/all.min.js') }}"></script>
</head>
<body>
    @include('layouts.partials.header')
    
    <div class="container">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    @yield('scripts')
</body>
</html>