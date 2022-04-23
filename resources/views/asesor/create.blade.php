@extends('plantilla.principal')

@section('title', 'Crear Asesor')

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
                <h3 class="text-success fw-bold mb-0"><i class="bi bi-shop me-2"></i> Nuevo Asesor</h3>
                <p class="lead text-muted">Registra un nuevo asesor para las empresas</p>
            </div>
            <div class="col-lg-3 d-flex">
                {{-- <button class="btn btn-primary w-100 align-self-center">Nueva Empresa</button> --}}
                {{-- <div class="btn-group w-100 align-self-center btn-sm pt-0" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="success-outlined"><i class="bi bi-grid-3x2"></i></label>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="danger-outlined"><i class="bi bi-image"></i></label>
                </div> --}}
            </div>
        </div>
        <p class="text-muted text-start">(*) - Campos obligatorios</p>
        @if($message = Session::get('errors'))
            <div class="alert alert-danger">
                <ul>
                <p>¡Algo salió mal!</p>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                </ul>
            </div>
        @endif
        <div class="">
            <form method="post" action="/Asesor" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header bg-primary text-white fw-normal">Datos del Asesor</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4 order-2 oder-md-1">
                                 <div class="form-group mb-1">               
                                    <label for="name" class="form-label">Nombres y Apellidos(*))</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">            
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="tipodocumento" class="form-label">Identificacion(*)</label>
                                    <select class="form-select form-select-sm" name="tipodocumento" id="tipodocumento" required>
                                        <option value="" disabled="disabled" selected="selected" hidden="hidden"></option>
                                        <option value="Pasaporte">Pasaporte</option> 
                                        <option value="Visa">Visa</option>
                                        <option value="Carta Andina">Carta Andina</option>
                                        <option value="Carnet de Extranjeria">Carnet de Extranjeria</option>
                                        <option value="PTP">PTP</option> 
                                        <option value="DNI">DNI</option>   
                                    </select>            
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="ndocumento" class="form-label">Nroº de Identificación(*)</label>
                                    <input type="text" name="ndocumento" id="ndocumento" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="12">            
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="ubigeo_id" class="form-label">Distrito/Provincia/Departamento(*)</label>
                                    <select class="form-select form-select-sm js-example-basic-single" name="ubigeo_id" id="ubigeo_id" required>
                                        <option value="" disabled="disabled" selected="selected" hidden="hidden"></option>
                                        @foreach($ubigeo as $ub)
                                        <option value="{{$ub->id}}">{{$ub->distrito. ', '.$ub->provincia. ', '.$ub->departamento}}</option>
                                        @endforeach
                                    </select>            
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 order-3 order-md-2">
                                <div class="form-group mb-1">               
                                    <label for="direccion" class="form-label">Dirección(*)</label>
                                    <input type="text" name="direccion" id="direccion" class="form-control form-control-sm" required maxLength="40">            
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="telefono" class="form-label">Telefono(*)</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9"> 
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="email" class="form-label">Email(*)</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-sm"  required maxLength="50">            
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="password" class="form-label">Contraseña(*)</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-sm"  required onkeypress="return sololetrasynumeros(event)" onpaste="return false" maxLength="16"> 
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="confirmpassword" class="form-label">Confirmar Contraseña(*)</label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-control-sm" required onkeypress="return sololetrasynumeros(event)" onpaste="return false" maxLength="16"> 
                                </div>
                                <span id='message'></span>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 order-1 order-md-3">
                                <div class="form-group mb-1">
                                    <label for="uploadImage1" class="font-weight-light mb-0">
                                        <img for="uploadImage1" id="uploadPreview1" style="min-height: 330px; max-height: 50px; min-width: 300px; max-width: 50px" src="/images/asesorup.png" />
                                    </label>
                                    <input id="uploadImage1" class="form-control-file" type="file" name="fotouser" onchange="previewImage(1);" hidden required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>     
                <br>
                <div class="form-group text-center">
                    <a class="btn btn-outline-secondary btn-lg" href="{{ url('/Asesor') }}" role="button">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg">Agregar Asesor</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script>
        $('#password, #confirmpassword').on('keyup', function () {
    if ($('#password').val() == $('#confirmpassword').val()) {
        $('#message').html('CORRECTO').css('color', 'green');
    } else 
        $('#message').html('LAS CONTRASEÑA NO COINCIDEN').css('color', 'red');
});
    </script>
   <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
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