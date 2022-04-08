<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/rbc-app-icon.svg" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/extra.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/front.css')}}" rel="stylesheet">
</head>
        <main>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul>
                    <li><a href="#">Individual Clients</a></li>
                    <li><a href="#">Private Banking</a></li>
                    <li><a href="#">Companies</a></li>
                    <li><a href="#">Enterprises</a></li>
                    <div>
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </ul>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </nav>
            @yield('content')
        </main>
        <footer>
            
        </footer>
     <script src={{ asset("js/script.js") }} defer></script>
</body>
</html>
