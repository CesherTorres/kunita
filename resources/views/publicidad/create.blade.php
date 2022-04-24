@extends('plantilla.principal')

@section('title', 'Publicidad')

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
            <a href="{{ url('/empresas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/publicidad') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
                @endcan
            @else
                    <a href="{{ url('/publicidad') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
            @endif
            <a href="{{ url('/productos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/Asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
                @endcan
            @else
                <a href="{{ url('/Asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
            @endif
            <a href="{{ url('/solicitudesproductos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-newspaper me-2"></i> Publicidad</h1>
                <p class="text-muted">Registra una nueva publicidad.</p>
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
        <form method="post" name="new_purchase" id="new_purchase" action="/publicidad" enctype="multipart/form-data">
            @csrf  
            <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
                <div class="card-body">  
                    
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="titulo" class="form-label">Titulo(*)</label>
                            <input type="text" name="titulo" id="titulo" class="form-control form-control-sm"  required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">            
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="propietario" class="form-label">Propietario(*)</label>
                            <input type="text" name="propietario" id="propietario" class="form-control form-control-sm"  required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="80">            
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="correo" class="form-label">Email Empresa(*)</label>
                            <input type="email" name="correo" id="correo" class="form-control form-control-sm"  required maxLength="60">            
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="telefono" class="form-label">Telefono Empresa(*)</label>
                            <input type="text" name="telefono" id="telefono" class="form-control form-control-sm"  required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9"> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="tipo" class="form-label">Tipo(*)</label>
                            <select class="form-select form-select-sm" onChange="mostrar(this.value)" name="tipo" id="tipo" required>
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">--Seleccione--</option>
                                <option value="Comercio">Comercio</option> 
                                <option value="Produccion">Produccion</option>
                                <option value="Servicio">Servicio</option>
                                <option value="Agropecuario">Agropecuario</option>  
                                <option value="Slider">Slider Tienda</option>  
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="enlace" class="form-label">Enlace de redireccionamiento (URL)(*)</label>
                            <input type="text" name="enlace" id="enlace" class="form-control form-control-sm"  required maxlength="190"> 
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="descripcion" class="form-label">Descripción(*)</label>
                            <textarea class="form-control" name="descripcion" placeholder="Max. 50 caracteres" id="descripcion" rows="3" required maxlength="50"></textarea>           
                            <div id="slider">
                                <p class="text-muted">Para que la imagen del slider se pueda ver bien, asegúrese que el tamaño sea de 1400px de ancho por 500px de alto</p>
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="categorias" class="form-label">Imagen especial(*)</label>
                            <div class="card bg-white text-white text-center" style="min-height: 202px; max-height: 202px">
                                <label for="uploadImage1" class="font-weight-light mb-0">
                                    <img for="uploadImage1" id="uploadPreview1" class="imgespecial" src="/images/image_update.png" />
                                </label>
                                <input id="uploadImage1" class="form-control-file" type="file" name="imagen" onchange="previewImage(1);" hidden required/>
                            </div>
                            
                        </div>
                    </div> 
                        
                </div> {{--.card-body --}}
            </div>
            
            <br>
            <div class="form-group text-center">
                <a class="btn btn-outline-secondary btn-lg" href="{{ url('/publicidad') }}" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
            </div>
        </form>   
        <br>
    </div>
</section>
@endsection

@push('script')
<script>
    $("#slider").hide();

    function mostrar(id)
        {
            if (id == "Slider")
            {
                $("#slider").show();
            }
            
            if (id == "Comercio" || id == "Produccion" || id == "Servicio" || id == "Agropecuario")
            {
                $("#slider").hide();
            }
        }
</script>
@endpush

@section('js')
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script>
            function previewImage(nb) {        
                var reader = new FileReader();         
                reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
                reader.onload = function (e) {             
                    document.getElementById('uploadPreview'+nb).src = e.target.result;         
                };     
            }
        </script>
@endsection