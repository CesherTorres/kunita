@extends('plantilla.store')

@section('title', 'Tienda')

@section('css')
    <link rel="stylesheet" href="/css/detalleColor.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

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
<input id="subcate_id" name="subcate_id" type="hidden" value="{{$subcategorias->id}}">
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
                            <li class="breadcrumb-item"><a href="{{ url('/inicio') }}">Inicio</a></li>
                            <li class="breadcrumb-item" aria-current="page">Categoria</li>
                            <li class="breadcrumb-item active" aria-current="page">Subcategoria</li>
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

                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single custom-select" aria-label=".form-select-sm example" id="empre" name="empre">
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
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example" id="marc" name="marc">
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
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example" id="modelo_ku" name="modelo_ku">
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
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example" id="precio_ku" name="precio_ku">
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
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example" id="genero_ku" name="genero_ku">
                                <option  value="" disabled="disabled" selected="selected">Seleccione genero</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Unisex">Unisex</option>
                            </select>
                        </li>
                        <hr class="dropdown-divider"/>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3">
                                Oferta
                            </div>
                        </li>
                        <li>
                            <select class="form-select form-select-sm border-0 px-2 js-example-basic-single" aria-label=".form-select-sm example" id="oferta_ku" name="oferta_ku">
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
            <form type="POST" action="" id="form1">
              @csrf
              <input type="hidden" name="id" value="1">
              <input type="hidden" name="">
              </form>
            {{-- content --}}
            @foreach($productos as $producto)
			<div class="modal fade" id="infoproducto{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<div class="modal-content">
						<div class="modal-header bg-secondary text-white">
							<p class="modal-title fw-bold" id="staticBackdropLabel">Detalles del Producto</p>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-12 col-md-6">
									<div id="carouselExampleIndicators{{$producto->id}}" class="carousel carousel-dark slide" data-bs-ride="carousel">
										<div class="carousel-indicators">
											<button type="button" data-bs-target="#carouselExampleIndicators{{$producto->id}}" data-bs-slide-to="1" aria-label="Slide 2"></button>
											<button type="button" data-bs-target="#carouselExampleIndicators{{$producto->id}}" data-bs-slide-to="2" aria-label="Slide 3"></button>
											<button type="button" data-bs-target="#carouselExampleIndicators{{$producto->id}}" data-bs-slide-to="3" aria-label="Slide 4"></button>
											<button type="button" data-bs-target="#carouselExampleIndicators{{$producto->id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
										</div>
										<div class="carousel-inner" align="center">
										  <div class="carousel-item active">
											<img src="/public/images_product/{{$producto->imgprincipal}}"  height="500px" width="400px" alt="...">
										  </div>
										  <div class="carousel-item">
											<img src="/public/images_product/{{$producto->imguno}}" height="500px" width="400px" alt="...">
										  </div>
										  <div class="carousel-item">
											<img src="/public/images_product/{{$producto->imgdos}}" height="500px" width="400px" alt="...">
										  </div>
										  <div class="carousel-item">
											<img src="/public/images_product/{{$producto->imgtres}}" height="500px" width="400px" alt="...">
										  </div>
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators{{$producto->id}}" data-bs-slide="prev">
										  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										  <span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators{{$producto->id}}" data-bs-slide="next">
										  <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
										  <span class="visually-hidden">Next</span>
										</button>
									  </div>
								</div>
								<div class="col-12 col-md-6">
									<div class="border-bottom mb-3 pt-5 pt-md-0">
										<h3 class="text-center text-uppercase fw-bold">{{$producto->nameproducto}}</h3>
									</div>
									<div class="row">
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Marca:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->marca}}</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Modelo:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->modelo}}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Género:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->genero}}</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Ancho:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->ancho}}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Alto:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->alto}}</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Peso:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->peso}}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Profundidad:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->profundidad}}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Categoría:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->namecategoria}}</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">SubCategoría:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->namesubcategoria}}</p>
										</div>
									</div>
									<div class="row">
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fw-bold">Empresa:</p>
										</div>
										<div class="col-6 col-md-6 col-lg-3">
											<p class="fst-italic">{{$producto->razonsocial}}</p>
										</div>
									</div>
									<div class="border-top mt-3">
										<p class="fw-bold">Descripcion:</p>
										<p class="fst-italic">{{$producto->descripcion}}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
            <div class="bg-white pb-5">
                <section class="container" id="buscados">
                    <div class="row">    
                        <div class="col-12 col-md-12">
                               <div id="ruet" class="row">
                                      
                                               
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
<!-- <script>
    let $selectEmpresa;

    $(function(){
        $selectEmpresa = $('#select-empresa');

        $selectEmpresa.change(onChangeFilter);
    });

    function onChangeFilter(){
        const  empresa_id  = $selectEmpresa.val();

        location.href = '?empresa_id=${empresa_id}';
    }
