@extends('plantilla.principal')

@section('title', 'Solicitud')

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
                <img src="/userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
                @endcan
            @else
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
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
            <a class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
                <a href="{{ url('/solicitudes') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-4 mt-3"><i class="bi bi-people mx-2 mt-2"></i> Producto</a>
                <a href="{{ url('/solicitudesU') }}" class="btn rounded-pill text-start text-white d-block mx-4 mt-3"><i class="bi bi-people mx-2 mt-2"></i> Usuario</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h3 class="text-success fw-bold mb-0">Solicitud - 0001</h3>
                <p class="lead text-muted">Lorem ipsum dolor sit amet consectetur</p>
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
        <div class="card card-primary card-outline">
            <div class="card-body">           
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                        <label for="razonsocial" class="form-label">Nombre</label>
                        <input type="text" name="razonsocial" id="razonsocial" class="form-control form-control-sm"  required>            
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" name="marca" id="marca" class="form-control form-control-sm"  required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control form-control-sm"  required>            
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control form-control-sm"  required> 
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                        <label for="" class="form-label">Género</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="masculino" value="option1">
                            <label class="form-check-label" for="masculino">Masculino</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="femenino" value="option2">
                            <label class="form-check-label" for="femenino">Femenino</label>
                        </div> 
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select class="form-select form-select-sm" name="categoria_id" id="categoria_id" required>
                            <option  value="" disabled="disabled" selected="selected" hidden="hidden"> --Seleccione-- </option>
                            <option value="">Categoria</option> 
                            <option value="">Categoria</option>
                            <option value="">Categoria</option>
                            <option value="">Categoria</option>  
                        </select>      
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 col-sm-12 mb-1 order-2 order-md-1">               
                        <label for="precio" class="form-label">Alto</label>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" name="alto" id="alto">
                            <span class="input-group-text" id="basic-addon1">cm.</span>
                        </div>            
                    </div>
                    <div class="form-group col-md-3 col-sm-12 mb-1 order-3 order-md-2">               
                        <label for="precio" class="form-label">Ancho</label>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" name="alto" id="alto">
                            <span class="input-group-text" id="basic-addon1">cm.</span>
                        </div>            
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mb-1 order-1 order-md-3">               
                        <label for="subcategoria_id" class="form-label">Sub-Categoria</label>
                        <select class="form-select form-select-sm" name="subcategoria_id" id="subcategoria_id" required>
                            <option  value="" disabled="disabled" selected="selected" hidden="hidden"> --Seleccione-- </option>
                            <option value="">SubCategoria</option> 
                            <option value="">SubCategoria</option>
                            <option value="">SubCategoria</option>
                            <option value="">SubCategoria</option>  
                        </select> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 col-sm-12 mb-1 order-2 order-md-1">               
                        <label for="precio" class="form-label">Profundidad</label>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" name="alto" id="alto">
                            <span class="input-group-text" id="basic-addon1">cm.</span>
                        </div>
                        <div class="form-group mb-1">               
                            <label for="" class="form-label">Fecha vencimiento</label>
                            <input type="date" class="form-control form-control-sm"  aria-label="Username" aria-describedby="basic-addon1">                                         
                        </div>             
                    </div>
                    <div class="form-group col-md-3 col-sm-12 mb-1 order-1 order-md-2">               
                        <label for="precio" class="form-label">Peso</label>
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" name="alto" id="alto">
                            <span class="input-group-text" id="basic-addon1">gr.</span>
                        </div>           
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mb-1 order-3">               
                        <label for="categorias" class="form-label">Imágenes (Izq. Der. Frontal)</label>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <div class="card bg-white text-white" style="min-height: 202px; max-height: 202px">
                                    <img src="/images/image_update.png" alt="Logo" width="auto" height="200px">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="card bg-white text-white" style="min-height: 202px; max-height: 202px">
                                    <img src="/images/image_update.png" alt="Logo" width="auto" height="200px">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="card bg-white text-white" style="min-height: 202px; max-height: 202px">
                                    <img src="/images/image_update.png" alt="Logo" width="auto" height="200px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6 col-sm-12 my-1 order-2 order-md-1">               
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="habilitaroferta">
                            <label class="form-check-label" for="habilitaroferta">Habilitar oferta</label>
                        </div>
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="form-group mb-1">               
                                    <label for="" class="form-label">Oferta de</label>
                                    <div class="input-group input-group-sm mb-3">
                                        <input type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1">%</span>
                                    </div>           
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="" class="form-label">Fecha vencimiento</label>
                                    <input type="date" class="form-control form-control-sm"  aria-label="Username" aria-describedby="basic-addon1">                                         
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group col-md-6 col-sm-12 my-1 order-1 order-md-2">               
                        <label for="categorias" class="form-label">Imágen especial</label>
                        <div class="card bg-white text-white" style="min-height: 202px; max-height: 202px">
                            <img src="/images/image_update.png" alt="Logo" width="auto" height="200px">
                        </div>
                    </div>
                </div>             
            </div> {{--.card-body --}}

        </div>
        <br>
        <div class="form-group text-center">
            <a class="btn btn-outline-warning" href="#" role="button">Cancelar</a>
            <button type="submit" class="btn btn-secondary">Rechazar</button>
            <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
        <br>
    </div>
</section>
@endsection

@section('js')

@endsection