<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunaq | @yield('title')</title>
    <link rel="icon" href="/images/logo-kunaq.png">
    <link rel="stylesheet" href="/sass/custom.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    @yield('css')
</head>
<body class="">
    <div class="d-flex">          
        @yield('aside')
        <div class="w-100">
        <!-- Navbar -->
        <nav class="navbar navbar-light bg-white shadow-sm fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-sm btn-outline-primary mx-1 my-1" target="_blank" href="{{ url('/inicio') }}" role="button"><i class="bi bi-shop me-2"></i> Tienda</a>
                    </div>
                    <div class="col">
                        <div class="dropdown mb-2 mb-lg-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <!--<img src="/userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 1.5rem;">-->
                                    <span class="fw-normal text-dark">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li> --}}
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </nav>
        <!-- Fin Navbar -->

        <div class="bg-light pt-5" id="content">
            @yield('content')
        </div>
    </div>
    
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/validacionesinput.js"></script>
@stack('script')
@yield('js')
</body>
</html>