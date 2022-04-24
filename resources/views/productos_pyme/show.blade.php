@extends('plantilla.pyme')

@section('title', 'Detalles Producto')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/css/icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

@endsection
 
@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
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
            <a href="{{ url('/perfil') }}" class=" text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Perfil</a>
            <a href="{{ url('/productos_pyme') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/cobertura') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-truck me-2 lead"></i>Cobertura</a>
            <a href="{{ url('/pedidos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-box-seam me-2 lead"></i> Pedidos</a>
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
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-shop me-2"></i> Producto: {{$producto->nameproducto}}</h1>
                <p class="text-muted">Se muestra el detalle del producto</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a href='/productopdfId/{{$producto->id}}' class="btn btn-primary w-100 align-self-center" target="blank">Descargar</a>
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
                  <div class="row">
                            <div class="form-group col-md-6 col-sm-12 mb-1">               
                                <p class="fw-normal">Empresa:</p>
                                <p class="fw-light border-bottom">{{$producto->empresa->razonsocial}}</p>         
                            </div>
                            <div class="form-group col-md-6 col-sm-12 mb-1">               
                                <p class="fw-normal">Marca:</p>
                                <p class="fw-light border-bottom">{{$producto->marca}}</p>            
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12 mb-1">               
                                <p class="fw-normal">Nombre del producto:</p>
                                <p class="fw-light border-bottom">{{$producto->nameproducto}}</p>    
                            </div>
                            <div class="form-group col-md-6 col-sm-12 mb-1">               
                                <p class="fw-normal">Modelo:</p>
                                <p class="fw-light border-bottom">{{$producto->modelo}}</p>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12 mb-1">
                                <div class="row">
                                    <div class="col col-md-6 col-sm-12">   
                                        <p class="fw-normal">Género:</p>
                                        <p class="fw-light border-bottom">{{$producto->genero}}</p> 
                                    </div>
                                    <div class="col col-md-6 col-sm-12">   
                                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                                            <p class="fw-normal">Precio:</p>
                                            <p class="fw-light border-bottom">S/. {{$producto->preciosugerido}}</p> 
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="form-group col-md-6 col-sm-12 mb-1">               
                                <p class="fw-normal">Categoría:</p>
                                <p class="fw-light border-bottom">{{$producto->subcategoria->categoria->namecategoria.'/'.$producto->subcategoria->namesubcategoria}}</p> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12 mb-1">   
                               <p class="fw-normal">Medidas:</p>           
                                    <div class="row">           
                                        <div class="form-group col-md-6 col-sm-12 mb-1 order-md-1">               
                                            <p class="fw-normal">Alto:</p>
                                            <p class="fw-light border-bottom">{{$producto->alto}} cm.</p>           
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 mb-1 order-3 order-md-2">               
                                            <p class="fw-normal">Profundidad:</p>
                                            <p class="fw-light border-bottom">{{$producto->profundidad}} cm.</p>             
                                        </div>       
                                        <div class="form-group col-md-6 col-sm-12 mb-1 order-3 order-md-2">               
                                            <p class="fw-normal">Ancho:</p>
                                            <p class="fw-light border-bottom">{{$producto->ancho}} cm.</p>          
                                        </div>
                                        <div class="form-group col-md-6 col-sm-12 mb-1 order-3 order-md-2">               
                                            <p class="fw-normal">Peso:</p>
                                            <p class="fw-light border-bottom">{{$producto->peso}} gr.</p>             
                                        </div>          
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-1">  
                                            <div class="form-group col-md-12 col-sm-12 mb-1">               
                                                <p class="fw-normal">Temperatura:</p>
                                                <p class="fw-light border-bottom">{{$producto->temperatura}}</p> 
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-1">  
                                            <div class="form-group col-md-12 col-sm-12 mb-1">               
                                                <p class="fw-normal">Stock:</p>
                                                <p class="fw-light border-bottom">{{$producto->stock}}</p>           
                                            </div>
                                        </div>
                                    </div>        
                            </div>
                            <div class="form-group col-md-6 col-sm-12 pt-2 pt-md-4 mb-1 order-3">               
                            <p class="fw-normal">Imágenes (Izq. Der. Frontal)</p>
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="card bg-white my-2 my-md-0 text-white" style="min-height: 202px; max-height: 202px;">
                                        <img for="uploadImage1" id="uploadPreview1" alt="Logo" width="170" height="200" src="/public/images_product/{{$producto->imguno}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="card bg-white text-white my-2 my-md-0" style="min-height: 202px; max-height: 202px">
                                        <img for="uploadImage1" id="uploadPreview1" alt="Logo" width="170" height="200" src="/public/images_product/{{$producto->imgdos}}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="card bg-white my-2 my-md-0 text-white" style="min-height: 202px; max-height: 202px">
                                        <img for="uploadImage1" id="uploadPreview1" alt="Logo" width="170" height="200" src="/public/images_product/{{$producto->imgtres}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12  my-2 my-md-0 order-2 order-md-1">
                                <p class="fw-normal">Descripción:</p>
                                <p class="fw-light border-bottom">{{$producto->descripcion}}</p>   
                            </div>
                            <div class="form-group col-md-6 col-sm-12 mb-1 order-1 order-md-2">              
                                     <p class="fw-normal">Imágen principal:</p>
                                    <div class="card bg-white text-white text-center" align="center" style="min-height: 170px; max-height: 170px">
                                        <img for="uploadImage1" id="uploadPreview1" alt="Logo" width="170" height="200" src="/public/images_product/{{$producto->imgprincipal}}">
                                    </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-1" style="background: #FFFEC8; border-radius:10px;">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" disabled type="checkbox" {{$producto->estado_oferta==1?'checked':''}} value="1" name="estado_oferta" id="oferta-label">
                                    <label class="form-check-label" for="ofertalabel">Oferta</label>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <p class="fw-normal">Oferta:</p>
                                <p class="fw-light border-bottom">{{$producto->oferta}}</p>   
                                </div>
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <p class="fw-normal">Descripción:</p>
                                <p class="fw-light border-bottom">{{$producto->fecha_vencimiento}}</p>   
                                </div><br>
                            </div> 
                        </div>                     
            </div>
        </div>
        
        <br>
        
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
<script>
    function previewImageizquierda(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);                
        reader.onload = function (e) {   
            document.getElementById('uploadPreview'+nb).src = e.target.result;                  
        };     
    }

    function previewImagefrente(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);                
        reader.onload = function (e) {   
            document.getElementById('uploadPreview'+nb).src = e.target.result;                  
        };    
    }

    function previewImagederecha(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);                
        reader.onload = function (e) {   
            document.getElementById('uploadPreview'+nb).src = e.target.result;                  
        };    
    }

    function previewImageespecial(nb) {        
        var reader = new FileReader();         
        reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);                
        reader.onload = function (e) {   
            document.getElementById('uploadPreview'+nb).src = e.target.result;                  
        };    
    }
</script>
@endsection