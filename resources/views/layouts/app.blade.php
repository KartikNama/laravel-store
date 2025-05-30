<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','E-Commerce')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('partials.header')

<div class="container my-3">
    @yield('content')
</div>

@include('partials.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
