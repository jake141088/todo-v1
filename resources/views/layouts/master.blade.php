<!doctype html>
<html lang="pt-br" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sisteminha | @yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <meta name="theme-color" content="#7952b3">

    @stack('styles')

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/sticky-footer-navbar.css') }}" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100">
    @yield('content') 

    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
