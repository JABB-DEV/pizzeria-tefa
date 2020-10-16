<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pizzeria Tefa</title>
<link rel="stylesheet" href="{{asset('css/bootstrap/css/bootstrap.min.css')}}">
<script src="{{ asset('css/fontawsome/js/all.min.js') }}"></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/tagify/tagify.css')}}">
@yield('styles')
</head>
<body>
    @include('layouts.partials.header')
    @include('layouts.partials.message')
    
    <div class="container">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('css/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('css/tagify/jQuery.tagify.min.js')}}"></script>
    @yield('scripts')
</body>
</html>