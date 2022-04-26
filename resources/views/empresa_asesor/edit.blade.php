@extends('plantilla.principal')

@section('title', 'Empresas')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <img src="/userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem; height: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/home') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresa_asesor') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            <a href="{{ url('/productos_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
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
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-building me-2"></i> Empresas</h1>
                <p class="text-muted">Manten actualizados los datos de las empresas</p>
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
        <form method="post" name="new_purchase" id="new_purchase" action="/empresa_asesor/{{$user->id}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white fw-bolder">Datos del propietario</div>
                            <div class="card-body">           
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 mb-1">               
                                        <label for="name" class="form-label">Nombres y Apellidos(*)</label>
                                        <input type="text" name="name" id="name" value="{{$user->name}}" required class="form-control form-control-sm" onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">            
                                    </div>
                                </div>
                                <div class="form-group mb-1">               
                                    <label for="tipodocumento" class="form-label">Tipo Identificación(*)</label>
                                    <select class="form-select form-select-sm" name="tipodocumento" id="tipodocumento" required>
                                        <option value="{{$user->tipodocumento}}" disabled="disabled" selected="selected" hidden="hidden">{{$user->tipodocumento}}</option>
                                        <option value="DNI">DNI</option> 
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Carne de extranjeria">Carne de extranjería</option>
                                        <option value="Otro">Otro</option>  
                                    </select>             
                                </div>
                                <input type="hidden" name="idempresa" id="idempresa" value="{{$user->propietario->empresas->id}}" class="form-control form-control-sm">
                                <div class="form-group mb-1">               
                                    <label for="ndocumento" class="form-label">Nro Identificación(*)</label>
                                    <input type="text" name="ndocumento" value="{{$user->ndocumento}}" required id="ndocumento" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxLength="12"> 
                                </div>
                                
                                <div class="form-group mb-1">               
                                    <label for="telefono" class="form-label">Telefono(*)</label>
                                    <input type="text" name="telefono" id="telefono" value="{{$user->telefono}}" required class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9"> 
                                </div>

                                <div class="form-group mb-1">               
                                    <label for="email" class="form-label">Email(*)</label>
                                    <input type="email" name="email" id="email" value="{{$user->email}}" required class="form-control form-control-sm" maxLength="50">           
                                </div>

                                {{-- <div class="form-group mb-1">               
                                    <label for="password" class="form-label">Contraseña(*)</label>
                                    <input type="password" name="password" value="{{$user->password}}" id="password" class="form-control form-control-sm" required onkeypress="return sololetrasynumeros(event)" onpaste="return false" maxLength="16"> 
                                </div>
                                
                                <div class="form-group mb-1">               
                                    <label for="confirmpassword" class="form-label">Confirmar Contraseña(*)</label>
                                    <input type="password" name="confirmpassword" value="{{$user->confirmpassword}}" id="confirmpassword" class="form-control form-control-sm"  required onkeypress="return sololetrasynumeros(event)" onpaste="return false" maxLength="16">           
                                </div> --}}
                                <div class="form-group mb-1">   
                                    <label for="estadouser" class="form-label">Estado(*)</label>            
                                    <select class="form-select form-select-sm" name="estadouser" id="estadouser" required>
                                        <option value="{{$user->estadouser}}" disabled="disabled" selected="selected" hidden="hidden">{{$user->estadouser}}</option>
                                        <option value="Activo">Activo</option> 
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                </div>
                                        
                            </div> {{--.card-body --}}
                    </div>{{--.card --}}
                </div>
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white fw-bolder">Datos de la empresa</div>
                            <div class="card-body">           
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="razonsocial" class="form-label">Razon Social(*)</label>
                                        <input type="text" name="razonsocial" id="razonsocial" value="{{$user->propietario->empresas->razonsocial}}" class="form-control form-control-sm"  required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="ruc" class="form-label">Nro. RUC(*)</label>
                                        <input type="text" name="ruc" id="ruc" value="{{$user->propietario->empresas->ruc}}" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="11"> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="correoempresa" class="form-label">Email Empresa(*)</label>
                                        <input type="email" name="correoempresa" value="{{$user->propietario->empresas->correoempresa}}" id="correoempresa" class="form-control form-control-sm" required maxLength="50">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="telefonoempresa" class="form-label">Telefono Empresa(*)</label>
                                        <input type="text" name="telefonoempresa" value="{{$user->propietario->empresas->telefonoempresa}}" id="telefonoempresa" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9"> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="direccion" class="form-label">Dirección(*)</label>
                                        <input type="text" name="direccion" id="direccion" value="{{$user->propietario->empresas->direccion}}" class="form-control form-control-sm"  required maxlength="190"> 
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="marca" class="form-label">Marca(*)</label>
                                        <input type="text" name="marca" id="marca" value="{{$user->propietario->empresas->marca}}" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">           
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="giro_id" class="form-label">Giro(*)</label>
                                        <select class="form-select form-select-sm js-example-basic-single" name="giro_id" id="giro_id">
                                            <option value="{{$user->propietario->empresas->giro->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$user->propietario->empresas->giro->namegiros}}</option>
                                            @foreach($giros as $giro) 
                                                <option value="{{$giro->id}}">{{$giro->namegiros}}</option> 
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">   
                                        <label for="ubigeo_id" class="form-label">Distrito/Provincia/Departamento(*)</label>
                                        <select class="form-select form-select-sm js-example-basic-single" name="ubigeo_id" id="ubigeo_id" required>
                                            <option value="{{$user->propietario->empresas->ubigeo->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$user->propietario->empresas->ubigeo->distrito.'/'.$user->propietario->empresas->ubigeo->provincia.'/'.$user->propietario->empresas->ubigeo->departamento}}</option>
                                            @foreach($ubigeo as $ub)
                                                <option value="{{$ub->id}}">{{$ub->distrito. ', '.$ub->provincia. ', '.$ub->departamento}}</option>
                                            @endforeach
                                        </select>             
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="descripcion" class="form-label">Descripcion(*)</label>
                                        <textarea class="form-control" name="descripcion" value="{{$user->propietario->empresas->descripcion}}" id="descripcion" rows="3" placeholder="Max. 190 caracteres" required onkeypress="return sololetrasespacepunto(event)" onpaste="return false" maxLength="190">{{$user->propietario->empresas->descripcion}}</textarea>           
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="categorias" class="form-label text-start">Logo(*)</label>
                                        <div class="card bg-white text-white text-center" style="min-height: 100px; max-height: 100px">
                                            <label for="uploadImage1" class="font-weight-light mb-0">
                                                <img for="uploadImage1" id="uploadPreview1" width="auto" height="98px" src="/logos/{{$user->propietario->empresas->logoempresa}}" />
                                            </label>
                                            <input id="uploadImage1" class="form-control-file" type="file" name="logoempresa" onchange="previewImage(1);" hidden/>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="cuentabanco" class="form-label">Entidad Bancaria</label>
                                        <select class="form-select form-select-sm" name="cuentabanco" id="cuentabanco" >
                                            <option value="{{$user->propietario->empresas->cuentabanco}}" disabled="disabled" selected="selected" hidden="hidden">{{$user->propietario->empresas->cuentabanco}}</option>
                                            <option value="BBVA">BBVA</option> 
                                            <option value="BCP">BCP</option> 
                                            <option value="Interbank">Interbank</option>
                                            <option value="MiBanco">Mi Banco</option>
                                            <option value="Caja Arequipa">Caja Arequipa</option>
                                            <option value="Caja Huancayo">Caja Huancayo</option>
                                            <option value="Otro">Otro</option>  
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="ncuentabanco" class="form-label">Nro de Cuenta</label>
                                        <input type="text" name="ncuentabanco" id="ncuentabanco" value="{{$user->propietario->empresas->ncuentabanco}}" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxLength="18" > 
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="ncuentabancocci" class="form-label">Nro de CCI</label>
                                        <input type="text" name="ncuentabancocci" id="ncuentabancocci" value="{{$user->propietario->empresas->ncuentabancocci}}" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxLength="20" > 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="billeteradigital" class="form-label">Metodos de Pago</label>
                                        <select class="form-select form-select-sm" name="billeteradigital" id="billeteradigital" >
                                            <option value="{{$user->propietario->empresas->billeteradigital}}" disabled="disabled" selected="selected" hidden="hidden">{{$user->propietario->empresas->billeteradigital}}</option>
                                            <option value="Yape">Yape</option> 
                                            <option value="Tunki">Tunki</option>
                                            <option value="Lukita">Lukita</option>
                                            <option value="VendeMas">Vende Mas</option>
                                            <option value="Otro">Otro</option>  
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="numerobilletera" class="form-label">Nro de Cuenta</label>
                                        <input type="text" name="numerobilletera" id="numerobilletera" value="{{$user->propietario->empresas->numerobilletera}}" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9" > 
                                    </div>
                                    <div class="col col-md-4 col-sm-12">   
                                        <label for="estado" class="form-label">Estado(*)</label>            
                                        <select class="form-select form-select-sm" name="estadoemp" id="estadoemp" required>
                                            <option value="{{$user->propietario->empresas->estadoemp}}" disabled="disabled" selected="selected" hidden="hidden">{{$user->propietario->empresas->estadoemp}}</option>
                                            <option value="Activo">Activo</option> 
                                            <option value="Inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="enlacefacebook" class="form-label">Url Facebook(*) <i class="fab fa-facebook" style="color:blue"></i></label>
                                        <input type="text" name="enlacefacebook" id="enlacefacebook" value="{{$user->propietario->empresas->enlacefacebook}}" class="form-control form-control-sm"  required maxlength="190"> 
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="enlacewhatsapp" class="form-label">Url WhatsApp(*) <i class="fab fa-whatsapp" style="color:green"></i></label>
                                        <input type="text" name="enlacewhatsapp" id="enlacewhatsapp" value="{{$user->propietario->empresas->enlacewhatsapp}}" class="form-control form-control-sm"  required maxlength="190"> 
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="enlaceinstagram" class="form-label">Url Instagram(*) <i class="fab fa-instagram" style="color:#F04E52"></i></label>
                                        <input type="text" name="enlaceinstagram" id="enlaceinstagram" value="{{$user->propietario->empresas->enlaceinstagram}}" class="form-control form-control-sm"  required maxlength="190"> 
                                    </div>
                                </div>

                                <input type="hidden" name="idempresa" id="idempresa" value="{{$user->propietario->empresas->id}}" class="form-control form-control-sm">

                                            
                            </div> {{--.card-body --}}
                    </div>{{--.card --}}
                </div>
            </div>
            <br>
            <div class="form-group text-center">

                <a class="btn btn-outline-secondary btn-lg" href="{{ url('/empresa_asesor') }}" role="button">Cancelar</a>
                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
            </div>
            <br>
        </form>
        
    </div>
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