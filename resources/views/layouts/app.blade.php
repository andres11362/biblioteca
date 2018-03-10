<!DOCTYPE html>
<html lang={{ app()->getLocale() }}>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('mdb/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{ asset('mdb/css/mdb.min.css')}}"rel="stylesheet">

    <link href="{{ asset('mdb/css/style.css')}}" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */

        main {
            padding-top: 3rem;
            padding-bottom: 2rem;
        }

        .widget-wrapper {
            padding-bottom: 2rem;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 2rem;
        }

        .extra-margins {
            margin-top: 1rem;
            margin-bottom: 2.5rem;
        }

        .divider-new {
            margin-top: 0;
        }

        .navbar {
            background-color: #414a5c;
        }

        footer.page-footer {
            background-color: #2bbbad;
            margin-top: 2rem;
        }

        .list-group-item.active {
            background-color: #afb3c0;
            border-color: #afb3c0;
        }

        .list-group-item:not(.active) {
            color: #222;
        }

        .list-group-item:not(.active):hover {
            color: #666;
        }

        .card {
            font-weight: 300;
        }

        .navbar .btn-group .dropdown-menu a:hover {
            color: #000 !important;
        }

        .navbar .btn-group .dropdown-menu a:active {
            color: #fff !important;
        }
    </style>
</head>

<body>

    <header>

        <!--Navbar-->
        <nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
                <a class="navbar-brand" href="{{ url('/')}}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                    @auth 
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link waves-effect waves-light" href="{{ url('home')}}">Inicio
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light" href="{{ url('/users')}}">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light" href="{{ url('/libros')}}">Libros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light" href="{{ url('/prestamos')}}">Prestamos</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Prestamo
                                </a>
                                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-3">
                                    <a class="dropdown-item waves-effect waves-light" href="{{ url('/prestamo')}}">Mis Prestamos</a>
                                    <a class="dropdown-item waves-effect waves-light" href="{{ url('/prestamo/create')}}">Nuevo prestamo</a>
                                    <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    @endauth
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="nav-link waves-effect waves-light" a href="{{ route('user.editData')}}">
                                        Editar mi usuario
                                    </a>
                                    <a class="nav-link waves-effect waves-light" a href="{{ route('user.editPassword')}}">
                                        Cambiar mi contraseña
                                    </a>
                                    <a class="dropdown-item waves-effect waves-light" href="{{ route('logout') }}"
                                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesion</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>          
                                </div>
                            </li>
                        @else    
                            <li class="nav-item">
                                <a class="nav-link waves-effect waves-light" a href="{{ route('login')}}">
                                   Login
                                </a>
                            </li>
                        @endauth 
                    </ul>
                </div>
            </nav>
        <!--/.Navbar-->

    </header>

    <main>

        <!--Main layout-->
        <div class="container">
            @yield('content')
        </div>
        <!--/.Main layout-->

    </main>

    <!--Footer-->
    <footer class="page-footer center-on-small-only">
        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2018 Copyright:
                <a href="https://www.facebook.com/andres1136"> Andrés Góngora </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->


    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('mdb/js/jquery-3.1.1.min.js') }}"></script>

    <!-- Bootstrap dropdown -->
    <script type="text/javascript"  src="{{ asset('mdb/js/popper.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"  src="{{ asset('mdb/js/bootstrap.min.js') }}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript"  src="{{ asset('mdb/js/mdb.min.js') }}"></script>
    

    <script>
        new WOW().init();
    </script>

    @yield('scripts')

</body>

</html>