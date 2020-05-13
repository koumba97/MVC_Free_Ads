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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>


<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <form class="search" action="search" method="get"><input type="search" name="search" placeholder="rechercher..." /> <input id="ok" type="submit" style="display:none;"/> <label for="ok"><i class="fas fa-search"></i></label></form>
                        <div class="faux_select">recherche par type
                            <div class="all_options">
                                <a href="/type/accesoire"><div class="option">accessoires</div></a>
                                <a href="/type/vetement"><div class="option">vêtements</div></a>
                                <a href="/type/chaussures"><div class="option">chaussures</div></a>
                                <a href="/type/beaute"><div class="option">beauté</div></a>
                                <a href="/type/contenant"><div class="option">contenant</div></a>
                                <a href="/type/meuble"><div class="option">meuble</div></a>
                                <a href="/type/bijoux"><div class="option">bijoux</div></a>
                                <a href="/type/livre"><div class="option">livres</div></a>
                                <a href="/type/jeux"><div class="option">jeux</div></a>
                                <a href="/type/electronique"><div class="option">électronique</div></a>
                                <a href="/type/autre"><div class="option">autre</div></a>
                            </div>
                        </div>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <li class="nav-item dropdown">
                                <?php $mini_picture= auth()->user()->profile_picture;?>
                                <a id="navbarDropdown" class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="mini_profil" style='background-image: url({{asset("images/profile_picture/$mini_picture")}});'></div><span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile.show', auth()->id()) }}">
                                        {{ __('Mon profil') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://kit.fontawesome.com/9b58f0fd79.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jQuery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>
