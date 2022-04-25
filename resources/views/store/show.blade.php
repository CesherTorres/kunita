@extends('plantilla.store')

@section('title', 'Tienda')


@section('content')
<header class=" mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <img src="/public/images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 10rem;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex  justify-content-center">
                    <li class="nav-item me-3">
                        <a class="nav-link fw-bolder fs-5" href="{{ url('/inicio') }}">Inicio</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link fw-bolder fs-5" href="{{ url('/empresas-asociadas') }}">Empresas</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link fw-bolder fs-5" href="{{ url('/logueando') }}" target="bank"><i class="bi bi-person-fill h4"></i></a>
                    </li>
                </ul>
              </div>
        </div>
    </nav>
</header>

<section>
    <div class="container pt-5">
        <div class="alert alert-warning" role="alert">
            Su Pedido se realizo satisfactoriamente, las empresas donde a solicitado el producto se comunicaran con usted por correo y telefono
        </div>
        <div class="card border-primary shadow-sm mb-3">
            <div class="card-body">
                <h5 class="fw-bold">Detalles del pedido</h5>
                <hr>
                <div class="row my-3">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Cliente:</p>
                            <p class="fw-light border-bottom">{{$venta->namecliente}}</p> 
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Tipo Identificación:</p>
                            <p class="fw-light border-bottom">{{$venta->tipodocumento}}</p>          
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Nro Identificación:</p>
                            <p class="fw-light border-bottom">{{$venta->ndocumento}}</p>    
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Telefono:</p>
                            <p class="fw-light border-bottom">{{$venta->celular}}</p>     
                        </div>
                    </div>
                </div> 
                <div class="row mb-5">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Cobertura:</p>
                            <p class="fw-light border-bottom">{{$venta->cobertura->ubigeos->departamento.'/'.$venta->cobertura->ubigeos->provincia.'/'.$venta->cobertura->ubigeos->distrito}}</p> 
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Dirección:</p>
                            <p class="fw-light border-bottom">{{$venta->direccion}}</p> 
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Referencia:</p>
                            <p class="fw-light border-bottom">{{$venta->referencia}}</p> 
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="form-group">               
                            <p class="fw-normal">Correo:</p>
                            <p class="fw-light border-bottom">{{$venta->correo}}</p> 
                        </div>
                    </div>
                </div>

                {{-- fin_agregar_productos --}}
                <div class="table-responsive">
                    <table id="detalles" class="table table-sm h-100">
                        <thead class="bg-light">
                            <tr>
                                <th class="h6">Producto</th>
                                <th class="h6">Cantidad</th>
                                <th class="h6">Precio</th>
                                <th class="h6">SubTotal</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($detalleventa as $detalle)
                                <tr>
                                    <td class="font-weight-light">{{$detalle->nameproducto}}</td>
                                    <td class="font-weight-light">{{$detalle->cantidad}}</td>
                                    <td class="font-weight-light">{{$detalle->precio}}</td>
                                    <td class="font-weight-light">{{$detalle->cantidad*$detalle->precio}}</td>
                                </tr>
                                @endforeach
                            </tbody>       
                    </table>
                </div>
                {{-- fin_tabla_detalles_productos --}}
                <br>

                <h5 class="fw-bold">Método de pago</h5>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <p class="fw-bolder">Empresa</p>
                        {{$venta->empresa->razonsocial}}
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <p class="fw-bolder">Nro de Contacto</p>
                        {{$venta->celular}}
                    </div>
                    <div class="col-12 col-md-4 col-lg-3">
                        <p class="fw-bolder">Medio de pago</p> 
                        {{$venta->empresa->cuentabanco.': '.$venta->empresa->ncuentabanco}}
                        <p>CCI: {{$venta->empresa->ncuentabancocci}}</p>
                        {{$venta->empresa->billeteradigital.': '.$venta->empresa->numerobilletera}}
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <p class="fw-bolder">Costo de envío</p>
                        {{$venta->precio_envio}} 
                    </div>
                    <div class="col-12 col-md-4 col-lg-2">
                        <p class="fw-bolder">Total de pedido</p> 
                        {{$venta->total}}
                    </div>
                </div>

                <br>
                <div class="text-end">                        
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12">
                            <label for="subtotal" class="form-label text-end h3">Total</label>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <h3 class="font-weight-light" id="total">S/. {{$venta->total+$venta->precio_envio}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 d-flex my-3">
                <a class="btn btn-danger w-100 align-self-center" id="downloadPdf" href="/imprimirventaCliente/{{$venta->id}}" target="blank">Descargar Comprobante</a>
            </div>
        </div>
    </div>
</section>
@endsection
