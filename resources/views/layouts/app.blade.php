<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @include('partials.style')
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        @include('partials.sidebar')
        <div class="body-wrapper">
            @include('partials.navbar')
            @yield('content')
        </div>
    </div>
    @include('partials.script')
    <script src="{{ asset('/public/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/public/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('/public/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/public/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>