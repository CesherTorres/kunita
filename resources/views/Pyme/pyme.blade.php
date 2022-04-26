@extends('plantilla.pyme')

@section('title', 'Noticias')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/icons.css">
    <link rel="stylesheet" type="text/css" href="/css/cardnoticia.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
            </div>
        </div>
        <div class="user border-bottom">
            <div class="brand-link  brand-logo-primary navbar-primary mx-2 my-3">
                <img src="/logos/{{Auth::user()->propietario->empresas->logoempresa}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem; height: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/pyme') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-newspaper me-2 lead"></i> Noticia</a>
            <a href="{{ url('/perfil') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Perfil</a>
            <a href="{{ url('/productos_pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/cobertura') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-truck me-2 lead"></i>Cobertura</a>
            <a href="{{ url('/pedidos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-box-seam me-2 lead"></i> Pedidos</a>
            <a href="{{ url('/ventas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-cash-coin me-2 lead"></i> Ventas</a>
            <a href="{{ url('/graficos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-symmetry-vertical me-2 lead"></i> Graficos</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid">
        <div class="row pt-3">
            <div class="col-lg-9 mt-3 mt-md-0">
                <h1 class="text-success h2 fw-bold mb-0 text-uppercase">Bienvenido Usuario {{Auth::user()->tipousuario->name_tipo_usuario}}</h1>
                <p class="text-muted">Revisa las ultimas novedades</p>
            </div>
            <div class="col-lg-3 d-flex">
                {{-- <button class="btn btn-primary w-100 align-self-center">Descargar Reporte</button> --}}
            </div>
        </div>
        {{-- <h2 align="center" class="mt-4 py-2 rounded text-white bg-warning">Anuncios recientes</h2>
        <div class="row">
            <div class="form-group col-md-5 col-sm-12 mb-1">
                <img src="/images/publcidad/publica1.jpg" style="border-radius: 8px;" alt="Logo" width="100%" height="100%">
            </div>
            <div class="form-group col-md-7 col-sm-12 mb-1">               
                <img src="/images/publcidad/publica5.jpg" style="border-radius: 8px;" alt="Logo" width="100%" height="100%">            
            </div>
        </div> --}}
        {{-- <br> --}}
        <h3 align="center" class="mt-4 py-2 rounded text-white bg-primary">Anuncios Recientes</h3>
        <div class="row">
            @forelse($publicidad as $pub)
                <div class="form-group col-md-6 col-sm-12 mb-1 mb-3">
                    <div class="blog-card h-100">
                        <div class="meta">
                            <div class="photo" style="background-image: url(/publicidad_img/{{ $pub->imagen }})"></div>
                            <ul class="details">
                                <li class="author"><i class="bi bi-person-fill me-2"></i>{{ $pub->propietario }}</li>
                                <li class="date"><i class="bi bi-phone-fill me-2"></i>{{ $pub->telefono }}</li>
                                <li class="tags"><i class="bi bi-envelope-fill me-2"></i>{{ $pub->correo }}</li>
                            </ul>
                        </div>
                        <div class="description">

                            <h1>{{ $pub->titulo }}</h1>

                            <h2>{{ $pub->tipo }}</h2>
                            <p> {{ $pub->descripcion }}</p>
                            <p class="read-more">
                                <a href="{{ $pub->enlace }}" target="_blank">Ir al sitio <i class="bi bi-arrow-right-circle-fill"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
            <div class="container-fluid">
                <nav class="mt-5 bg-white rounded-lg shadow-lg list-item" style="height: 130px">
                    <div class="p-4">
                        <p class="text-lg text-gray-700">No existe publicidad reciente</p>
                    </div>
                </nav>
            </div>
            @endforelse
        </div>
        
    </div>
    <br>
    
</section>
@endsection

@section('js')
        
@endsection