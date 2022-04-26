@extends('plantilla.store')

@section('title', 'Empresas Asociadas')

@section('content')
{{--  --}}
	 <!-- barra de navegacion -->
     <header class="pb-4">
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
			<div class="container">
				<img src="/images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 10rem;">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!--<form action="{{ route('buscar')}}" class="d-flex mt-3 mt-lg-0 col-12 col-md-12 col-lg-6" autocomplete="off">-->
					<!--	<div class="input-group">-->
					<!--		<input class="form-control border border-primary" name="buscarpor" type="search" placeholder="Escribe algo" aria-label="Search">-->
					<!--		<button class="btn btn-primary fw-bold" type="submit"><i class="bi bi-search"></i></button>-->
					<!--	</div>-->
					<!--</form>-->
					<!--<ul class="navbar-nav mb-2 mb-lg-0">-->
					<!--	<li class="nav-item mx-lg-3">-->
					<!--		<button class="btn btn-secondary d-flex fw-bold mt-3 mt-lg-0 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Categorías <i class="bi bi-list px-2"></i></button>-->
					<!--	</li>-->
					<!--</ul>-->
	
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex ">
						<li class="nav-item me-3 align-self-center">
							<a class="nav-link fw-bold  fs-5" href="{{ url('/inicio') }}">Inicio</a>
						</li>
						<li class="nav-item me-3 align-self-center">
							<a class="nav-link fw-bold  fs-5" href="{{ url('/empresas-asociadas') }}">Tiendas</a>
						</li>
						<li class="nav-item me-3 align-self-center">
							<a class="nav-link fw-bold  fs-5" href="{{ url('/logueando') }}" target="bank"><i class="bi bi-person-fill h4"></i></a>
						</li>
						<!--<li class="nav-item">-->
						<!--	<div class="">-->
						<!--			<a class="btn btn-warning position-relative text-white fw-bold" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" href="{{ url('/carritoIndex') }}"><i class="bi bi-cart-plus-fill h3"></i>-->
						<!--				<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">-->
						<!--					{{ \Cart::getTotalQuantity()}}-->
						<!--				</span>-->
	
						<!--			</a>-->
						<!--			<ul class="dropdown-menu dropdown-menu-lg-end" style="margin: 10px;width: 400px; border-color: #9DA0A2" aria-labelledby="dropdownMenuButton">-->
						<!--					<li>@include('partials.cart-drop')</li>	-->
						<!--			</ul>-->
						<!--	</div>-->
						<!--</li>-->
					</ul>
				  </div>
			</div>
		</nav>
	</header>
    <!-- fin barra de navegacion -->

	<!-- offcanvas start -->
	<div class="offcanvas offcanvas-start sidebar-nav" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
		<div class="offcanvas-header">
		  <h5 class="offcanvas-title float-center fw-bold" id="offcanvasScrollingLabel">CATEGORIAS</h5>
		  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body px-0">
			<div class="accordion accordion-flush" id="categorias">
				@foreach ($categorias as $categoria)
					<div class="accordion-item">
						<h2 class="accordion-header" id="{{str_replace(' ', '',$categoria->namecategoria)}}-h">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{str_replace(' ', '',$categoria->namecategoria)}}" aria-expanded="false" aria-controls="Subcategoria">
							{{$categoria->namecategoria}}
						</button>
						</h2>
						<div id="{{str_replace(' ', '',$categoria->namecategoria)}}" class="accordion-collapse collapse" aria-labelledby="{{str_replace(' ', '',$categoria->namecategoria)}}-h" data-bs-parent="#categorias">
							<div class="accordion-body px-0 py-0">
								<div class="sub">
									<ul class="navbar-nav ps-3">
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
	{{--  --}}
<img src="/images/portada2.png" class="img-fluid banner-company" style="margin-top: 40px" alt="...">
<main class="container py-5">
    <div class=" text-center text-secondary">
    <i class="bi bi-star h3"></i>
    <i class="bi bi-star h2"></i>
    <i class="bi bi-star h1"></i>
    <i class="bi bi-star h2"></i>
    <i class="bi bi-star h3"></i>
    </div>
    <h2 class="text-center py-2 text-uppercase fw-bold">Empresas que confían en nosotros</h2>        
    <!--<p class="lead text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quas consequuntur repudiandae voluptatum porro! Ex non voluptatum alias voluptates, exercitationem cupiditate beatae praesentium minus nostrum, provident culpa, corrupti minima commodi.</p>-->

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
                <div class="card h-100 bg-white rounded shadow-sm border-4 borde-bottom-primary">
                    <img src="/logos/{{$producto->logoempresa}}" class="rounded-top" style="width: auto; height: 180px;" alt="">
                    <div class="card-body">
                        <p class="text-dark text-uppercase fw-bold mb-0 fs-5">{{$producto->marca}}</p>
						<p class="text-secondary small text-uppercase fw-bold mb-0">{{$producto->namegiros}}</p>
						<p class="text-muted">{{$producto->direccion}}</p>
						<a class="btn btn-primary btn-sm" href="{{route('empre.Asociadas', $producto->slug)}}">Ir a la Tienda</a>
                        
                    </div>
					<div class="card-footer py-0 bg-transparent border-0">
						<div class="text-center">
							<a class="btn text-primary" target="_bank" href="{{$producto->enlacefacebook}}" role="button"><i class="bi bi-facebook"></i></a>
							<a class="btn text-primary" target="_bank" href="{{$producto->enlaceinstagram}}" role="button"><i class="bi bi-instagram"></i></a>
							<a class="btn text-primary" target="_bank" href="{{$producto->enlacewhatsapp}}" role="button"><i class="bi bi-whatsapp"></i></a>
						</div>
					</div>
                </div>
            </div>   
        @endforeach
    </div>

</main>
@endsection