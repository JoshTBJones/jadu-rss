<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rss Demo</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rss.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#b01313">
    <meta name="msapplication-TileColor" content="#b01313">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <div id="app">
        <nav>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/feeds') }}">Feeds</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login/out') }}">Logout</a>
                </li>
            </ul>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
