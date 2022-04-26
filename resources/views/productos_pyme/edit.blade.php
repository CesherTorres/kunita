@extends('plantilla.pyme')

@section('title', 'Actualizar Producto')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                <img src="/logos/{{Auth::user()->propietario->empresas->logoempresa}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem; height: 2rem;">
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
                <h3 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-shop me-2"></i> Actualizar Producto</h3>
                <p class="text-muted">Actualiza los datos del producto</p>
            </div>
            <div class="col-lg-3 d-flex">
                {{-- <button class="btn btn-primary w-100 align-self-center">Nueva Empresa</button> --}}
                {{-- <div class="btn-group w-100 align-self-center btn-sm pt-0" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="success-outlined"><i class="bi bi-grid-3x2"></i></label>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="danger-outlined"><i class="bi bi-image"></i></label>
                </div> --}}
            </div>
        </div>
        <p class="text-muted text-start">(*) - Campos obligatorios</p>
        <form method="post" name="new_purchase" id="new_purchase" action="/productos_pyme/{{$producto->id}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
                <div class="card-body">           
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="nameproducto" class="form-label">Nombre del Producto(*)</label>
                            <input type="text" name="nameproducto" id="nameproducto" value="{{$producto->nameproducto}}" class="form-control form-control-sm"  required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="80">                  
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="marca" class="form-label">Marca(*)</label>
                            <input type="text" name="marca" id="marca" value="{{$producto->marca}}" class="form-control form-control-sm"  required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">            
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="subcategoria_id" class="form-label">Categoria(*)</label>
                            <select class="form-select form-select-sm js-example-basic-single" name="subcategoria_id" id="subcategoria_id" required>
                                <option value="{{$producto->subcategoria->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->subcategoria->categoria->namecategoria.'/'.$producto->subcategoria->namesubcategoria}}</option>
                                @foreach($subcategorias as $subcategoria) 
                                    <option value="{{$subcategoria->id}}">{{$subcategoria->categoria->namecategoria. '/'.$subcategoria->namesubcategoria}}</option> 
                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="modelo" class="form-label">Modelo</label>
                            <input type="text" name="modelo" id="modelo" value="{{$producto->modelo}}" class="form-control form-control-sm" onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="80""> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">   
                            <label for="genero" class="form-label">Género</label>            
                            <select class="form-select form-select-sm" name="genero" id="genero">
                                <option value="{{$producto->genero}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->genero}}</option>
                                <option value="Masculino">Masculino</option> 
                                <option value="Femenino">Femenino</option>
                                <option value="Unisex">Unisex</option> 
                            </select>    
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="preciosugerido" class="form-label">Precio(*)</label>
                            <input type="text" name="preciosugerido" value="{{$producto->preciosugerido}}" id="preciosugerido" class="form-control form-control-sm"  required onkeypress="return solonumerospunto(event)" onpaste="return false" maxLength="6">            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">   
                            <label for="" class="form-label">Medidas</label>            
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-1">               
                                        <div class="form-group col-md-12 col-sm-12 mb-1 order-md-1">               
                                            <label for="alto" class="form-label">Alto</label>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" value="{{$producto->alto}}" name="alto" id="alto" onkeypress="return solonumerospunto(event)" onpaste="return false" maxLength="4">
                                                <span class="input-group-text" id="basic-addon1">cm.</span>
                                            </div>            
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 mb-1 order-3 order-md-2">               
                                            <label for="profundidad" class="form-label">Profundidad</label>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" value="{{$producto->profundidad}}" name="profundidad" id="profundidad" onkeypress="return solonumerospunto(event)" onpaste="return false" maxLength="4">
                                                <span class="input-group-text" id="basic-addon1">cm.</span>
                                            </div>            
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-1">               
                                        <div class="form-group col-md-12 col-sm-12 mb-1 order-3 order-md-2">               
                                            <label for="ancho" class="form-label">Ancho</label>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" value="{{$producto->ancho}}" name="ancho" id="ancho" onkeypress="return solonumerospunto(event)" onpaste="return false" maxLength="4">
                                                <span class="input-group-text" id="basic-addon1">cm.</span>
                                            </div>            
                                        </div>
                                        <div class="form-group col-md-12 col-sm-12 mb-1 order-3 order-md-2">               
                                            <label for="peso" class="form-label">Peso</label>
                                            <div class="input-group input-group-sm mb-3">
                                                <input type="text" class="form-control" value="{{$producto->peso}}" name="peso" id="peso" onkeypress="return solonumerospunto(event)" onpaste="return false" maxLength="4">
                                                <span class="input-group-text" id="basic-addon1">gr.</span>
                                            </div>            
                                        </div>          
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-1">  
                                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                                            <label for="temperatura" class="form-label">Temperatura de Conservacion</label>
                                            <input type="text" name="temperatura" id="temperatura" value="{{$producto->temperatura}}" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxLength="3">            
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-1">  
                                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                                            <label for="stock" class="form-label">Stock(*)</label>
                                            <input type="text" name="stock" id="stock" value="{{$producto->stock}}" class="form-control form-control-sm"  required onkeypress="return solonumerospunto(event)" onpaste="return false" maxLength="4">            
                                        </div>
                                    </div>
                                </div>        
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1 order-3">               
                        <label for="categorias" class="form-label">Imágenes (Izq. Der. Frontal)</label>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="card bg-white my-2 my-md-0 text-white" style="min-height: 202px; max-height: 202px;">
                                    <label for="uploadImage1" class="font-weight-light mb-0 align-middle text-center">
                                        <img for="uploadImage1" id="uploadPreview1" alt="Logo" width="170" height="200" src="/images_product/{{$producto->imguno}}">
                                    </label>
                                    <input id="uploadImage1" class="form-control-file" type="file" name="img-uno" onchange="previewImageizquierda(1);" hidden/>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="card bg-white text-white my-2 my-md-0" style="min-height: 202px; max-height: 202px">
                                    <label for="uploadImage2" class="font-weight-light mb-0 align-middle text-center">
                                        <img for="uploadImage2" id="uploadPreview2" alt="Logo" width="170" height="200" src="/images_product/{{$producto->imgdos}}">
                                    </label>
                                    <input id="uploadImage2" class="form-control-file" type="file" name="img-dos" onchange="previewImagefrente(2);" hidden/>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="card bg-white my-2 my-md-0 text-white" style="min-height: 202px; max-height: 202px">
                                    <label for="uploadImage3" class="font-weight-light mb-0 align-middle text-center">
                                        <img for="uploadImage3" id="uploadPreview3" alt="Logo" width="170" height="200" src="/images_product/{{$producto->imgtres}}">
                                    </label>
                                    <input id="uploadImage3" class="form-control-file" type="file" name="img-tres" onchange="previewImagederecha(3);" hidden/>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> 
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12  my-2 my-md-0 order-2 order-md-1">
                            <label for="descripcion" class="form-label ">Descripción</label>
                            <textarea class="form-control " placeholder="Max. 190 caracteres" id="descripcion" name="descripcion" rows="5" maxlength="190">{{$producto->descripcion}}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1 order-1 order-md-2">              
                                <label for="categorias" class="form-label">Imagen principal(*)</label>
                                <div class="card bg-white text-white" style="min-height: 170px; max-height: 170px">
                                    <label for="uploadImage4" class="font-weight-light mb-0 align-middle text-center">
                                        <img for="uploadImage4" id="uploadPreview4" alt="Logo" width="200" height="168"  src="/images_product/{{$producto->imgprincipal}}">
                                    </label>
                                    <input id="uploadImage4" class="form-control-file"  type="file" name="img-principal" onchange="previewImageespecial(4);" hidden/>
                                </div>
                        </div>
                    </div> 
                    <div class="row">
                    <div class="col-md-6 col-sm-12 mb-1 rounded" style="background: #FFFEC8;">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" {{$producto->estado_oferta==1?'checked':''}} value="1" name="estado_oferta" id="oferta-label">
                            <label class="form-check-label" for="ofertalabel">Oferta</label>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                            <label for="oferta" class="form-label">Oferta</label>
                            <input type="text" name="oferta" value="{{$producto->oferta}}" id="oferta" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxLength="2"> 
                        </div>
                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                            <input type="date" name="fecha_vencimiento" value="{{\Carbon\Carbon::parse($producto->fecha_vencimiento)->format('Y-m-d')}}" id="fecha_vencimiento" class="form-control form-control-sm"> 
                        </div><br>
                    </div> 
                    <div class="col col-md-6 col-sm-12">   
                        <label for="estado" class="form-label">Estado</label>            
                        <select class="form-select form-select-sm" name="estado" id="estado" required>
                            <option value="{{$producto->estado}}" disabled="disabled" selected="selected" hidden="hidden">{{$producto->estado}}</option>
                            <option value="Activo">Activo</option> 
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>            
                </div> {{--.card-body --}}
            </div>{{--.card --}}
               
            <div class="form-group text-center my-2">
                <a class="btn btn-outline-secondary btn-lg" href="{{ url('/productos_pyme') }}" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
            </div>
                
        </form>
        <br>
        
    </div>
    <br>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
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