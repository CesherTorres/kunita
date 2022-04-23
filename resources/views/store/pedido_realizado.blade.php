@extends('plantilla.store')

@section('title', 'Carrito de Compra')

@section('css')
<link rel="stylesheet" type="text/css" href="/cart/animate.css">
<link rel="stylesheet" type="text/css" href="/cart/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/cart/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/cart/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="/cart/chosen.min.css">
<link rel="stylesheet" type="text/css" href="/cart/style.css">
<link rel="stylesheet" type="text/css" href="/cart/color-01.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
	{{--  --}}
	 <!-- barra de navegacion -->
     <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
            <div class="container">
                <img src="images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 10rem;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            	<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form action="{{ route('buscar')}}" class="d-flex mt-3 mt-lg-0 col-12 col-md-12 col-lg-6" autocomplete="off">
                        <div class="input-group">
                            <input class="form-control border border-primary" name="buscarpor" type="search" placeholder="Escribe algo" aria-label="Search">
                            <button class="btn btn-primary fw-bold" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
					<ul class="navbar-nav mb-2 mb-lg-0">
						<li class="nav-item mx-lg-3">
							<button class="btn btn-secondary d-flex fw-bold mt-3 mt-lg-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Categorías <i class="bi bi-list px-2"></i></button>
						</li>
					</ul>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex  justify-content-center">
                        <li class="nav-item me-3">
							<a class="nav-link fw-bolder fs-5" href="{{ url('/tienditas') }}">Inicio</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link fw-bolder fs-5" href="{{ url('/empresas-asociadas') }}">Empresas</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link fw-bolder fs-5" href="{{ url('/logueando') }}" target="bank"><i class="bi bi-person-fill h4"></i></a>
						</li>
                        <li class="nav-item">
							<div class="">
									<a class="btn btn-warning position-relative text-white fw-bold" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" href="{{ url('/carritoIndex') }}"><i class="bi bi-cart-plus-fill h3"></i>
										<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
											{{ \Cart::getTotalQuantity()}}
										</span>

									</a>
									<ul class="dropdown-menu dropdown-menu-lg-end" style="margin: 10px;width: 400px;" aria-labelledby="dropdownMenuButton">
											@include('partials.cart-drop')
									</ul>
							</div>
                        </li>
                    </ul>
              	</div>
            </div>
        </nav>
    </header>
    <!-- fin barra de navegacion -->
	<!-- offcanvas start -->
	<div class="offcanvas offcanvas-start sidebar-nav shadow" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
		<div class="offcanvas-header">
		  <h5 class="offcanvas-title float-center fw-bold" id="offcanvasScrollingLabel">CATEGORÍAS</h5>
		  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body px-0">
			<div class="accordion accordion-flush text-primary" id="categorias">
                @foreach ($categorias as $categoria)
					<div class="accordion-item">
						<h6 class="accordion-header" id="{{str_replace(' ', '',$categoria->namecategoria)}}-h">
						<button class="accordion-button collapsed fw-lighter" type="button" data-bs-toggle="collapse" data-bs-target="#{{str_replace(' ', '',$categoria->namecategoria)}}" aria-expanded="false" aria-controls="Subcategoria">
							{{$categoria->namecategoria}} 
						</button>
						</h6>
						<div id="{{str_replace(' ', '',$categoria->namecategoria)}}" class="accordion-collapse collapse" aria-labelledby="{{str_replace(' ', '',$categoria->namecategoria)}}-h" data-bs-parent="#categorias">
                            <div class="accordion-body px-0 py-0">
                                <div class="sub">
                                    <ul class="navbar-nav ps-3 mx-3 my-0">
                                        <li>
                                        @foreach($categoria->subcategoria as $subcategorias)
                                            <a href="{{route('sub.show', $subcategorias)}}" class="nav-link my-2" style="cursor-pointer; hover:text-orange capitalize">
                                                <span class="text-dark fw-lighter">{{$subcategorias->namesubcategoria}}</span>
                                            </a>
                                        @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>
						</div>
					</div>          
                @endforeach
			</div>
		</div>

	</div>
	<!-- offcanvas end --><br><br>

