@extends('plantilla.pyme')

@section('title', 'Perfil Empresarial')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/css/icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

@endsection
 
@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
            </div>
        </div>
        <div class="user border-bottom">
            <div class="brand-link  brand-logo-primary navbar-primary mx-2 my-3">
                <img src="/public/logos/{{Auth::user()->propietario->empresas->logoempresa}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Noticia</a>
            <a href="{{ url('/perfil') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-building me-2 lead"></i> Perfil</a>
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
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success h2 fw-bold mb-0 text-uppercase"><i class="bi bi-building me-2"></i> Perfil</h1>
                <p class="text-muted">Se muestras los datos de la empresa</p>
            </div>
            <div class="col-lg-3 d-flex">
                
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
               <div class="row">
                    <div class="col-md-12 col-sm-12 text-center mb-2">
                        <img width="auto" height="220px" src="/public/logos/{{$user->propietario->empresas->logoempresa}}" />
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 col-sm-12">
                            <div class="text-start">
                                <p class="fw-bold text-uppercase">Datos del propietario</p>
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
                                <p class="fw-bold text-uppercase">Datos de la empresa</p>
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
        </div>
        <br>
        
    </div>
    <br>
</section>
@endsection
@section('foterRedes')
                <li><a href="{{$user->propietario->empresas->enlacefacebook}}" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
                <li><a href="{{$user->propietario->empresas->enlacewhatsapp}}" target="_blank"><i class="fab fa-whatsapp "></i></a></li>
                {{--<li><a href="{{Redes->propietario->empresas->enlacefacebook}}"><i class="fab fa-twitter "></i></a></li>--}}
                <li><a href="{{$user->propietario->empresas->enlaceinstagram}}" target="_blank"><i class="fab fa-instagram "></i></a></li>
                {{-- <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li> --}}
@endsection
@section('js')
        
@endsection