</script> -->
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
   
<script type="text/javascript">
//cargar al inicio cuando se carga la pagina lo siguiente:
$(document).ready(function()
{
$.ajax({
   url: '/empre/jempre',
   method:'POST',
   data:{
    subcategoria_id:$('input[name="subcate_id"]').val(),
    _token:$('input[name="_token"]').val()
   
    }
}).done(function(res){
  // alert(res);
  var arreglo = res.productos;
for(var x=0;x<arreglo.length;x++){
    var todo='<tr><td>'+arreglo[x].producto_id+'</td>';
    var todo='<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">';
    todo+='<div class="card shadow-sm">';
    todo+='<div class="card-header bg-warning">';
    todo+='<div class="row">';
    todo+='<div class="col-8">';
    todo+='<span class="float-start text-white fw-bold">'+arreglo[x].nameproducto+'</span>';
    todo+='</div>';
    todo+='<div class="col-4">';
    var calc=0;
    if((arreglo[x].estado_oferta)==1){
    todo+='<span class="float-end badge rounded-pill bg-danger">'+arreglo[x].oferta+'% DCTO</span>';
    var precio_sug=arreglo[x].preciosugerido;
    var ofer=arreglo[x].oferta;
    calc=precio_sug - (precio_sug * ofer)/100;
    calc = calc.toFixed(2);
    }else{
    todo+='<span style="height:43px;">';
    todo+='</span>';
    }
    todo+='</div>';
    todo+='</div>';
    todo+='</div>';
    todo+='<div class="card-body text-center">';
        todo+='<img src="/public/images_product/'+arreglo[x].imgprincipal+'" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">';
    todo+='<h6 class="text-center text-muted fw-light pt-1">'+arreglo[x].marca+'</h6>';

    
    if((arreglo[x].estado_oferta)==1){
    todo+='<h3 class="text-primary fw-bold">S/. '+calc+'</h3>';	
    todo+='<div class="text-center text-decoration-line-through text-danger"> S/. '+arreglo[x].preciosugerido+'</div>';
    }else{
    todo+='<h3 class="text-primary fw-bold">S/. '+arreglo[x].preciosugerido+'</h3>';
    todo+='<div style="height:19px;">';
    todo+='</div>';
    }
    //todo+='<form action="{{ route('cart.store') }}" method="POST">';
    //todo+='{{ csrf_field() }}';
    //todo+='<input type="hidden" value="'+arreglo[x].producto_id+'" id="id" name="id">';
    //todo+='<input type="hidden" value="'+arreglo[x].nameproducto+'" id="name" name="name">';
    //todo+='<input type="hidden" value="'+arreglo[x].razonsocial+'" id="razonsocial" name="razonsocial">';
    //todo+='<input type="hidden" value="'+arreglo[x].empresa_id+'" id="empresa_id" name="empresa_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].cobertura_id+'" id="idcobertura" name="idcobertura">';
    //todo+='<input type="hidden" value="'+arreglo[x].nuevaoferta+'" id="price" name="price">';
    //todo+='<input type="hidden" value="'+arreglo[x].precioEnvio_id+'" id="precioenvio" name="precioenvio">';
    //todo+='<input type="hidden" value="'+arreglo[x].diasestimados_id+'" id="diasestimados" name="diasestimados">';
    //todo+='<input type="hidden" value="'+arreglo[x].ubigeocobertura_id+'" id="ubigeocobertura_id" name="ubigeocobertura_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].imgprincipal+'" id="img" name="img">';
    //todo+='<input type="hidden" value="'+arreglo[x].slug+'" id="slug" name="slug">';
    //todo+='<input type="hidden" value="1" id="quantity" name="quantity">';
    todo+='<div class="btn-group mt-3" role="group" aria-label="Basic example">';
    //todo+='<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto'+arreglo[x].producto_id+'"type="button">Información</button>';
    //todo+='<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>';
    todo+='<a class="btn btn-primary" href="{{url('/Empresas_Kunaq')}}/'+arreglo[x].slug+'">Ir a la tienda <i class="bi bi-shop"></i></a>';
    todo+='</div>';
    //todo+='</form>';
    todo+='</div>';    
    todo+='</div>';
    todo+='</div>';   

//console.log(todo);
$('#ruet').append(todo);
}
});
//funcion que obtiene cuando se selecciona una empresa
  $("select[name=empre]").change(function () {
       var dato= $(this).val();
//     console.log(dato);
$.ajax({
   url: '/empre/prodemp',
   method:'POST',
   data:{
    subcategoria_id:$('input[name="subcate_id"]').val(),
    empresa_id:dato,
    _token:$('input[name="_token"]').val()
   
    }
}).done(function(res){
  // alert(res);
  var arreglo = res.productos;
  $("#ruet").html("");
for(var x=0;x<arreglo.length;x++){
    var todo='<tr><td>'+arreglo[x].producto_id+'</td>';
    var todo='<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">';
        todo+='<div class="card shadow-sm">';
    todo+='<div class="card-header bg-warning">';
    todo+='<div class="row">';
    todo+='<div class="col-8">';
    todo+='<span class="float-start text-white fw-bold">'+arreglo[x].nameproducto+'</span>';
    todo+='</div>';
    todo+='<div class="col-4">';
    var calc=0;
    if((arreglo[x].estado_oferta)==1){
    todo+='<span class="float-end badge rounded-pill bg-danger">'+arreglo[x].oferta+'% DCTO</span>';
    var precio_sug=arreglo[x].preciosugerido;
    var ofer=arreglo[x].oferta;
    calc=precio_sug - (precio_sug * ofer)/100;
    calc = calc.toFixed(2);
    }else{
    todo+='<span style="height:43px;">';
    todo+='</span>';
    }
    todo+='</div>';
    todo+='</div>';
    todo+='</div>';
    todo+='<div class="card-body text-center">';
        todo+='<img src="/public/images_product/'+arreglo[x].imgprincipal+'" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">';
    todo+='<h6 class="text-center text-muted fw-light pt-1">'+arreglo[x].marca+'</h6>';

    
    if((arreglo[x].estado_oferta)==1){
    todo+='<h3 class="text-primary fw-bold">S/. '+calc+'</h3>';	
    todo+='<div class="text-center text-decoration-line-through text-danger"> S/. '+arreglo[x].preciosugerido+'</div>';
    }else{
    todo+='<h3 class="text-primary fw-bold">S/. '+arreglo[x].preciosugerido+'</h3>';
    todo+='<div style="height:19px;">';
    todo+='</div>';
    }
    //todo+='<form action="{{ route('cart.store') }}" method="POST">';
    //todo+='{{ csrf_field() }}';
    //todo+='<input type="hidden" value="'+arreglo[x].producto_id+'" id="id" name="id">';
    //todo+='<input type="hidden" value="'+arreglo[x].nameproducto+'" id="name" name="name">';
    //todo+='<input type="hidden" value="'+arreglo[x].razonsocial+'" id="razonsocial" name="razonsocial">';
    //todo+='<input type="hidden" value="'+arreglo[x].empresa_id+'" id="empresa_id" name="empresa_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].cobertura_id+'" id="idcobertura" name="idcobertura">';
    //todo+='<input type="hidden" value="'+arreglo[x].nuevaoferta+'" id="price" name="price">';
    //todo+='<input type="hidden" value="'+arreglo[x].precioEnvio_id+'" id="precioenvio" name="precioenvio">';
    //todo+='<input type="hidden" value="'+arreglo[x].diasestimados_id+'" id="diasestimados" name="diasestimados">';
    //todo+='<input type="hidden" value="'+arreglo[x].ubigeocobertura_id+'" id="ubigeocobertura_id" name="ubigeocobertura_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].imgprincipal+'" id="img" name="img">';
    //todo+='<input type="hidden" value="'+arreglo[x].slug+'" id="slug" name="slug">';
    //todo+='<input type="hidden" value="1" id="quantity" name="quantity">';
    todo+='<div class="btn-group mt-3" role="group" aria-label="Basic example">';
    //todo+='<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto'+arreglo[x].producto_id+'"type="button">Información</button>';
    //todo+='<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>';
    todo+='<a class="btn btn-primary" href="{{url('/Empresas_Kunaq')}}/'+arreglo[x].slug+'">Ir a la tienda <i class="bi bi-shop"></i></a>';
    todo+='</div>';
    //todo+='</form>';
    todo+='</div>';    
    todo+='</div>';
    todo+='</div>';

//console.log(todo);
$('#ruet').append(todo);
}
});

});
//script al seleccionar la marca:
$("select[name=marc]").change(function () {
       var mar= $(this).val();
//     console.log(dato);
$.ajax({
   url: '/empre/prodmarc',
   method:'POST',
   data:{
    subcategoria_id:$('input[name="subcate_id"]').val(),
    marca:mar,
    _token:$('input[name="_token"]').val()
   
    }
}).done(function(res){
  // alert(res);
  var arreglo = res.productos;
  $("#ruet").html("");
for(var x=0;x<arreglo.length;x++){
    var todo='<tr><td>'+arreglo[x].producto_id+'</td>';
   var todo='<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">';
    todo+='<div class="card shadow-sm">';
    todo+='<div class="card-header bg-warning">';
    todo+='<div class="row">';
    todo+='<div class="col-8">';
    todo+='<span class="float-start text-white fw-bold">'+arreglo[x].nameproducto+'</span>';
    todo+='</div>';
    todo+='<div class="col-4">';
    var calc=0;
    if((arreglo[x].estado_oferta)==1){
    todo+='<span class="float-end badge rounded-pill bg-danger">'+arreglo[x].oferta+'% DCTO</span>';
    var precio_sug=arreglo[x].preciosugerido;
    var ofer=arreglo[x].oferta;
    calc=precio_sug - (precio_sug * ofer)/100;
    calc = calc.toFixed(2);
    }else{
    todo+='<span style="height:43px;">';
    todo+='</span>';
    }
    todo+='</div>';
    todo+='</div>';
    todo+='</div>';
    todo+='<div class="card-body text-center">';
        todo+='<img src="/public/images_product/'+arreglo[x].imgprincipal+'" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">';
    todo+='<h6 class="text-center text-muted fw-light pt-1">'+arreglo[x].marca+'</h6>';

    
    if((arreglo[x].estado_oferta)==1){
    todo+='<h3 class="text-primary fw-bold">S/. '+calc+'</h3>';	
    todo+='<div class="text-center text-decoration-line-through text-danger"> S/. '+arreglo[x].preciosugerido+'</div>';
    }else{
    todo+='<h3 class="text-primary fw-bold">S/. '+arreglo[x].preciosugerido+'</h3>';
    todo+='<div style="height:19px;">';
    todo+='</div>';
    }
    //todo+='<form action="{{ route('cart.store') }}" method="POST">';
    //todo+='{{ csrf_field() }}';
    //todo+='<input type="hidden" value="'+arreglo[x].producto_id+'" id="id" name="id">';
    //todo+='<input type="hidden" value="'+arreglo[x].nameproducto+'" id="name" name="name">';
    //todo+='<input type="hidden" value="'+arreglo[x].razonsocial+'" id="razonsocial" name="razonsocial">';
    //todo+='<input type="hidden" value="'+arreglo[x].empresa_id+'" id="empresa_id" name="empresa_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].cobertura_id+'" id="idcobertura" name="idcobertura">';
    //todo+='<input type="hidden" value="'+arreglo[x].nuevaoferta+'" id="price" name="price">';
    //todo+='<input type="hidden" value="'+arreglo[x].precioEnvio_id+'" id="precioenvio" name="precioenvio">';
    //todo+='<input type="hidden" value="'+arreglo[x].diasestimados_id+'" id="diasestimados" name="diasestimados">';
    //todo+='<input type="hidden" value="'+arreglo[x].ubigeocobertura_id+'" id="ubigeocobertura_id" name="ubigeocobertura_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].imgprincipal+'" id="img" name="img">';
    //todo+='<input type="hidden" value="'+arreglo[x].slug+'" id="slug" name="slug">';
    //todo+='<input type="hidden" value="1" id="quantity" name="quantity">';
    todo+='<div class="btn-group mt-3" role="group" aria-label="Basic example">';
    //todo+='<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto'+arreglo[x].producto_id+'"type="button">Información</button>';
    //todo+='<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>';
    todo+='<a class="btn btn-primary" href="{{url('/Empresas_Kunaq')}}/'+arreglo[x].slug+'">Ir a la tienda <i class="bi bi-shop"></i></a>';
    todo+='</div>';
    //todo+='</form>';
    todo+='</div>';    
    todo+='</div>';
    todo+='</div>';   

//console.log(todo);
$('#ruet').append(todo);
}
});

});
//script para seleccionar el modelo:
$("select[name=modelo_ku]").change(function () {
       var mode= $(this).val();
//     console.log(dato);
$.ajax({
   url: '/empre/modelomarc',
   method:'POST',
   data:{
    subcategoria_id:$('input[name="subcate_id"]').val(),
    modelo:mode,
    _token:$('input[name="_token"]').val()
   
    }
}).done(function(res){
  // alert(res);
  var arreglo = res.productos;
  $("#ruet").html("");
for(var x=0;x<arreglo.length;x++){
    var todo='<tr><td>'+arreglo[x].producto_id+'</td>';
   var todo='<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">';
    todo+='<div class="card shadow-sm">';
    todo+='<div class="card-header bg-warning">';
    todo+='<div class="row">';
    todo+='<div class="col-8">';
    todo+='<span class="float-start text-white fw-bold">'+arreglo[x].nameproducto+'</span>';
    todo+='</div>';
    todo+='<div class="col-4">';
    var calc=0;
    if((arreglo[x].estado_oferta)==1){
    todo+='<span class="float-end badge rounded-pill bg-danger">'+arreglo[x].oferta+'% DCTO</span>';
    var precio_sug=arreglo[x].preciosugerido;
    var ofer=arreglo[x].oferta;
    calc=precio_sug - (precio_sug * ofer)/100;
    calc = calc.toFixed(2);
    }else{
    todo+='<span style="height:43px;">';
    todo+='</span>';
    }
    todo+='</div>';
    todo+='</div>';
    todo+='</div>';
    todo+='<div class="card-body text-center">';
        todo+='<img src="/public/images_product/'+arreglo[x].imgprincipal+'" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">';
    todo+='<h6 class="text-center text-muted fw-light pt-1">'+arreglo[x].marca+'</h6>';

    
    if((arreglo[x].estado_oferta)==1){
    todo+='<h3 class="text-primary fw-bold">S/. '+calc+'</h3>';	
    todo+='<div class="text-center text-decoration-line-through text-danger"> S/. '+arreglo[x].preciosugerido+'</div>';
    }else{
    todo+='<h3 class="text-primary fw-bold">S/. '+arreglo[x].preciosugerido+'</h3>';
    todo+='<div style="height:19px;">';
    todo+='</div>';
    }
    //todo+='<form action="{{ route('cart.store') }}" method="POST">';
    //todo+='{{ csrf_field() }}';
    //todo+='<input type="hidden" value="'+arreglo[x].producto_id+'" id="id" name="id">';
    //todo+='<input type="hidden" value="'+arreglo[x].nameproducto+'" id="name" name="name">';
    //todo+='<input type="hidden" value="'+arreglo[x].razonsocial+'" id="razonsocial" name="razonsocial">';
    //todo+='<input type="hidden" value="'+arreglo[x].empresa_id+'" id="empresa_id" name="empresa_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].cobertura_id+'" id="idcobertura" name="idcobertura">';
    //todo+='<input type="hidden" value="'+arreglo[x].nuevaoferta+'" id="price" name="price">';
    //todo+='<input type="hidden" value="'+arreglo[x].precioEnvio_id+'" id="precioenvio" name="precioenvio">';
    //todo+='<input type="hidden" value="'+arreglo[x].diasestimados_id+'" id="diasestimados" name="diasestimados">';
    //todo+='<input type="hidden" value="'+arreglo[x].ubigeocobertura_id+'" id="ubigeocobertura_id" name="ubigeocobertura_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].imgprincipal+'" id="img" name="img">';
    //todo+='<input type="hidden" value="'+arreglo[x].slug+'" id="slug" name="slug">';
    //todo+='<input type="hidden" value="1" id="quantity" name="quantity">';
    todo+='<div class="btn-group mt-3" role="group" aria-label="Basic example">';
    //todo+='<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto'+arreglo[x].producto_id+'"type="button">Información</button>';
    //todo+='<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>';
    todo+='<a class="btn btn-primary" href="{{url('/Empresas_Kunaq')}}/'+arreglo[x].slug+'">Ir a la tienda <i class="bi bi-shop"></i></a>';
    todo+='</div>';
    //todo+='</form>';
    todo+='</div>';    
    todo+='</div>';
    todo+='</div>'; 

//console.log(todo);
$('#ruet').append(todo);
}
});

});
//script para seleccionar el precio
$("select[name=precio_ku]").change(function () {
       var preci= $(this).val();
    //console.log(preci);
$.ajax({
   url: '/empre/precimarc',
   method:'POST',
   data:{
    subcategoria_id:$('input[name="subcate_id"]').val(),
    nuevaoferta:parseFloat(preci),
    _token:$('input[name="_token"]').val()
   
    }
}).done(function(res){
  // alert(res);
  var arreglo = res.productos;
  $("#ruet").html("");
for(var x=0;x<arreglo.length;x++){
    var todo='<tr><td>'+arreglo[x].producto_id+'</td>';
   var todo='<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">';
    todo+='<div class="card shadow-sm">';
    todo+='<div class="card-header bg-warning">';
    todo+='<div class="row">';
    todo+='<div class="col-8">';
    todo+='<span class="float-start text-white fw-bold">'+arreglo[x].nameproducto+'</span>';
    todo+='</div>';
    todo+='<div class="col-4">';
    var calc=0;
    if((arreglo[x].estado_oferta)==1){
    todo+='<span class="float-end badge rounded-pill bg-danger">'+arreglo[x].oferta+'% DCTO</span>';
    var precio_sug=arreglo[x].preciosugerido;
    var ofer=arreglo[x].oferta;
    calc=precio_sug - (precio_sug * ofer)/100;
    calc = calc.toFixed(2);
    }else{
    todo+='<span style="height:43px;">';
    todo+='</span>';
    }
    todo+='</div>';
    todo+='</div>';
    todo+='</div>';
    todo+='<div class="card-body text-center">';
        todo+='<img src="/public/images_product/'+arreglo[x].imgprincipal+'" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">';
    todo+='<h6 class="text-center text-muted fw-light pt-1">'+arreglo[x].marca+'</h6>';

    
    if((arreglo[x].estado_oferta)==1){
    todo+='<h3 class="text-primary fw-bold">S/. '+calc+'</h3>';	
    todo+='<div class="text-center text-decoration-line-through text-danger"> S/. '+arreglo[x].preciosugerido+'</div>';
    }else{
    todo+='<h3 class="text-primary fw-bold">S/. '+arreglo[x].preciosugerido+'</h3>';
    todo+='<div style="height:19px;">';
    todo+='</div>';
    }
    //todo+='<form action="{{ route('cart.store') }}" method="POST">';
    //todo+='{{ csrf_field() }}';
    //todo+='<input type="hidden" value="'+arreglo[x].producto_id+'" id="id" name="id">';
    //todo+='<input type="hidden" value="'+arreglo[x].nameproducto+'" id="name" name="name">';
    //todo+='<input type="hidden" value="'+arreglo[x].razonsocial+'" id="razonsocial" name="razonsocial">';
    //todo+='<input type="hidden" value="'+arreglo[x].empresa_id+'" id="empresa_id" name="empresa_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].cobertura_id+'" id="idcobertura" name="idcobertura">';
    //todo+='<input type="hidden" value="'+arreglo[x].nuevaoferta+'" id="price" name="price">';
    //todo+='<input type="hidden" value="'+arreglo[x].precioEnvio_id+'" id="precioenvio" name="precioenvio">';
    //todo+='<input type="hidden" value="'+arreglo[x].diasestimados_id+'" id="diasestimados" name="diasestimados">';
    //todo+='<input type="hidden" value="'+arreglo[x].ubigeocobertura_id+'" id="ubigeocobertura_id" name="ubigeocobertura_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].imgprincipal+'" id="img" name="img">';
    //todo+='<input type="hidden" value="'+arreglo[x].slug+'" id="slug" name="slug">';
    //todo+='<input type="hidden" value="1" id="quantity" name="quantity">';
    todo+='<div class="btn-group mt-3" role="group" aria-label="Basic example">';
    //todo+='<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto'+arreglo[x].producto_id+'"type="button">Información</button>';
    //todo+='<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>';
    todo+='<a class="btn btn-primary" href="{{url('/Empresas_Kunaq')}}/'+arreglo[x].slug+'">Ir a la tienda <i class="bi bi-shop"></i></a>';
    todo+='</div>';
    //todo+='</form>';
    todo+='</div>';    
    todo+='</div>';
    todo+='</div>'; 

//console.log(todo);
$('#ruet').append(todo);
}
});

});
//script para seleccionar el genero
$("select[name=genero_ku]").change(function () {
       var gene= $(this).val();
//     console.log(dato);
$.ajax({
   url: '/empre/genemarc',
   method:'POST',
   data:{
    subcategoria_id:$('input[name="subcate_id"]').val(),
    genero:gene,
    _token:$('input[name="_token"]').val()
   
    }
}).done(function(res){
  // alert(res);
  var arreglo = res.productos;
  $("#ruet").html("");
for(var x=0;x<arreglo.length;x++){
    var todo='<tr><td>'+arreglo[x].producto_id+'</td>';
   var todo='<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">';
    todo+='<div class="card shadow-sm">';
    todo+='<div class="card-header bg-warning">';
    todo+='<div class="row">';
    todo+='<div class="col-8">';
    todo+='<span class="float-start text-white fw-bold">'+arreglo[x].nameproducto+'</span>';
    todo+='</div>';
    todo+='<div class="col-4">';
    var calc=0;
    if((arreglo[x].estado_oferta)==1){
    todo+='<span class="float-end badge rounded-pill bg-danger">'+arreglo[x].oferta+'% DCTO</span>';
    var precio_sug=arreglo[x].preciosugerido;
    var ofer=arreglo[x].oferta;
    calc=precio_sug - (precio_sug * ofer)/100;
    calc = calc.toFixed(2);
    }else{
    todo+='<span style="height:43px;">';
    todo+='</span>';
    }
    todo+='</div>';
    todo+='</div>';
    todo+='</div>';
    todo+='<div class="card-body text-center">';
        todo+='<img src="/public/images_product/'+arreglo[x].imgprincipal+'" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">';
    todo+='<h6 class="text-center text-muted fw-light pt-1">'+arreglo[x].marca+'</h6>';

    
    if((arreglo[x].estado_oferta)==1){
    todo+='<h3 class="text-primary fw-bold">S/. '+calc+'</h3>';	
    todo+='<div class="text-center text-decoration-line-through text-danger"> S/. '+arreglo[x].preciosugerido+'</div>';
    }else{
    todo+='<h3 class="text-primary fw-bold">S/. '+arreglo[x].preciosugerido+'</h3>';
    todo+='<div style="height:19px;">';
    todo+='</div>';
    }
    //todo+='<form action="{{ route('cart.store') }}" method="POST">';
    //todo+='{{ csrf_field() }}';
    //todo+='<input type="hidden" value="'+arreglo[x].producto_id+'" id="id" name="id">';
    //todo+='<input type="hidden" value="'+arreglo[x].nameproducto+'" id="name" name="name">';
    //todo+='<input type="hidden" value="'+arreglo[x].razonsocial+'" id="razonsocial" name="razonsocial">';
    //todo+='<input type="hidden" value="'+arreglo[x].empresa_id+'" id="empresa_id" name="empresa_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].cobertura_id+'" id="idcobertura" name="idcobertura">';
    //todo+='<input type="hidden" value="'+arreglo[x].nuevaoferta+'" id="price" name="price">';
    //todo+='<input type="hidden" value="'+arreglo[x].precioEnvio_id+'" id="precioenvio" name="precioenvio">';
    //todo+='<input type="hidden" value="'+arreglo[x].diasestimados_id+'" id="diasestimados" name="diasestimados">';
    //todo+='<input type="hidden" value="'+arreglo[x].ubigeocobertura_id+'" id="ubigeocobertura_id" name="ubigeocobertura_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].imgprincipal+'" id="img" name="img">';
    //todo+='<input type="hidden" value="'+arreglo[x].slug+'" id="slug" name="slug">';
    //todo+='<input type="hidden" value="1" id="quantity" name="quantity">';
    todo+='<div class="btn-group mt-3" role="group" aria-label="Basic example">';
    //todo+='<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto'+arreglo[x].producto_id+'"type="button">Información</button>';
    //todo+='<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>';
    todo+='<a class="btn btn-primary" href="{{url('/Empresas_Kunaq')}}/'+arreglo[x].slug+'">Ir a la tienda <i class="bi bi-shop"></i></a>';
    todo+='</div>';
    //todo+='</form>';
    todo+='</div>';    
    todo+='</div>';
    todo+='</div>'; 

//console.log(todo);
$('#ruet').append(todo);
}
});

});
//script para seleccionar la oferta
$("select[name=oferta_ku]").change(function () {
       var ofer= $(this).val();
//     console.log(dato);
$.ajax({
   url: '/empre/ofermarc',
   method:'POST',
   data:{
    subcategoria_id:$('input[name="subcate_id"]').val(),
    oferta:ofer,
    _token:$('input[name="_token"]').val()
   
    }
}).done(function(res){
  // alert(res);
  var arreglo = res.productos;
  $("#ruet").html("");

for(var x=0;x<arreglo.length;x++){
    var todo='<tr><td>'+arreglo[x].producto_id+'</td>';
   var todo='<div class="col-sm-12 col-md-4 col-lg-3 py-2" align="center">';
    todo+='<div class="card shadow-sm">';
    todo+='<div class="card-header bg-warning">';
    todo+='<div class="row">';
    todo+='<div class="col-8">';
    todo+='<span class="float-start text-white fw-bold">'+arreglo[x].nameproducto+'</span>';
    todo+='</div>';
    todo+='<div class="col-4">';
    var calc=0;
    if((arreglo[x].estado_oferta)==1){
    todo+='<span class="float-end badge rounded-pill bg-danger">'+arreglo[x].oferta+'% DCTO</span>';
    var precio_sug=arreglo[x].preciosugerido;
    var ofer=arreglo[x].oferta;
    calc=precio_sug - (precio_sug * ofer)/100;
    calc = calc.toFixed(2);
    }else{
    todo+='<span style="height:43px;">';
    todo+='</span>';
    }
    todo+='</div>';
    todo+='</div>';
    todo+='</div>';
    todo+='<div class="card-body text-center">';
        todo+='<img src="/public/images_product/'+arreglo[x].imgprincipal+'" class="rounded img-fluid" style="width:180px; height: 180px;" alt="">';
    todo+='<h6 class="text-center text-muted fw-light pt-1">'+arreglo[x].marca+'</h6>';

    
    if((arreglo[x].estado_oferta)==1){
    todo+='<h3 class="text-primary fw-bold">S/. '+calc+'</h3>';	
    todo+='<div class="text-center text-decoration-line-through text-danger"> S/. '+arreglo[x].preciosugerido+'</div>';
    }else{
    todo+='<h3 class="text-primary fw-bold">S/. '+arreglo[x].preciosugerido+'</h3>';
    todo+='<div style="height:19px;">';
    todo+='</div>';
    }
    //todo+='<form action="{{ route('cart.store') }}" method="POST">';
    //todo+='{{ csrf_field() }}';
    //todo+='<input type="hidden" value="'+arreglo[x].producto_id+'" id="id" name="id">';
    //todo+='<input type="hidden" value="'+arreglo[x].nameproducto+'" id="name" name="name">';
    //todo+='<input type="hidden" value="'+arreglo[x].razonsocial+'" id="razonsocial" name="razonsocial">';
    //todo+='<input type="hidden" value="'+arreglo[x].empresa_id+'" id="empresa_id" name="empresa_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].cobertura_id+'" id="idcobertura" name="idcobertura">';
    //todo+='<input type="hidden" value="'+arreglo[x].nuevaoferta+'" id="price" name="price">';
    //todo+='<input type="hidden" value="'+arreglo[x].precioEnvio_id+'" id="precioenvio" name="precioenvio">';
    //todo+='<input type="hidden" value="'+arreglo[x].diasestimados_id+'" id="diasestimados" name="diasestimados">';
    //todo+='<input type="hidden" value="'+arreglo[x].ubigeocobertura_id+'" id="ubigeocobertura_id" name="ubigeocobertura_id">';
    //todo+='<input type="hidden" value="'+arreglo[x].imgprincipal+'" id="img" name="img">';
    //todo+='<input type="hidden" value="'+arreglo[x].slug+'" id="slug" name="slug">';
    //todo+='<input type="hidden" value="1" id="quantity" name="quantity">';
    todo+='<div class="btn-group mt-3" role="group" aria-label="Basic example">';
    //todo+='<button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#infoproducto'+arreglo[x].producto_id+'"type="button">Información</button>';
    //todo+='<button class="btn btn-primary" type="submit"><i class="bi bi-cart-plus-fill"></i></button>';
    todo+='<a class="btn btn-primary" href="{{url('/Empresas_Kunaq')}}/'+arreglo[x].slug+'">Ir a la tienda <i class="bi bi-shop"></i></a>';
    todo+='</div>';
    //todo+='</form>';
    todo+='</div>';    
    todo+='</div>';
    todo+='</div>'; 

//console.log(todo);
$('#ruet').append(todo);
}
});

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