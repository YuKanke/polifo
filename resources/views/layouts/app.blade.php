<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- 自作Jquery用のJquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>

<body>


    <header class="site-header">
        <div class="site-branding">
            <h1 class="site-title"><a href="index.html" rel="home"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a></h1>
        </div><!-- .site-branding -->

        <div class="hamburger-menu">
            <div class="menu-icon">
                <img src="{{ asset('images/menu-icon.png') }}" alt="menu icon">
            </div><!-- .menu-icon -->

            <div class="menu-close-icon">
                <img src="{{ asset('images/x.png') }}" alt="menu close icon">
            </div><!-- .menu-close-icon -->
        </div><!-- .hamburger-menu -->
    </header><!-- .site-header -->

    <nav class="site-navigation flex flex-column justify-content-between">
        <div class="site-branding d-none d-lg-block ">
            <h1 class="site-title"><a href="index.html" rel="home"><img src="{{ asset('images/logo2.png') }}" alt="Logo"></a></h1>
        </div><!-- .site-branding -->

        <ul class="main-menu flex flex-column justify-content-center">
            <li class="current-menu-item"><a href="home">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="list">Portfolio</a></li>
            @guest
                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @endif
            @else
                <li><a href="/setting">MyPage</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
            <li><a href="#">Contact</a></li>
        </ul>

        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>


        <div class="social-profiles">
            <ul class="flex justify-content-start justify-content-lg-center align-items-center">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div><!-- .social-profiles -->
    </nav><!-- .site-navigation -->


    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <!-- JQuery -->
    <script type='text/javascript' src="{{ asset('js/jquery.js') }}"></script>
    <script type='text/javascript' src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
