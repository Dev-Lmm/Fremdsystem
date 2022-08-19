<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('tittle')</title>
    <!-- Icon -->
    <link rel="icon" href="assets/img/logos/logo-icon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/menu.css?v=26.07.22a">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    <script defer src="assets/js/menu.js?v=26.07.22c"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="assets/img/logos/logo-navbar.png" alt="">
            </div>
            <span class="logo_name">Fremdsystem</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li><a href="/home">
                            <i class="uil uil-estate"></i>
                            <span class="link-name">Dahsboard</span>
                        </a>
                    </li>
                    <li><a href="{{ route('courses') }}">
                            <i class="uil uil-books"></i>
                            <span class="link-name">Cursos</span>
                        </a>
                    </li>
                    <li><a href="{{ route('inscripcion') }}">
                            <i class="uil uil-books"></i>
                            <span class="link-name">Mis Cursos</span>
                        </a>
                    </li>
                    <li><a href="{{ route('schedule') }}">
                            <i class="uil uil-schedule"></i>
                            <span class="link-name">Horario</span>
                        </a>
                    </li>
                    <li><a href="{{ route('homework') }}">
                            <i class="uil uil-book-alt"></i>
                            <span class="link-name">Tareas</span>
                        </a></li>
                    @can('courses')
                        <li><a href="{{ route('user.files.index') }}">
                                <i class="uil uil-setting"></i>
                                <span class="link-name">Mis Archivos</span>
                            </a>
                        </li>
                    @endcan
                    <li><a href="{{ route('exam') }}">
                            <i class="uil uil-file-exclamation-alt"></i>
                            <span class="link-name">Examen</span>
                        </a>
                    </li>
                    <li><a href="{{ route('qualify') }}">
                            <i class="uil uil-graph-bar"></i>
                            <span class="link-name">Calificaciones</span>
                        </a>
                    </li>
                    <li><a href="{{ route('setting') }}">
                            <i class="uil uil-setting"></i>
                            <span class="link-name">Setting</span>
                        </a>
                    </li>
                </ul>
                <ul class="logout-mode">
                    <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="uil uil-signout"></i>
                            <span class="link-name">{{ __('Desconectarse') }}</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                            </form>
                        </a>
                    </li>
                    <li class="mode">
                        <a href="#">
                            <i class="uil uil-moon"></i>
                            <span class="link-name">Dark Mode</span>
                        </a>
                        <div class="mode-toggle">
                            <span class="switch"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <section class="dashboard">
            <div class="top">
                <i class="uil uil-bars sidebar-toggle"></i>
                <div class="search-box">
                    <i class="uil uil-search"></i>
                    <input type="text" placeholder="Search here...">
                </div>
                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a>
                <img src="assets/img/login/user.png" alt="">
            </div>
        @endguest
        @yield('content')
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    </section>

</body>

</html>
