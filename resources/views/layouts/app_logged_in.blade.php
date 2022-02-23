<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Organizer') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/aac533ff8d.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @if(request()->routeIs('calendar'))
        <link rel="stylesheet" href="{{ asset('css/calendarUI.css') }}">
        <script src="{{ asset('js/calendarUI.js') }}"></script>
    @endif
</head>
<body class="bg-light" style="margin-left: 4.5rem">
<div id="app">
    @include('components.headers.logged_in_header')

    @yield('content')
</div>

@include('components.footer')
</body>
</html>
