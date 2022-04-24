@extends('plantilla.principal')

@section('title', 'Publicidad')

@section('css')
   
@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/images/kunaq-white.png" alt="Logo" class="me-2 my-1" style="width: 8rem;">
            </div>
        </div>
        <div class="user border-bottom">
            <div class="brand-link  brand-logo-primary navbar-primary mx-2 my-3">
                <img src="/public/userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/home') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/publicidad') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
                @endcan
            @else
                    <a href="{{ url('/publicidad') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
            @endif
            <a href="{{ url('/productos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/Asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
                @endcan
            @else
                <a href="{{ url('/Asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
            @endif
            <a href="{{ url('/solicitudesproductos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-newspaper me-2"></i> Publicidad</h1>
                <p class="text-muted">Se muestra el detalle de la publicidad</p>
            </div>
            <div class="col-lg-3 d-flex">
                {{-- <button class="btn btn-primary w-100 align-self-center">Descargar</button> --}}
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
                <img width="auto" height="300px" src="/public/publicidad_img/{{$publicidad->imagen}}" />
                <div class="card-body">
                    <h5 class="card-title"><p class="fw-bold lead border-bottom border-primary">Datos de la publicidad</p></h5>
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <p class="fw-normal">Propietario: </p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="fw-light border-bottom">{{$publicidad->propietario}}</p>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <p class="fw-normal">Titulo: </p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="fw-light border-bottom">{{$publicidad->titulo}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <p class="fw-normal">Tipo: </p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="fw-light border-bottom">{{$publicidad->tipo}}</p>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <p class="fw-normal">Correo: </p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="fw-light border-bottom">{{$publicidad->correo}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <p class="fw-normal">Telefono: </p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="fw-light border-bottom">{{$publicidad->telefono}}</p>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <p class="fw-normal">Enlace: </p>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <p class="fw-light border-bottom">{{$publicidad->enlace}}</p>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-2 col-sm-12">
                            <p class="fw-normal">Descripción: </p>
                        </div>
                        <div class="col-md-10 col-sm-12">
                            <p class="fw-light border-bottom">{{$publicidad->descripcion}}</p>
                        </div>
                    </div> 
                </div>
        </div>
    </div>
</section>
@endsection

@section('js')
       
    @endsection