@extends('plantilla.principal')

@section('title', 'Detalles')

@section('css')
    <link rel="stylesheet" href="/css/detalleColor.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
                @endcan
            @else
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
            @endif
            <a href="{{ url('/productos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/Asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
                @endcan
            @else
                <a href="{{ url('/Asesor') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
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
                <h3 class="text-success fw-bold mb-0"><i class="bi bi-shop me-2"></i> Asesor: {{$asesor->name}}</h3>
                <p class="lead text-muted">Se muestran los todos los datos del asesor</p>
            </div>
            <div class="col-lg-3 d-flex">
                {{-- <button class="btn btn-primary w-100 align-self-center">Nueva Empresa</button> --}}
                {{-- <div class="btn-group w-100 align-self-center btn-sm pt-0" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="success-outlined"><i class="bi bi-grid-3x2"></i></label>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="danger-outlined"><i class="bi bi-image"></i></label>
                </div> --}}
                <a href="/Asesor/ReporteI/{{$asesor->id}}" target="_blank" class="btn btn-primary w-100 align-self-center">
                    Descargar
                </a>
            </div>
        </div>
        <div class="">
            <div class="card">
                <div class="card-header bg-ligth text-dark fw-normal">Datos del Asesor</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4 col-lg-4 order-2 oder-md-1">
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Nombres y Apellidos:</p>
                                <p class="fw-light border-bottom">{{$asesor->name}}</p>
                            </div>
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Identificacion:</p>
                                <p class="fw-light border-bottom">{{$asesor->tipodocumento}}</p>        
                            </div>
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Nº de Identificación:</p>
                                <p class="fw-light border-bottom">{{$asesor->ndocumento}}</p>
                            </div>
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Distrito/Provincia/Departamento:</p>
                                <p class="fw-light border-bottom">{{$asesor->ubigeo->distrito.'/'.$asesor->ubigeo->provincia.'/'.$asesor->ubigeo->departamento}}</p>
    
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 order-3 order-md-2">
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Dirección:</p>
                                <p class="fw-light border-bottom">{{$asesor->direccion}}</p>
                            </div>
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Telefono:</p>
                                <p class="fw-light border-bottom">{{$asesor->telefono}}</p>
                            </div>
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Email:</p>
                                <p class="fw-light border-bottom">{{$asesor->email}}</p>
                            </div>
                            <div class="form-group mb-1">               
                                <p class="fw-normal">Estado:</p>
                                <p class="fw-light border-bottom">{{$asesor->estadouser}}</p>  
                            </div>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 order-1 order-md-3">
                            <div class="form-group mb-1"> 
                                <img for="uploadImage1" id="uploadPreview1" style="min-height: 330px; max-height: 50px; min-width: 300px; max-width: 50px" src="/public/userAsesor/{{$asesor->fotouser}}" />
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{$asesor->id}}">
                                    Actualizar contraseña
                                  </button>
                            </div>
                            @include('asesor.editpaswword')
                        </div>
                        
                        
                    </div>
                </div>
            </div>     
            <br> 
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        @if(session('info') == 'informacion')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ha Ocurrido un Error',
                text: 'Las Contraseñas no coinciden',
            timer: 4000
            })
        </script>
        @endif
   <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script>
            function previewImage(nb) {        
                var reader = new FileReader();         
                reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
                reader.onload = function (e) {             
                    document.getElementById('uploadPreview'+nb).src = e.target.result;         
                };     
            }
        </script>
@endsection