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
							<a class="nav-link fw-bolder fs-5" href="{{ url('/inicio') }}">Inicio</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link fw-bolder fs-5" href="{{ url('/empresas-asociadas') }}">Tiendas</a>
						</li>
						<li class="nav-item me-3">
							<a class="nav-link fw-bolder fs-5" href="{{ url('/logueando') }}" target="bank"><i class="bi bi-person-fill h4"></i></a>
						</li>
                        <!-- <li class="nav-item">
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
                        </li> -->
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
    <!-- carousel ofertas -->
    <div id="carouselofertas" class="carousel slide carousel-fade pt-5 pb-2" data-bs-ride="carousel">		
		
        {{-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="2" aria-label="Slide 3"></button>
			<button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>  --}}
        <div class="carousel-inner pt-3">
			@foreach($publicidad as $pub)
				<div class="carousel-item @if($loop->index==0) active @endif ">
			        <a href="{{$pub->enlace}}" target="_blank">
					    <img src="/public/publicidad_img/{{$pub->imagen}}" class="d-block w-100" alt="...">
			    	</a>
				</div>
			@endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselofertas" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselofertas" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    	<!-- fin carousel ofertas -->

    <!-- slider nuevos productos -->
	<div class="bg-white">
		<section class="container" id="productos">
			<div class="bg-info rounded rounded-pill">
				<p class="heading text-center rounded-pill fw-bold text-white py-2 my-5">¡LO MÁS NUEVO!</p>
			</div>
			<div class="swiper productos-slider">
				<div class="swiper-wrapper">
					@foreach ($productitoto as $producto)
					@php
					$precio_sug= $producto->preciosugerido;
					$ofer = $producto->oferta;
					$calc =intval($precio_sug) - intval($precio_sug)*($ofer)/100;
					@endphp
							<div class="swiper-slide card" style="width: 18rem;"> 
								<div class="card-header bg-warning">
									<div class="row">
										<div class="col-8">
											<span class="float-start text-white fw-bold">
												{{ $producto->nameproducto}}
											</span>
										</div>
										<div class="col-4">
											@php
											if($producto->has_offer()){
											echo ('<span class="float-end badge rounded-pill bg-danger">'."{$producto->oferta}"."% DCTO".'</span>');
											$calc;	
											}else{
											echo ('<span style="height:43px;">');
											echo ('</span>');
											}
											@endphp
										</div>
									</div>
									
								</div>
								<div class="card-body text-center">
									<img src="/public/images_product/{{$producto->imgprincipal}}" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">		
									<h6 class="text-center text-muted fw-light pt-1">{{$producto->marca}}</h6>
									
									@php
									if($producto->has_offer()){
										echo ('<h3 class="text-primary fw-bold">'."S/. ". $calc.'</h3>');	
									echo ('<div class="text-center text-decoration-line-through text-danger">'.'S/. '."{$producto->preciosugerido}".'</div>');
									}else{
										echo ('<h3 class="text-primary fw-bold">'.'S/. '."{$producto->preciosugerido}".'</h3>');
										echo ('<div style="height:19px;">');
									echo ('</div>');
									}
									@endphp
									<div class="btn-group mt-3">
										<a class="btn btn-primary" href="{{url("/Empresas_Kunaq/$producto->slug")}}">Ir a la tienda <i class="bi bi-shop"></i></a>
									</div>
									
									
								</div>
							</div>
					@endforeach
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
			<!-- {{-- @include('productos.info') --}} -->
		</section>
	</div>
    <!-- fin slider productos -->
   
    <!-- slider mas buscados -->
		<div class="bg-white pb-5">
		<section class="container" id="buscados">
			<div class="bg-info rounded rounded-pill">
				<p class="heading text-center rounded-pill fw-bold text-white py-2 my-5">¡LOS MEJORES PRODUCTOS CON LAS MEJORES OFERTAS!</p>
			</div>
				<div class="col-12 col-md-12">
					<div id="srec" class="row">
						@foreach ($productitoOfer as $producto)
						@php
						$precio_sug= $producto->preciosugerido;
						$ofer = $producto->oferta;
						$calc =intval($precio_sug) - intval($precio_sug)*($ofer)/100;
						@endphp
								<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">
									<div class="card shadow-sm">
										<div class="card-header bg-warning">
											<div class="row">
												<div class="col-8">
													<span class="float-start text-white fw-bold">
														{{ $producto->nameproducto}}
													</span>
												</div>
												<div class="col-4">
													@php
													if($producto->has_offer()){
													echo ('<span class="float-end badge rounded-pill bg-danger">'."{$producto->oferta}"."% DCTO".'</span>');
													$calc;	
													}else{
													echo ('<span style="height:43px;">');
													echo ('</span>');
													}
													@endphp
												</div>
											</div>
											
										</div>											
										<div class="card-body text-center">	
											<img src="/public/images_product/{{$producto->imgprincipal}}" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">	
											
											
											<h6 class="text-center text-muted fw-light pt-1">{{$producto->marca}}</h6>
											
											@php
											if($producto->has_offer()){
												echo ('<h3 class="text-primary fw-bold">'."S/. ". $calc.'</h3>');	
											echo ('<div class="text-center text-decoration-line-through text-danger">'.'S/. '."{$producto->preciosugerido}".'</div>');
											}else{
												echo ('<h3 class="text-primary fw-bold">'.'S/. '."{$producto->preciosugerido}".'</h3>');
												echo ('<div style="height:19px;">');
											echo ('</div>');
											}
											@endphp
											<div class="btn-group mt-3">
												<a class="btn btn-primary" href="{{route('empre.producto', $producto)}}">Ir a la tienda <i class="bi bi-shop"></i></a>
											</div>
										</div>
									</div>
								</div>
						@endforeach
					</div>
					
				</div>
			
		</section>
	</div>
    <!-- fin mas buscados -->

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