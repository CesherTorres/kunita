@extends('plantilla.store')

@section('title', 'Tienda')

@section('css')
    <link rel="stylesheet" href="/css/detalleColor.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')   
{{--  --}}
	 <!-- barra de navegacion -->
     <header class="mb-5">
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
	{{-- Contenido principal  --}}
    {{-- main --}}
    <main class="pt-5 container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3 border-bottom">
                {{-- breacrumb --}}
                <div class="mt-1">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                        <ol class="breadcrumb mt-2">
                            <li class="breadcrumb-item"><a href="{{ url('/tienditas') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">Categories</li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
                {{-- fin breacrumb --}} 
            </div>
            <div class="col-12 col-md-8 col-lg-9 border-bottom">
                <div class="float-end mx-3 mt-1">
                    {{$productos->links()}}
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2">
                <nav class="navbar-white pt-2">
                    <ul class="navbar-nav pb-4">
                        <li class="bg-primary mb-3">
                            <div class="text-white small fw-bold text-uppercase py-1 px-3">
                                Filtrar por:
                            </div>
                        </li>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                Empresas
                            </div>
                        </li>
                        <li>
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single custom-select" aria-label=".form-select-sm example" id="select-empresa" name="empresa_id">
                                <option  value="" disabled="disabled" selected="selected">Seleccione empresa</option>
                                @foreach($empresas as $emp) 
                                    <option value="{{$emp->id}}">{{$emp->razonsocial}}</option>
                                @endforeach
                            </select>
                        </li>
                        <hr class="dropdown-divider"/>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                Marca
                            </div>
                        </li>
                        <li>
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example">
                                <option  value="" disabled="disabled" selected="selected">Seleccione marca</option>
                                @foreach($marcas as $mar) 
                                    <option value="{{$mar->marca}}">{{$mar->marca}}</option>
                                @endforeach
                            </select>
                        </li>
                        <hr class="dropdown-divider"/>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                Modelo
                            </div>
                        </li>
                        <li>
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example">
                                <option  value="" disabled="disabled" selected="selected">Seleccione modelo</option>
                                @foreach($modelos as $mod) 
                                    <option value="{{$mod->modelo}}">{{$mod->modelo}}</option>
                                @endforeach
                            </select>
                        </li>
                        <hr class="dropdown-divider"/>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                Precio
                            </div>
                        </li>
                        <li>
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example">
                                <option  value="" disabled="disabled" selected="selected">Seleccione precio</option>
                                @foreach($precios as $pr) 
                                    <option value="{{$pr->nuevaoferta}}">{{$pr->nuevaoferta}}</option>
                                @endforeach
                            </select>
                        </li>
                        <hr class="dropdown-divider"/>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                Genero
                            </div>
                        </li>
                        <li>
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example">
                                <option  value="" disabled="disabled" selected="selected">Seleccione genero</option>
                                @foreach($generos as $genero) 
                                    <option value="{{$genero->genero}}">{{$genero->genero}}</option>
                                @endforeach
                            </select>
                        </li>
                        <hr class="dropdown-divider"/>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                Oferta
                            </div>
                        </li>
                        <li>
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example">
                                <option  value="" disabled="disabled" selected="selected">Seleccione oferta</option>
                                @foreach($ofertas as $oferta) 
                                    <option value="{{$oferta->oferta}}">{{$oferta->oferta}}</option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                </nav> 
            </div>
            <div class="col-12 col-md-9 col-lg-10">
                
            {{-- content --}}
            <div class="bg-white pb-5">
                <section class="container" id="buscados">
                    <div class="row">    
                        <div class="col-12 col-md-12">
                            <div id="srec" class="row">
                                @foreach ($productos as $producto)
                                    <div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">
                                        <div class="card">
                                            <div class="row" align="center">
                                                <div class="col col-md-12 my-4">
                                                    <img src="/images_product/{{$producto->imgprincipal}}" class="card-img-top" style="width: 140px; height: 140px;" alt="">
                                                </div>
                                            </div>
                                            <form action="{{ route('cart.store') }}" method="POST">
                                            {{ csrf_field() }}
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
                                                <input type="hidden" value="{{ $producto->id}}" id="id" name="id">
                                                <input type="hidden" value="{{ $producto->nameproducto }}" id="name" name="name">
                                                <input type="hidden" value="{{ $producto->preciosugerido }}" id="price" name="price">
                                                <input type="hidden" value="{{ $producto->imgprincipal }}" id="img" name="img">
                                                <input type="hidden" value="{{ $producto->slug }}" id="slug" name="slug">
                                                <input type="hidden" value="1" id="quantity" name="quantity">
                                                <div class="btn-group mt-3" role="group" aria-label="Basic example">
                                                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto{{$producto->id}}"type="button">Información</button>
                                                    <button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            {{-- fin content --}}
            </div>
        </div>
    </main>
    {{-- fin main --}}
    {{-- fin contenido principal --}}
    


@endsection

@push('scripts')
<script>
    let $selectEmpresa;

    $(function(){
        $selectEmpresa = $('#select-empresa');

        $selectEmpresa.change(onChangeFilter);
    });

    function onChangeFilter(){
        const empresaId = $selectEmpresa.val();

        location.href = '?empresa_id={$emp->id}';
    }
</script>
@endpush

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="/js/filters.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
    $(document).ready(function()
    {
    $("select[name=empre]").change(function () {
        var dato= $(this).val();
                // var aniope=$(document.getElementsByName('aniope')).val();
        $("#seccion").load('/sub/empresa/'+dato);
        });

    });
    </script>   
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