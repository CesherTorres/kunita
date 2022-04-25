@extends('plantilla.store')

@section('title', 'Tienda')



@section('content')   
<header class="pb-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <img src="/public//images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 10rem;">
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
                    <li class="nav-item">
                        <div class="">
                                <a class="btn btn-warning position-relative text-white fw-bold" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" href="{{ url('/carritoIndex') }}"><i class="bi bi-cart-plus-fill h3"></i>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ \Cart::getTotalQuantity()}}
                                    </span>

                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg-end" style="margin: 10px;width: 400px; border-color: #9DA0A2" aria-labelledby="dropdownMenuButton">
                                        <li>@include('partials.cart-drop')</li>	
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
      <h5 class="offcanvas-title float-center fw-bold" id="offcanvasScrollingLabel">CATEGORÍAS</h5>
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
	{{-- Contenido principal  --}}
        {{-- main --}}
        <main class="pt-5 container-fluid">
            
                     {{-- content --}}
                <div class="bg-white pb-5">
                    <section class="container">
                        <h1 class="fw-light text-muted small text-primary pt-3">Se muestran los resultados de para la busqueda: "{{$buscarpor}}"</h1>
                        <div class="float-end">
                            {{$productos->links()}}
                        </div>
                        <div class="row">    
                            <div class="col-12 col-md-12">
                                <div id="srec" class="row">
                                    @forelse ($productos as $producto)
                                    @php
                                    $precio_sug= $producto->preciosugerido;
                                    $ofer = $producto->oferta;
                                    $calc =intval($precio_sug) - intval($precio_sug)*($ofer)/100;
                                    @endphp
                                        <div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">
                                            <div class="card">
                                                <form action="{{ route('cart.store') }}" method="POST">
                                                {{ csrf_field() }}
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
                                                    <!--<input type="hidden" value="{{ $producto->id}}" id="id" name="id">
                                                    <input type="hidden" value="{{ $producto->nameproducto }}" id="name" name="name">
                                                    <input type="hidden" value="{{ $producto->preciosugerido }}" id="price" name="price">
                                                    <input type="hidden" value="{{ $producto->imgprincipal }}" id="img" name="img">
                                                    <input type="hidden" value="{{ $producto->slug }}" id="slug" name="slug">
                                                    <input type="hidden" value="1" id="quantity" name="quantity">-->
                                                    <!--<div class="btn-group mt-3" role="group" aria-label="Basic example">
                                                        <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto{{$producto->id}}"type="button">Información</button>
                                                        <button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>
                                                    </div>-->
                                                    <div class="btn-group mt-3">
        												<a class="btn btn-primary" href="{{route('empre.producto', $producto)}}">Ir a la tienda <i class="bi bi-shop"></i></a>
        											</div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>

                                        @empty
                                            <nav class="mt-5 bg-white rounded-lg shadow-lg list-item" style="height: 241px">
                                                    <div class="p-4">
                                                        <p class="text-lg text-gray-700">Ningun producto coincide con esos parámetros</p>
                                                    </div>

                                            </nav>
                                        
                                    @endforelse
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                    </section>
                </div>
            {{-- fin content --}}
               
            </div>
           

        </main>
        
        {{-- fin main --}}
    {{-- fin contenido principal --}}
    
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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