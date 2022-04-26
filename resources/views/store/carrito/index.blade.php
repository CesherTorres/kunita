@extends('plantilla.store2')

@section('title', 'Carrito de Compra')

@section('css')
<link rel="stylesheet" type="text/css" href="/cart/animate.css">
<link rel="stylesheet" type="text/css" href="/cart/chosen.min.css">
<link rel="stylesheet" type="text/css" href="/cart/style.css">
<link rel="stylesheet" type="text/css" href="/css/step.css">
<link rel="stylesheet" type="text/css" href="/cart/color-01.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
	{{--  --}}
        <!-- barra de navegacion -->
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img src="images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 10rem;">
            	<div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form action="{{ route('buscar')}}" class="d-flex mt-3 mt-lg-0 col-12 col-md-12 col-lg-6" autocomplete="off" >
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
                    </ul>
              	</div>
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
        <br>
        <div class="container">
            <div class="card shadow my-4">
                <div class="card-header bg-primary text-white fw-bold">
                    Detalles de la compra
                </div>
                <div class="card-body">
                    
                            <div class="text-end">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger fw-bold" >VACIAR CARRITO</button>
                                </form>
                            </div>           
                    <form method="post" id="regForm" action="/ventasCliente" enctype="multipart/form-data">
                        @csrf
                        <div class="tab">
                            <div class="wrap-iten-in-cart">
                                            @php 
                                            echo '<script language="JavaScript" type="text/javascript">';
                                            echo "var contador=[];";
                                            echo "var operacion = [];";
                                            echo "var suma=0;";
                                            echo "var ubi2 = 0;";
                                            echo "var ubi1 = [];";
                                            echo "var numero = [];";
                                            echo "var tati = [];";
                                            echo "var v = 0;";
                                            echo "var t = 0;";
                                        // echo "var op=0;";
                                        // echo "ubi2 = document.getElementById('ubigeo_select').value;";
                                            echo "</script>";
                                            @endphp
                                            @foreach($gamas as $gama)                            
                                            @php
                                            echo '<script language="JavaScript" type="text/javascript">';
                                            echo "ubi1[v] = ".$gama->ubigeocobertura_id.";";
                                            echo "tati[v] = ".$gama->id.";";
                                            //  echo "console.log(ubi2);";
                                                
                                            
                                                
                                                echo " v = v + 1;";
                                                echo "</script>";   
                                            @endphp   
                                            @endforeach
                                        
                                    @if(count(\Cart::getContent()) > 0)
                                    <div class="row">
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label for="ubigeo_id" class="form-label fw-bold">Distrito/Provincia/Departamento(*)</label>
                                            <select onchange="operacion();" class="form-select form-select-sm js-example-basic-single" name="ubigeo_select" id="ubigeo_select" required data-width="100%">
                                                <option value="" disabled="disabled" selected="selected" hidden="hidden"></option>
                                                @foreach($ubigeo as $ub)
                                                    <option value="{{$ub->id}}">{{$ub->departamento. ', '.$ub->provincia. ', '.$ub->distrito}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label for="direccion" class="form-label fw-bold">Direccion</label>
                                            <input type="text" name="diireccion" id="diirecion" class="form-control form-control-sm" required maxLength="40"> 
                                        </div>
                                        <div class="col-12 col-md-4 col-lg-4">
                                            <label for="direccion" class="form-label fw-bold">Referencia</label>
                                            <input type="text" name="referencias" id="referencia" class="form-control form-control-sm" required  maxLength="50">
                                        </div>
                                    </div>

                                    <h3 class="box-title pt-2">Productos agregados</h3>
                                    @php
                                    $total=0;
                                    @endphp
                                    @foreach(\Cart::getContent() as $key=>$item)
                                    <ul class="products-cart">
                                        <li class="pr-cart-item">
                                            <div class="product-name col-12 col-md-3">
                                                <figure><img src="/images_product/{{ $item->attributes->imgprincipal }}"
                                                    style="width: 70px; height: 70px;"></figure>
                                            </div>
                                            <div class="product-name col-12 col-md-3">
                                                <p class="fw-bold lead text-center">{{$item->name}}</p>
                                                <p class="fw-normal text-center">{{$item->razonsocial}}</p>
                                                <small class="fw-lighter" id='m{{$item->id}}'></small>

                                                <input type="hidden" value="{{$item->ubigeocobertura_id}}" id="ubigeo_cobertura" name="ubigeo_cobertura">
                                                <input type="hidden" value="{{$item->id}}" id="producto" name="producto[]">
                                                <input type="hidden" value="{{$item->quantity}}" id="cantidades" name="cantidades[]">
                                                <input type="hidden" value="{{$item->price}}" id="pventa" name="pventa[]">
                                                <input type="hidden" value="{{$item->diasestimados}}" id="fechas" name="fechas">
                                                <input type="hidden" value="{{$item->empresa_id}}" id="empresas" name="empresas">
                                                <input type="hidden" value="{{$item->idcobertura}}" id="idcobertura" name="idcobertura">
                                                <input type="hidden" value="{{ \Cart::getTotal() }}" id="totalidad" name="totalidad">
                                                <input type="hidden" value="{{$item->ubigeocobertura_id}}" id="ubigeo" name="ubigeo">
                                                <input type="hidden" value="{{$item->precioenvio}}" id="precioenvio" name="precioenvio">
                                            </div>
                                            <input name="oculto" id="oculto" type="hidden" value="{{$item->price}}">      
                                            <!-- <input type='button' value='Click' onClick='menosfunction({{$item->price}},{{$item->id}});' /> -->
                                            
                                            <div class="product-name col-12 col-md-2 text-center"><p class="fw-bold text-center">C/U</p><p class="price fs-5 fw-light">S/.{{$item->price}}</p></div>
                                            <div class="quantity product-name">
                                                <div class="quantity-input col-12 col-md-1 d-flex text-center float-center">
                                                    <a class="btn btn-reduce"  onclick="masfu({{$item->price}},{{$item->id}},$(this),{{$key}},'restar');"></a>
                                                    <a class="btn btn-increase"  onclick="masfu({{$item->price}},{{$item->id}},$(this),{{$key}},'sumar');"></a>
                                                    <input type="number" class="quantity" min="1" name="product-quatity" id="product-quatity" value="{{$item->quantity}}" data-max="120" pattern="[0-9]*" >									
                                                </div>
                                            </div>
                                        
                                            <div class="product-name sub-total col-12 col-md-2 text-center"><p class="price"><div class="fs-4 text-primary fw-normal" id="{{$item->id}}">S/.{{floatval($item->price)*intval($item->quantity)}}</div></p>
                                            
                                            @php 
                                            echo '<script language="JavaScript" type="text/javascript">';
                                            
                                            echo "function cambio(){";
                                            echo "numero[t] = ".$item->id.";";
                                            //echo "ubi2 = document.getElementById('ubigeo_select').value;";
                                            echo "console.log('nume_'+numero[t]);";
                                            echo " t = t + 1;";
                                            echo " }";
                                            echo "</script>";
                                            @endphp
                                            @php 
                                            echo '<script language="JavaScript" type="text/javascript">';
                                            echo "cambio();";
                                            echo "</script>";
                                            @endphp
                                            
                                            </h3></p></div>
                                            <div class="product-name col-12 col-md-1 text-center">
                                                <a href="/removes/{{$item->id}}/eliminar">
                                                    <span class="glyphicon glyphicon-remove-sign" style="color:red"> 
                                                        <i class="fa fa-times-circle fa-2x" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    @php
                                    $subtotal=floatval($item->price)*intval($item->quantity);
                                    $total+=$subtotal;
                                    @endphp
                                    @endforeach												

                                    <div class="summary">
                                        <div class="order-summary">
                                            <h4 class="title-box">Resumen de la compra</h4>
                                            <p class="summary-info">
                                                <span class="title fw-bold fs-4">Subtotal</span>
                                                    <div class="row justify-content-end">
                                                        <div class="col-12 col-md-3 text-end"><b class="index"></b><div class="fw-bold fs-4" id="subtot">S/.{{$total}}</div>
                                                        <input type="hidden" value="{{$total}}" id="subtots" name="subtots">
                                                        </div>
                                                    </div>
                                                <span class="title fw-bold fs-4">Monto por Envio</span>
                                                    <div class="row justify-content-end">
                                                        <div class="col-12 col-md-3 text-end"><b class="index"></b><div class="fw-bold fs-4" id='enviitos'>S/0.00</div>
                                                        <input type="hidden" value="{{$total}}" id="subtots" name="subtots">
                                                        </div>
                                                    </div>
                                            </p>
                                            {{-- <p class="summary-info total-info ">
                                                <span class="title">Total</span>
                                                    <div class="row justify-content-end">
                                                        <div class="col-12 col-md-1"><div id="tot"></div>
                                                        </div>
                                                    </div>
                                            </p> --}}
                                            <input type="hidden" id="tot" name="tot">
                                        </div>

                                        
                                    </div>
                                
                                @else
                                    <div align="center" class="pb-5">
                                        <div class="card my-2 mb-2" style="width:400px">
                                            <h5 class="card-header">Atencion</h5>
                                            <div class="card-body">
                                                <h5 class="card-title">!!SU CARRITO ESTA VACIO</h5>
                                                <button class="btn btn-primary"><a href="/tienditas" class="text-white">IR A COMPRAR</a></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab">
                            <div class="summary">
                                <div class="order-summary">
                                    <h4 class="title-box pt-0">Datos del cliente</h4>
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 px-4">
                                            <div class="form-group my-2">
                                                <label for="nombres" class="form-label fw-bold">Nombre y Apellidos:</label>
                                                <input type="text" name="nombres" id="nombres" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="correos" class="form-label fw-bold">Correo Electronico:</label>
                                                <input type="email" name="correos" id="correos" class="form-control form-control-sm" required maxLength="40">
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="Tdocumentos" class="form-label fw-bold">Tipo Identificación(*)</label>
                                                <select class="form-select form-select-sm js-example-basic-single" name="Tdocumentos" id="Tdocumentos" data-width="100%">
                                                    <option value="" disabled="disabled" selected="selected" hidden="hidden"> --Seleccione-- </option>
                                                    <option value="DNI">DNI</option> 
                                                    <option value="Pasaporte">Pasaporte</option>
                                                    <option value="Carne de extranjeria">Carne de extranjería</option>
                                                    <option value="Otro">Otro</option>  
                                                </select>
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="Ndocumentos" class="form-label fw-bold">Nro de Documento:</label>
                                                <input type="text" name="Ndocumentos" id="Ndocumentos" class="form-control form-control-sm" required onpaste="return false" maxLength="40">
                                            </div>
                                            <div class="form-group my-2">
                                                <label for="telefonos" class="form-label fw-bold">Telefono:</label>
                                                <input type="text" name="telefonos" id="telefonos" class="form-control form-control-sm" required onpaste="return false" maxLength="40">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <img src="/svg/compras.svg" class="img-fluid mb-5" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="overflow:auto;">
                            <div class="mx-5" style="float:right;">
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)">ATRAS</button>
                            <button type="button" id="nextBtn" onclick="nextPrev(1)">SIGUIENTE </button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('js')
    <script src="/js/step.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
       console.log(document.getElementById('empresas').value);
    </script>
    <script language="JavaScript" type="text/javascript">
    function operacion(){
        console.log(document.getElementById('ubigeo_select').value);
        ubi2 = document.getElementById('ubigeo_select').value;
        cob1= document.getElementById('precioenvio').value;
        let arr=[cob1];
        let unicos = new Set([arr]);
       for(let ros=0;ros<numero.length;ros++){
           for(let pil=0;pil<ubi1.length;pil++){
        
        // console.log('sele_'+ubi2);
        // console.log('cober_'+ubi1[pil]);
        // console.log('num_'+numero[ros]);
        // console.log('tati_'+tati[pil]);
        
        if((ubi2==ubi1[pil])&&(numero[ros]==tati[pil])){
            for (let item of unicos)
            document.getElementById('enviitos').innerHTML = 'S/'+item;
document.getElementById('m'+numero[ros]).innerHTML ='El producto se encuentra disponible en tu zona';
document.getElementById('m'+numero[ros]).style.color ='green';
                 break;
                        } 
        if((ubi2!=ubi1[pil])&&(numero[ros]==tati[pil])){
        document.getElementById('m'+numero[ros]).innerHTML ='Lo sentimos, este producto no se encuentra disponible en tu zona. No se añadirá a tu compra';
        document.getElementById('m'+numero[ros]).style.color ='red';
                    }
                }
       }
        $.ajax({
       url: '/update-cobertura',
       method:'POST',
       data:{
        id:document.getElementById('ubigeo_select').value,
        empresa_id:document.getElementById('empresas').value,
        _token:$('input[name="_token"]').val()
       
        }
    }).done(function(res){
        if(res.empresa){
        document.getElementById('enviitos').innerHTML = 'S/'+res.empresa.precioenvio;
        }else{
            document.getElementById('enviitos').innerHTML = 'S/'+0.00;
        }
        console.log(res.empresa);
      // alert(res);
        //var arreglo = res.productos;
    });
    }
    </script>
    
    <script>
        // disable mousewheel on a input number field when in focus
        // (to prevent Cromium browsers change the value when scrolling)
        $('form').on('focus', 'input[type=number]', function (e) {
        $(this).on('wheel.disableScroll', function (e) {
            e.preventDefault()
        })
        })
        $('form').on('blur', 'input[type=number]', function (e) {
        $(this).off('wheel.disableScroll')
        })
    </script>
    
 @endsection
