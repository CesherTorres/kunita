@extends('plantilla.principal')

@section('title', 'Solicitud-Empresas')

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
            <a href="{{ url('/empresa_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            <a href="{{ url('/productos_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            <a class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
                <a href="{{ url('/solicitudesproductos_asesor') }}" class="text-white d-block p-3 mx-4"><i class="bi bi-arrow-down-square me-2"></i> Producto</a>
                <a href="{{ url('/solicitudesusuarios_asesor') }}" class="text-secondary d-block  fw-bold px-3 py-1 mx-4"><i class="bi bi-arrow-down-square me-2"></i> Usuario</a>

        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h3 class="text-success fw-bold mb-0"><i class="bi bi-building me-2"></i> Solicitud de empresa: {{$user->propietario->empresas->razonsocial}}</h3>
                <p class="lead text-muted">Revise la informacion de la empresa</p>
            </div>
            <div class="col-lg-3 d-flex">
                {{-- <button class="btn btn-primary w-100 align-self-center">Descargar</button> --}}
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-body">
               <div class="row">
                    <div class="col-md-3 col-sm-12 text-center">
                        <img width="auto" height="98px" src="/public/logos/{{$user->propietario->empresas->logoempresa}}" />
                    </div>
                    <div class="col-md-9 col-sm-12">
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
                            
                        </div>
                    </div>
               </div>

            </div>
        </div>
        <br>
        <form method="post" name="new_purchase" id="new_purchase" action="/solicitudesusuarios_asesor/{{$user->id}}">
        @csrf
        @method('put')
            <div class="card border border-warning border-3">
                <div class="card-body">
                    <div class="text-center">
                        <p class="fw-bolder lead">¿Ya revisaste la información?</p>
                        <p class="font-weight-light">Recuerda que tienes que comunicarte con el propietario de la empresa para informarle sobre el estado de su solicitud</p>
                        <div class="form-check form-check-inline lead me-5">
                            <input class="form-check-input" type="radio" name="estadouser" id="inlineRadio1" value="Activo">
                            <label class="form-check-label text-primary fw-bold" for="inlineRadio1">Aceptar solicitud</label>
                        </div>
                        <div class="form-check form-check-inline lead">
                            <input class="form-check-input" type="radio" name="estadouser" id="inlineRadio2" value="Inactivo">
                            <label class="form-check-label text-danger fw-bold" for="inlineRadio2">Rechazar solicitud</label>
                        </div>
                            
                    </div>
                </div> 
            </div>
            <br>
            <div class="form-group text-center">
                <a class="btn btn-outline-secondary btn-lg" href="{{ url('/solicitudesusuarios_asesor') }}" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
            </div>
        </form>
        <br>
    </div>
</section>
@endsection