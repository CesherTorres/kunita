@extends('plantilla.principal')

@section('title', 'Productos')

@section('css')
   
@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/images/kunaq-white.png" alt="Logo" class="me-2 my-1" style="width: 8rem;">
            </div>
        </div>
        <div class="user border-bottom">
            <div class="brand-link  brand-logo-primary navbar-primary mx-2 my-3">
                <img src="/public/userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/home') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresa_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            <a href="{{ url('/productos_asesor') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            <a href="{{ url('/solicitudesproductos_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h3 class="text-success fw-bold mb-0"><i class="bi bi-shop me-2"></i> Producto: {{$producto->nameproducto}} ({{$producto->estado}})</h3>
                <p class="lead text-muted">Se muestra el detalle del producto</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a href='/porproductospdfA/{{$producto->id}}' class="btn btn-primary w-100 align-self-center" target="blank">Descargar</a>
            </div>
        </div>
        <div class="card card-primary card-outline">
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
                                    <div class="card bg-white text-white text-center" style="min-height: 170px; max-height: 170px">
                                        <img for="uploadImage1" id="uploadPreview1" alt="Logo" width="170" height="200" src="/public/images_product/{{$producto->imgprincipal}}">
                                    </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-1" style="background: #FFFEC8; border-radius:10px;">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="oferta-label">
                                    <label class="form-check-label" for="ofertalabel">Oferta</label>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 mb-1">               
                                    <p class="fw-normal">Descripción:</p>
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
    </div>
</section>
@endsection

@section('js')
       
@endsection