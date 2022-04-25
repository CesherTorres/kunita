<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunaq-Mype | @yield('title')</title>
    <link rel="icon" href="/images/logo-kunaq.png">
    <link rel="stylesheet" type="text/css" href="/public/css/footer.css">
    <link rel="stylesheet" href="/sass/custom.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    @yield('css')
</head>
<body class="" oncontextmenu= "return false">
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
                        <a class="btn btn-sm btn-outline-primary mx-1 my-1" target="_blank" href="{{ url('/inicio') }}" role="button"><i class="bi bi-shop"></i></a>
                    </div>
                    <div class="col">
                        <div class="dropdown mb-2 mb-lg-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{-- <img src="/logos/{{Auth::user()->propietario->empresas->logoempresa}}" alt="Logo" class="me-2" style="width: 3.5rem;"> --}}
                                    <span class="fw-normal text-dark">{{ Auth::user()->propietario->empresas->razonsocial }}</span>
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
        </nav>
        <!-- Fin Navbar -->

        <div class="bg-light pt-5" id="content">
            @yield('content')
            <!-- footer -->
            <footer class="">
        <div class="container__footer" align="center">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="box__fotter">
                            <h4 class="text-primary fw-bold lead"><i class="fas fa-phone-volume fa-1x me-2"></i>Contacto:</h4>
                            <p class="fw-bolder lead">968370868/945949674</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="box__fotter">
                            <h4 class="text-primary fw-bold lead"><i class="fas fa-envelope-open-text me-2"></i>Email:</h4>
                            <p class="fw-bolder lead">marcos@cuanticagroup.com</p>
                        </div> 
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="box__fotter">
                            <h4 class="text-primary fw-bold lead"><i class="fas fa-map-marker-alt me-2"></i>Direccion:</h4>
                            <p class="fw-bolder lead">Jr. Irribarren 1148 4to Piso N 4 - Surquillo - Lima</p>
                        </div>
                    </div>
                </div>
                
        </div>
        <br>
        <div class="container text-center" id="contenedor_icons">
            <ul class="social-icons">
                @yield('foterRedes')
            </ul>
        </div>
        <div class="container" align="center">
            <p>Copyright <?php echo date("Y");?> | Desarrollado por Cuantica Group</p>
        </div>
    </footer>
    <!-- fin footer -->
        </div>
        
            
    </div>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/chart.min.js"></script>
    <script src="/js/validacionesinput.js"></script>
@yield('js')
@stack('scripts')
</body>
</html>