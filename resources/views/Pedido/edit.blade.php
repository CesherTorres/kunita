@extends('plantilla.pyme')

@section('title', 'Pedidos')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/public/css/icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/public/images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
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
            <a href="{{ url('/perfil') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Perfil</a>
            <a href="{{ url('/productos_pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/cobertura') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-truck me-2 lead"></i>Cobertura</a>
            <a href="{{ url('/pedidos') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-box-seam me-2 lead"></i> Pedidos</a>
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
                <h1 class="text-success text-uppercase h2 fw-bold mb-0"><i class="bi bi-cash-coin me-2"></i>pedido - {{$pedido->id}}</h1>
                <p class="text-muted">Se muestra el detalle del Pedido</p>
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
                
                    <div class="row">
                        <div class=" col-md-4 col-sm-12 form-group"> 
                            <img src="/public/logos/{{Auth::user()->propietario->empresas->logoempresa}}" style="width:200px; height:auto;" class="mx-auto d-block float-left" alt="...">   
                        </div>
                        <div class=" col-md-4 col-sm-12 text-center text-dark mt-0 mt-md-3 mt-lg-5">
                            <h2 class="text-center">{{ Auth::user()->propietario->empresas->razonsocial }}</h2>
                            <p class="">RUC: {{ Auth::user()->propietario->empresas->ruc }}</p>
                        </div>
                        <div class=" col-md-4 col-sm-12 form-group text-right">
                            <div class="row">
                                <div class="col-md-6 text-start text-md-end">
                                    <p class="fw-normal">Fecha:</p>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <p class="fw-light">{{$pedido->created_at}}</p>     
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-start text-md-end">
                                    <p class="fw-normal">Fecha de entrega:</p>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <p class="fw-light">{{$pedido->fecha_hora}}</p>     
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr> 
                    <p class="fw-bold">Datos del cliente</p>
                    <div class="row my-2">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Cliente:</p>
                                <p class="fw-light border-bottom">{{$pedido->namecliente}}</p> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Tipo Identificación:</p>
                                <p class="fw-light border-bottom">{{$pedido->tipodocumento}}</p>          
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Nro Identificación:</p>
                                <p class="fw-light border-bottom">{{$pedido->ndocumento}}</p>    
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Telefono:</p>
                                <p class="fw-light border-bottom">{{$pedido->celular}}</p>     
                            </div>
                        </div>
                    </div> 
                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Cobertura:</p>
                                <p class="fw-light border-bottom">{{$pedido->cobertura->ubigeos->departamento.'/'.$pedido->cobertura->ubigeos->provincia.'/'.$pedido->cobertura->ubigeos->distrito}}</p> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Dirección:</p>
                                <p class="fw-light border-bottom">{{$pedido->direccion}}</p> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Referencia:</p>
                                <p class="fw-light border-bottom">{{$pedido->referencia}}</p> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <p class="fw-normal">Correo:</p>
                                <p class="fw-light border-bottom">{{$pedido->correo}}</p> 
                            </div>
                        </div>
                    </div>
                    <p class="fw-bold">Detalles de la venta</p>
                    <br>
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
                                    @foreach($detallepedido as $detalle)
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
                    
                    <div class="text-start">                        
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label for="subtotal" class="form-label text-end fw-light h5">Precio de envio</label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <h5 class="fw-light" id="total">S/. {{$pedido->cobertura->precioenvio}}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <label for="subtotal" class="form-label text-end fw-light h5">Total de pedido</label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <h5 class="fw-light" id="total">S/. {{$pedido->total}}</h5>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="text-end">                        
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-sm-12">
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <label for="subtotal" class="form-label text-end fw-bold  h3">Total</label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <h3 class="fw-bold" id="total">S/. {{$pedido->total+$pedido->cobertura->precioenvio}}</h3>
                            </div>
                        </div>
                    </div>
                    
            </div>
            
        </div>
        <form method="post" name="new_purchase" id="new_purchase" action="/pedidos/{{$pedido->id}}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="estado" value="Cerrada">
            <input type="hidden" name="total" value="{{$pedido->total+$pedido->cobertura->precioenvio}}">
            <div class="container form-group text-end pb-5">
                <a class="btn btn-outline-secondary btn-lg" href="{{ url('/pedidos') }}" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg">Cerrar venta</button>
            </div>
        </form>
    
    </div>
    <br>
</section>
@endsection
@section('foterRedes')
                <li><a href="{{$redes->propietario->empresas->enlacefacebook}}" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
                <li><a href="{{$redes->propietario->empresas->enlacewhatsapp}}" target="_blank"><i class="fab fa-whatsapp "></i></a></li>
                {{--<li><a href="{{Redes->propietario->empresas->enlacefacebook}}"><i class="fab fa-twitter "></i></a></li>--}}
                <li><a href="{{$redes->propietario->empresas->enlaceinstagram}}" target="_blank"><i class="fab fa-instagram "></i></a></li>
                {{-- <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li> --}}
@endsection
@section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
            <!-- extension responsive -->
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>       
@endsection