<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name', 'TunnelCRM') }}</title>
    <link href="{{asset('template/dist/css/tabler.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/tabler-flags.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/tabler-payments.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/tabler-vendors.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{asset('template/dist/css/demo.min.css?1674944402')}}" rel="stylesheet"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    @yield('styles')
    @yield('scripts')
</head>
<body>
    <div id="app">
        <div class="page page-center">
            <div class="container-tight py-4">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{asset('template/dist/libs/apexcharts/dist/apexcharts.min.js?1674944402')}}" defer></script>
    <script src="{{asset('template/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402')}}" defer></script>
    <script src="{{asset('template/dist/libs/jsvectormap/dist/maps/world.js?1674944402')}}" defer></script>
    <script src="{{asset('template/dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402')}}" defer></script>
    <!-- Tabler Core -->
    <script src="{{asset('template/dist/js/tabler.min.js?1674944402')}}" defer></script>
    <script src="{{asset('template/dist/js/demo.min.js?1674944402')}}" defer></script>
</body>
</html>
