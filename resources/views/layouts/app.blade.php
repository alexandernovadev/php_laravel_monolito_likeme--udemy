<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Like ME</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm" style="background-color: #ffffff !important;">
            <div class="container">
                <a class="navbar-brand title__nav" href="{{ url('/') }}">
                    <img src="{{ asset('img/insta.png') }}" 
                    width="50" class="img-fluid mr-2 pointer "
                    alt="" > 
                    Like ME
                    </a>
                    <button class="navbar-toggler border" type="button" data-toggle="collapse" 
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    &#x2631;
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto nav__options mt-4" >
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                    <div class="row">
                                        <div class="col-1">
                                            <span class="material-icons" style="color: #ff697b">
                                            account_circle
                                            </span>
                                        </div>
                                        <div class="col-1">
                                            <a class="" href="{{ route('login') }}">
                                                {{ __('Login') }}</a>
                                        </div>
                                    </div>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <div class="row">
                                        <div class="col-1">
                                            <span class="material-icons" style="color: #ff697b">
                                            account_circle
                                            </span>
                                        </div>
                                        <div class="col-1">
                                            <a class="" href="{{ route('register') }}">
                                                Registrate</a>
                                        </div>
                                    </div>
                                 
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                               
                                    <div class="row">
                                        <div class="col-1">
                                            <span class="material-icons" style="color: #ff697b">
                                            account_circle
                                            </span>
                                        </div>
                                        <div class="col-1">
                                            <a class="" href="{{ route('image.create') }}">Postear</a>
                                        </div>
                                    </div>
                            </li>
                            <li class="nav-item">
                                <div class="row">
                                    <div class="col-1">
                                        <span class="material-icons" style="color: #ff697b">
                                            thumb_up
                                        </span>
                                    </div>
                                    <div class="col-1">
                                        <a class="" href="{{ route('likes') }}">LIKES</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <div class="row">
                                    <div class="col-1">
                                        <span class="material-icons" style="color: #ff697b">
                                        account_circle
                                        </span>
                                    </div>
                                    <div class="col-1">
                                        <a class="" href="{{ route('user.index') }}">Gente</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                &nbsp;
                            </li>
                            @if(Auth::user()->image)
                            <li class="nav-item">
                                <div class="avatar_mask">
                                    <img src="{{ route('user.avatar',['filename'=>Auth::user()->image])}}" 
                                     alt="Imagen Avatar user" class="img-fuid">
                                </div>
                            </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" 
                                href="#" role="button" data-toggle="dropdown" 
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" 
                                aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('profile',['id'=>Auth::user()->id]) }}">
                                        <span class="material-icons" style="color: #ff697b">
                                        account_circle
                                        </span>
                                        Mi Perfil
                                    </a>
                                </a>
                                <a class="dropdown-item" href="{{ route('config') }}">
                                    <span class="material-icons" style="color: #ff697b">
                                        construction
                                    </span>
                                    Configuracion
                                </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                      <span class="material-icons" style="color: #ff697b">
                                        forward
                                        </span>
                                        Cerrar Sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" 
                                          method="POST" style="display: none;">
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
</body>
</html>