<div class="container">
    <div class="wrap-iten-in-cart">
        <div class="row pt-5">
                <div align="center" class="pb-5">
                <div class="card my-2 mb-2">
                    <h5 class="card-header bg-danger text-white">Su Pedido se realizo satisfactoriamente, las empresas donde a solicitado el producto se comunicaran con usted por correo y telefono</h5>
                    <div class="card-body">
                        <h5 class="card-title"><h3 class="box-title">Productos agregados</h3><hr></h5>
                        <table id="tcategorias" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">Empresa</th>
                                    <th class="h6">Contacto</th>
                                    <th class="h6">Producto</th>
                                    <th class="h6">Fecha de Entrega</th>
                                    <th class="h6">Cantidad</th>
                                    <th class="h6">P.Unitario</th>
                                    <th class="h6">Sub. Total</th>
                                </tr>
                            </thead>

                                <tbody>
                                    @foreach(\Cart::getContent() as $item)

                                        <tr>
                                            <td class="font-weight-light">{{$item->razonsocial}}</td>
                                            <td class="font-weight-light">{{$item->name}}</td>
                                            <td class="font-weight-light">{{$item->name}}</td>
                                            <td class="font-weight-light">{{$item->diasestimados}}</td>
                                            <td class="font-weight-light">{{$item->quantity}}</td>
                                            <td class="font-weight-light">{{$item->price}}</td>
                                            <td class="font-weight-light">{{$item->price}}</td>
                                        </tr>
                                    @endforeach												

                                </tbody>  
                        </table>
                        <br>
                        <h5 class="card-title"><h3 class="box-title">Metodo de Pago de las Empresas</h3><hr></h5>
                        <div class="row">
                            <div class="row">
                                <div class="col-12 col-md-2 fw-bold">
                                        <u><h4>Empresa</h4></u>                                        
                                </div>
                                <div class="col-12 col-md-4 fw-bold">
                                        <u><h4>Medio de Pago</h4></u>                                        
                                </div>
                                <div class="col-12 col-md-1 fw-bold">
                                        <u><h4>Envio</h4></u>                                        
                                </div>
                                <div class="col-12 col-md-3 fw-bold">
                                        <u><h4>Total Por Compañia</h4></u>                                        
                                </div>
                                <div class="col-12 col-md-2 pt-4 text-warning">
                                        <h4 class="fw-bold">Total a Pagar</h4>
                                </div>
                            </div>
                            @foreach(\Cart::getContent() as $item)
                            <div class="row">
                                <div class="col-12 col-md-2 fw-bold">
                                        <div class="col-12 col-md-12 my-2"><h5>{{$item->razonsocial}}</h5></div>
                                </div>
                                <div class="col-12 col-md-4 fw-bold">
                                        <div class="col-12 col-md-12"><h5>BCP-1212313123123</h5></div>
                                        
                                </div>
                                <div class="col-12 col-md-1 fw-bold">
                                        <div class="col-12 col-md-12"><h5>S/30</h5></div>
                                        
                                </div>
                                <div class="col-12 col-md-3 fw-bold">
                                        <div class="col-12 col-md-12"><h5>S/{{$item->price}}</h5></div>
                                        
                                </div>
                            </div>
                            @endforeach												
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/cartjs/jquery-1.12.4.minb8ff.js?ver=1.12.4"></script>
	<script src="/cartjs/bootstrap.min.js"></script>
	<script src="/cartjs/chosen.jquery.min.js"></script>
	<script src="/cartjs/owl.carousel.min.js"></script>
	<script src="/cartjs/jquery.sticky.js"></script>
	<script src="/cartjs/functions.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
@endsection
