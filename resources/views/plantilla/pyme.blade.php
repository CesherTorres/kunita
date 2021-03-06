<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunaq-Mype | @yield('title')</title>
    <link rel="icon" href="/images/logo-kunaq.png">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
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
                        <div class="dropdown mb-2 mb-lg-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{-- <img src="/logos/{{Auth::user()->propietario->empresas->logoempresa}}" alt="Logo" class="me-2" style="width: 3.5rem;"> --}}
                                    <span class="fw-normal text-dark">{{ Auth::user()->propietario->empresas->razonsocial }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end border-4 borde-bottom-primary shadow" aria-labelledby="navbarDropdown" style="width: 300px">
                                    <li class="border-bottom pb-3">
                                        <div class=" py-2 mx-3 text-center">
                                            <img src="/logos/{{Auth::user()->propietario->empresas->logoempresa}}" class="rounded-circle border text-center mx-auto border-2 border-white shadow-sm" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                        <p class="text-muted text-center mb-0 px-auto">{{ Auth::user()->email }}</p>
                                    </li>
                                    <li class="py-2"><a class="dropdown-item" href="{{ url('/inicio') }}" target="blank"><i class="bi bi-shop me-2"></i>Ir a la tienda</a></li>
                                    <li class="py-2"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2"></i>Cerrar Sesi??n</a></li>
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
                <div class="row mx-2 mx-md-3 mx-lg-5 mt-5 text-center text-lg-start">
                    <div class="col-12 col-md-4 mt-3">
                        <h4 class="text-primary fw-bold lead text-uppercase">Contacto</h4>
                        <p class="fw-normal "><i class="fas fa-phone-volume fa-1x me-2"></i>922 009 301</p>
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <h4 class="text-primary fw-bold lead text-uppercase">Email</h4>
                        <p class="fw-normal "><i class="fas fa-envelope-open-text me-2"></i>marleniureta@kunaq.org.pe</p>
                    </div>
                    <div class="col-12 col-md-4 mt-3">
                        <h4 class="text-primary fw-bold lead text-uppercase">Direcci??n</h4>
                        <p class="fw-normal "><i class="fas fa-map-marker-alt me-2"></i>Lima / Sector 1, grupo 9, Manzana I, Lote 24 - Villa el Salvador</p>
                    </div>
                </div>
                <div class="container text-center" id="contenedor_icons">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/KunaqYachay/" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
                        <li><a href="https://api.whatsapp.com/send?phone=+51922009301" target="_blank"><i class="fab fa-whatsapp "></i></a></li>
                        <li><a href="https://www.instagram.com/kunaqyachay/" target="_blank"><i class="fab fa-instagram "></i></a></li>
                        <li><a href="https://twitter.com/KunaqYachay"><i class="fab fa-twitter "></i></a></li>
                    </ul>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-4 d-none d-md-block">
                            <small class="text-muted text-uppercase">Desarrollado Por <a href="https://cuanticagroup.com/welcome" class="text-decoration-none text-cuantica" target="_bank">Cuantica <span class="text-group text-capitalize">Group</span></a></small>
                        </div>
                        <div class="col-12 col-md-8 text-center text-md-end">
                            <span class="float-end">Copyright ?? <?php echo date("Y");?>  <a href="" class="text-decoration-none text-primary fw-bold" target="_bank">Kunaq</a> - Todos los derechos Reservados - <small class="">version 1.0 <small class="d-block d-md-none">Desarrollado por <a href="https://cuanticagroup.com/welcome" class="text-decoration-none text-cuantica">CUANTICA <span class="text-group text-capitalize">Group</span></a></small></small></span>
                        </div>
                        
                    </div>
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