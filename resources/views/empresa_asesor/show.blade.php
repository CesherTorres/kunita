@extends('plantilla.principal')

@section('title', 'Empresas')

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
            <a href="{{ url('/empresa_asesor') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            <a href="{{ url('/productos_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            <a href="{{ url('/solicitudesproductos_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-building me-2"></i> Empresas</h1>
                <p class="text-muted">Se muestran los detalles de la empresa</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a href='/AsesorpdfporEmpresa/{{$user->id}}' class="btn btn-primary w-100 align-self-center" target="blank">Descargar</a>
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
               <div class="row">
                    <img width="auto" height="400px" src="/public/logos/{{$user->propietario->empresas->logoempresa}}" />
                        <div class="card-body">
                            <div class="col-md-12 col-sm-12">
                                <div class="text-start">
                                    <p class="fw-bold lead border-bottom border-primary">Datos del propietario</p>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-normal">Nombres y Apellidos: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->name}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Identificación: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->tipodocumento.': '.$user->ndocumento}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-normal">Correo: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->email}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Telefono: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->telefono}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-normal">Estado: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->estadouser}}</p>
                                        </div>
                                    </div>
                                    <p class="fw-bold lead border-bottom border-primary">Datos de la empresa</p>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Razon social: </p>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->razonsocial}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Nro RUC: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->ruc}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Marca: </p>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->marca}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Giro: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->giro->namegiros}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Correo Empresa: </p>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->correoempresa}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Tel. Empresa: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->telefonoempresa}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-normal">Distrito/Provincia/Departamento: </p>
                                        </div>
                                        
                                            <div class="col-md-8 col-sm-12">
                                                <p class="fw-light border-bottom">{{$user->propietario->empresas->ubigeo->distrito.'/'.$user->propietario->empresas->ubigeo->provincia.'/'.$user->propietario->empresas->ubigeo->departamento}}</p>
                                            </div>                                  
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Direccion: </p>
                                        </div>
                                        <div class="col-md-5 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->direccion}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Cuenta bancaria: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->cuentabanco}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-normal">Nro cuenta: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->ncuentabanco}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Nro CCI: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->ncuentabancocci}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-normal">Billetera digital: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->billeteradigital}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Numero: </p>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->numerobilletera}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Url Facebook: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->enlacefacebook}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Url Whatsapp: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->enlaceinstagram}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Url Instagram: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->enlacewhatsapp}}</p>
                                        </div>
                                        <div class="col-md-2 col-sm-12">
                                            <p class="fw-normal">Asesor: </p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->user->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <p class="fw-normal">Descripcion: </p>
                                            <p class="fw-light border-bottom">{{$user->propietario->empresas->descripcion}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 mt-3">
                                            <div class="text-end">
                                                <button type="button" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}">
                                                    Actualizar contraseña
                                                </button>
                                            </div>
                                            @include('empresa_asesor.editpaswword')
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
               </div>

            </div>
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
@endsection