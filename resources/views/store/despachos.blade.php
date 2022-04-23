@extends('plantilla.store')

@section('title', 'Tienda')

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
	<!-- offcanvas end -->
    <br>
    <div class="container my-5 h-20">
        <br>
        <div class="row">
            <div class="form-group col-md-12 col-sm-12 mb-1">    
                <div class="card" style="border-radius:10px;">
                    <div class="card-body bg-primary" style="border-radius:10px;">
                        <div class="row">
                            <div class="col col-md-6 text-white">
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <label for="direccion" class="form-label">Nombre y Apellido:</label>
                                    <input type="text" name="nombres" id="nombres" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">           
                                </div>
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <label for="direccion" class="form-label">Correo Electronico:</label>
                                    <input type="text" name="correos" id="correos" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">           
                                </div>
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <label for="direccion" class="form-label">Tipo de Documento:</label>
                                    <input type="text" name="Tdocumentos" id="Tdocumentos" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">           
                                </div>
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <label for="direccion" class="form-label">Nro de Documento:</label>
                                    <input type="text" name="Ndocumentos" id="Ndocumentos" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">           
                                </div>
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <label for="direccion" class="form-label">Telefono:</label>
                                    <input type="text" name="telefonos" id="telefonos" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">           
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group col-md-6 col-sm-12 mb-1">               
                                    <img src="images/shopping.png" style="background-color:yellow;width: 525px; height: 290px" />
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 mb-1">               
                                        <a href="realizado" class="btn btn-warning container-fluid text-white fw-bold">Siguiente <i class="bi bi-arrow-right-circle-fill"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<!--sweet alert agregar-->
    @if(session('addempresapyme') == 'ok')
        <script>
           Swal.fire(
			'Registro exitoso!',
			'Su empresa a sido registrada, su asesor asignado se comunicará con usted a la brevedad posible para la activación de su cuenta',
			'success'
			)
        </script>
    @endif
@endsection