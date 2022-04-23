    <header class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <img src="images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 8rem;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            	<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mb-2 mb-lg-0">
						<li class="nav-item mx-md-1">
							<button class="btn btn-outline-warning mt-3 mt-lg-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Categorías <i class="bi bi-list"></i></button>
						</li>
					</ul>
                    <form class="d-flex mt-3 mt-lg-0 col-12 col-md-7">
                        <div class="input-group">
                            <input class="form-control border border-primary" type="search" placeholder="Escribe algo" aria-label="Search">
                            <button class="btn btn-primary fw-bold" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </form>

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ url('/store') }}">Inicio</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="{{ url('/empresas-asociadas') }}">Empresas</a>
                        </li>
						<li class="nav-item me-2">
                            <a class="nav-link" href="{{ url('/') }}" target="bank"><i class="bi bi-person-fill h4"></i></a>
                        </li>
                        <li class="nav-item">
							<div class="btn-group">
									<a class="nav-link" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" href="{{ url('/carritoIndex') }}"><i class="bi bi-cart-plus-fill h4"></i></a>
									<ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenuButton">
											<li><a class="dropdown-item" href="#">Menu item</a></li>
											<li><a class="dropdown-item" href="#">Menu item</a></li>
											<li><a class="dropdown-item" href="#">Menu item</a></li>
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
	<div class="offcanvas offcanvas-start sidebar-nav" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
		<div class="offcanvas-header">
		  <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Categorías</h5>
		  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<div class="accordion accordion-flush" id="categorias">
                @foreach ($categorias as $categoria)
					<div class="accordion-item">
						<h2 class="accordion-header" id="{{str_replace(' ', '',$categoria->namecategoria)}}-h">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{str_replace(' ', '',$categoria->namecategoria)}}" aria-expanded="false" aria-controls="Subcategoria">
							{{$categoria->namecategoria}}
						</button>
						</h2>
						<div id="{{str_replace(' ', '',$categoria->namecategoria)}}" class="accordion-collapse collapse" aria-labelledby="{{str_replace(' ', '',$categoria->namecategoria)}}-h" data-bs-parent="#categorias">
                            <div class="accordion-body">
                                <div>
                                    <ul class="navbar-nav ps-3">
                                        <li>
                                        @foreach($categoria->subcategoria as $subcategorias)
                                            <a href="{{route('sub.show', $subcategorias)}}" class="nav-link my-2" style="cursor-pointer; hover:text-orange capitalize">
                                                <span>{{$subcategorias->namesubcategoria}}</span>
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
    <div id="carouselofertas" class="carousel sslide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="2" aria-label="Slide 3"></button>
			<button type="button" data-bs-target="#carouselofertas" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/banner-2.png" class="d-block w-100" alt="...">
            </div>
			<div class="carousel-item">
                <img src="images/impresoraaa.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/laptop.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/pc.jpg" class="d-block w-100" alt="...">
            </div>
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
			<div class="bg-warning rounded">
				<p class="heading text-center fw-bold text-white py-2 my-5">¡LO MÁS NUEVO!</p>
			</div>
			<div class="swiper productos-slider">
				<div class="swiper-wrapper">
					@foreach ($productos as $producto)
					<div class="swiper-slide card d-flex align-items-center" style="width: 18rem;"> 
						<img src="/images_product/{{$producto->imgprincipal}}" class="card-img-top img-fluid" style="height: 200px;" alt="">
						{{-- <div class="row" align="center">
							<div class="col col-md-8 my-4">
							</div>
							<div class="col col-md-3 my-3">
								<div class="imagen-zoom">
									<img src="/images_product/{{$producto->imguno}}" class="card-img-top my-2" style="width: 50px; height: 50px;" alt="">
									<img src="/images_product/{{$producto->imgdos}}" class="card-img-top my-2" style="width: 50px; height: 50px;" alt="">
								</div>
							</div>
						</div> --}}
						<div class="card-body text-center">
							@php
							if(strlen("{$producto->oferta}")>0){
							echo ('<h3 style="background-color: #FA3C14;color: #FCFAF9;">'."{$producto->oferta}"."% DCTO".'</h3>');
							$precio_sug= "{$producto->preciosugerido}";
							$ofer = "{$producto->oferta}";
							$calc =strval($precio_sug) - strval($precio_sug)*($ofer)/100;	
						    }else{
							echo ('<div style="height:43px;">');
						    echo ('</div>');
						    }
							@endphp
							<h5 class="">{{$producto->nameproducto}}</h5>
							<p class="text-center text-muted">{{$producto->marca}}</h9>
							
							@php
							if(strlen("{$producto->oferta}")>0){
								echo ('<h3 class="text-primary fw-bold">'."S/.". $calc.'</h3>');	
							echo ('<div class="text-center">'.'Antes - S/. '."{$producto->preciosugerido}".'</div>');
							}else{
								echo ('<h3 class="text-primary fw-bold">'.'S/. '."{$producto->preciosugerido}".'</h3>');
								echo ('<div style="height:19px;">');
						    echo ('</div>');
							}
							@endphp
							<div class="btn-group mt-3" role="group" aria-label="Basic example">
								<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto{{$producto->id}}"type="button">Información</button>
								<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>
							</div>
							
							
						</div>
					</div>
					@endforeach
				</div>
				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>
			<!-- {{-- @include('productos.info') --}} -->
			@foreach($productos as $producto)
			<div class="modal fade" id="infoproducto{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title" id="staticBackdropLabel">Informacion del Producto</h3>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h3 class="text-center">Fotos del Producto</h3></div>
							<form>
								<br>
								<div class="row justify-content-center my-2" align="center">
									<div class="col-3"><img src="/images_product/{{$producto->imguno}}" style="height: 130px; width:auto;" alt="..."></div>
									<div class="col-3"><img src="/images_product/{{$producto->imgdos}}" style="height: 130px; width:auto;" alt="..."></div>
									<div class="col-3"><img src="/images_product/{{$producto->imgtres}}" style="height: 130px; width:auto;" alt="..."></div>
								</div>   
								<div align="center" id="carouselExampleControls{{$producto->id}}" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-inner">
										<div class="carousel-item active">
										<img src="/images_product/{{$producto->imgprincipal}}" class="d-block w-50" alt="...">
										</div>
										<div class="carousel-item">
										<img src="/images_product/{{$producto->imguno}}" class="d-block w-50" alt="...">
										</div>
										<div class="carousel-item">
										<img src="/images_product/{{$producto->imgdos}}" class="d-block w-50" alt="...">
										</div>
										<div class="carousel-item">
										<img src="/images_product/{{$producto->imgtres}}" class="d-block w-50" alt="...">
										</div>
									</div>
									<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls{{$producto->id}}" data-bs-slide="prev">
										<span class="carousel-control-prev-icon bg-primary" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls{{$producto->id}}" data-bs-slide="next">
										<span class="carousel-control-next-icon bg-primary" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>
							</form>   
							<hr>
							<h2 class="text-center">{{$producto->nameproducto}}</h2><br>
								<div class="row text-center">
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Marca:</u> {{$producto->marca}}</strong></label>
											<p></p></div>
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Modelo:</u> {{$producto->modelo}}</strong></label>
											<p></p></div>
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Genero:</u> {{$producto->genero}}</strong></label>
									<p></p></div>
								</div>
								<div class="row text-center">
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Categoria:</u> {{$producto->subcategoria->categoria->namecategoria}}</strong></label>
											<p></p></div>
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Ancho:</u> {{$producto->ancho}} c.m</strong></label>
											<p></p></div>
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Alto:</u> {{$producto->alto}} c.m</strong></label>
									<p></p></div>
								</div>
								<div class="row text-center">
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Sub-Categoria:</u> {{$producto->subcategoria->namesubcategoria}}</strong></label>
											<p></p></div>
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Peso:</u> {{$producto->peso}} kg</strong></label>
											<p></p></div>
									<div class="col-4"><label for="exampleInputEmail1" class="form-label"><strong><u>Profundidad:</u> {{$producto->profundidad}}</strong></label>
									<p></p></div>
								</div>
								<div class="text-center">
								<br><br>
									<a  href="" class="btn btn-warning text-white"><i class="bi bi-save"></i> Agregar</a>
								</div>
								<br>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			<!--  -->
		</section>
	</div>
    <!-- fin slider productos -->
   
    <!-- slider mas buscados -->
		<div class="bg-white pb-5">
		<section class="container" id="buscados">
			<div class="bg-warning rounded">
				<p class="heading text-center fw-bold text-white py-2 my-5">¡MIRA AQUÍ LOS MEJORES PRODUCTOS CON LAS MEJORES OFERTAS!</p>
			</div>
				<div class="col-12 col-md-12">
					<div id="srec" class="row">
						@foreach ($ofertas as $producto)
							<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">
								<div class="card">
									<div class="row" align="center">
										<div class="col col-md-12 my-4">
											<img src="/images_product/{{$producto->imgprincipal}}" class="card-img-top" style="width: 140px; height: 140px;" alt="">
										</div>
									</div>
									<div class="card-body text-center">	
										@php
										if(strlen("{$producto->oferta}")>0){
										echo ('<h3 style="background-color: #FA3C14;color: #FCFAF9;">'."{$producto->oferta}"."% DCTO".'</h3>');
										$precio_sug= "{$producto->preciosugerido}";
										$ofer = "{$producto->oferta}";
										$calc =strval($precio_sug) - strval($precio_sug)*($ofer)/100;	
										}else{
										echo ('<div style="height:43px;">');
										echo ('</div>');
										}
										@endphp
										<h3 class="">{{$producto->nameproducto}}</h3>
										<h6 class="text-center">{{$producto->marca}}</h6>
										
										@php
										if(strlen("{$producto->oferta}")>0){
											echo ('<h3 class="text-primary fw-bold">'."S/.". $calc.'</h3>');	
										echo ('<div class="text-center">'.'Antes - S/. '."{$producto->preciosugerido}".'</div>');
										}else{
											echo ('<h3 class="text-primary fw-bold">'.'S/. '."{$producto->preciosugerido}".'</h3>');
											echo ('<div style="height:19px;">');
										echo ('</div>');
										}
										@endphp
										
										<div class="btn-group mt-3" role="group" aria-label="Basic example">
											<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto{{$producto->id}}"type="button">Información</button>
											<button class="btn btn-primary" type="button"><i class="bi bi-cart-plus-fill"></i></button>
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
