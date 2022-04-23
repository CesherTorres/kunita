@extends('plantilla.principal')

@section('title', 'Empresas')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

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
                <a href="{{ url('/solicitudes') }}" class="btn text-start text-white d-block mx-4 mt-3"><i class="bi bi-people mx-2 mt-2"></i> Producto</a>
                <a href="{{ url('/solicitudesU') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-4 mt-3"><i class="bi bi-people mx-2 mt-2"></i> Usuario</a>

        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h3 class="text-success fw-bold mb-0"> Datos de la Empresa</h3>
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
        <form method="post" name="new_purchase" id="new_purchase" action="/solicitudesU" enctype="multipart/form-data">
       
                @csrf
				@method('PUT')
        <div class="card-group">
            <div class="card col-md-6 col-sm-12 card-primary card-outline">
                <div class="card-header bg-warning text-white">Datos del propietario</div>
                <div class="card-body">           
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                            <label for="nameowner" class="form-label">Nombres y Apellidos</label>
                            <input type="text" name="nameowner" id="nameowner" value="{{ $beta->name }}"  class="form-control form-control-sm"  required>            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="identificacion" class="form-label">Tipo Identificación</label>
                            <select class="form-select form-select-sm" name="identificacion" id="identificacion" required>
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">{{ $beta->tipodocumento}}</option>
                                <option value="DNI">DNI</option> 
                                <option value="Pasaporte">Pasaporte</option>
                                <option value="Carne de extranjeria">Carne de extranjería</option>
                                <option value="Otro">Otro</option>  
                            </select>             
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="nidentificacion" class="form-label">Nro Identificación</label>
                            <input type="text" name="nidentificacion" id="nidentificacion" value="{{$beta->ndocumento}}" class="form-control form-control-sm"  required> 
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" name="telefono" id="telefono" value="{{$beta->telefono}}" class="form-control form-control-sm"  required> 
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{$beta->email}}" class="form-control form-control-sm"  required>           
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" id="password" value="{{$beta->password}}"  class="form-control form-control-sm"  required> 
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="confpassword" class="form-label">Confirmar Contraseña</label>
                            <input type="password" name="confpassword" id="confpassword" value="{{$beta->confirmpassword}}" class="form-control form-control-sm">           
                        </div>
                    </div>  
                    </div> {{--.card-body --}}
            </div>
            <div class="card col-md-6 col-sm-12 bg-light card-primary card-outline">
                <div class="card-header text-white" style="background-color:#E3426F">Datos de la empresa</div>
                <div class="card-body">           
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="razonsocial" class="form-label">Razon Social</label>
                            <input type="text" name="razonsocial" id="razonsocial" value="{{$beta->razonsocial}}" class="form-control form-control-sm"  required>            
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="nruc" class="form-label">Nro. RUC</label>
                            <input type="text" name="nruc" id="nruc" value="{{$beta->ruc}}" class="form-control form-control-sm"  required> 
                        </div>
                    </div>

                    <div class="row">
                       
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="telefonocompany" class="form-label">Telefono Empresa</label>
                            <input type="text" name="telefonocompany" id="telefonocompany" value="{{$beta->telefonoempresa}}" class="form-control form-control-sm"  required> 
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="emailcompany" class="form-label">Email Empresa</label>
                            <input type="email" name="emailcompany" value="{{$beta->correoempresa}}" id="emailcompany" class="form-control form-control-sm"  required>            
                        </div>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" name="direccioncompany"  value="{{$beta->telefonoempresa}}" id="direccion"  class="form-control form-control-sm"  required> 
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" name="marca" id="marca" value="{{$beta->marca}}" class="form-control form-control-sm"  required>           
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="departamento" class="form-label">Giro</label>
                            <select class="form-select form-select-sm" name="giro" id="giro" required>
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">{{$beta->giro_id}}</option>
                                @foreach($giros as $giro) 
                                    <option value="{{$giro->id}}">{{$giro->namegiros}}</option> 
                                @endforeach
                                
                            </select>
                            <label for="asesor" class="form-label">Asesor</label>
                            <select class="form-select form-select-sm" name="asesor" id="asesor" required>
                                <option value="" disabled="disabled" selected="selected" hidden="hidden">{{$beta->usuario_id}}</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3" required >{{$beta->descripcion}}</textarea>           
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                            <label for="ubigeo" class="form-label">Distrito/Provincia/Departamento</label>
                            <select class="form-select form-select-sm" name="ubigeo" id="ubigeo" required>
                                <option value="" disabled="disabled" selected="selected" hidden="hidden"></option>
                                @foreach($ubigeos as $ub)
                                    <option value="{{$ub->id}}">{{$ub->distrito. ', '.$ub->provincia. ', '.$ub->departamento}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div>
                        <div class="form-group col-md-12 col-sm-12 mb-1">               
                            <label for="categorias" class="form-label text-start">Logo</label>
                            <div class="card bg-white text-white text-center" style="min-height: 100px; max-height: 100px">
                                <label for="uploadImage1" class="font-weight-light mb-0">
                                    <img for="uploadImage1" id="uploadPreview1" width="auto" height="98px" value="{{$beta->logoempresa}}" src="/images/logo_update.png" />
                                </label>
                                <input id="uploadImage1" class="form-control-file" type="file" name="logo" onchange="previewImage(1);" hidden/>
                            </div>
                      {{-- hexa game       --}}
                        </div>
                    </div>             
                </div> {{--.card-body --}}
            </div>{{--.card --}}
        </div>{{--.card- group--}}
        <br>
        <div class="card-group">
            <div class="card col-md-6 col-sm-12 card-primary card-outline">
                <div class="card-header bg-primary text-white" align="center">Cuentas</div>
                <div class="card-body">           
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12 mb-1">               
                            <label for="entidadB" class="form-label">Entidad Bancaria</label>
                            <select class="form-select form-select-sm" name="entidadB" value="{{$beta->cuentabanco}}" id="entidadB" required>
                                <option value="" disabled="disabled" selected="selected" hidden="hidden"></option>
                                <option value="BBVA">BBVA</option> 
                                <option value="Interbank">Interbank</option>
                                <option value="MiBanco">Mi Banco</option>
                                <option value="Caja Arequipa">Caja Arequipa</option>
                                <option value="Caja Huancayo">Caja Huancayo</option>
                                <option value="Otro">Otro</option>  
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12 mb-1">               
                            <label for="cuentaB" class="form-label">Nro de Cuenta</label>
                            <input type="text" name="cuentaB" id="cuentaB" value="{{$beta->ncuentabanco}}" class="form-control form-control-sm"  required> 
                        </div>
                        <div class="form-group col-md-4 col-sm-12 mb-1">               
                            <label for="direccion" class="form-label">Nro de CCI</label>
                            <input type="text" name="cci" id="cci" value="{{$beta->ncuentabancocci}}" class="form-control form-control-sm"  required> 
                        </div>
                    </div>
                </div> {{--.card-body --}}
            </div>
            <div class="card col-md-6 col-sm-12 card-primary card-outline">
                <div class="card-header bg-primary text-white" align="center">Billetera Digital</div>
                <div class="card-body">           
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="billeteraD" class="form-label">Metodos de Pago</label>
                            <select class="form-select form-select-sm" name="billeteraD" id="billeteraD" required>
                                <option value="" disabled="disabled" value="{{$beta->billeteradigital}}" selected="selected" hidden="hidden"></option>
                                <option value="Yape">Yape</option> 
                                <option value="Tunki">Tunki</option>
                                <option value="Lukita">Lukita</option>
                                <option value="VendeMas">Vende Mas</option>
                                <option value="Otro">Otro</option>  
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 mb-1">               
                            <label for="ncuentaD" class="form-label">Nro de Cuenta</label>
                            <input type="text" name="ncuentaD" id="ncuentaD" value="{{$beta->numerobilletera}}"class="form-control form-control-sm"  required> 
                        </div>
                    </div>
                </div> {{--.card-body --}}
            </div>
        </div>
        {{--  --}}
        <br>
        <div>
            <div class="card col-md-12 col-sm-12 card-primary card-outline">
                <div class="card-header bg-secondary text-white" align="center">Redes Sociales</div>
                <div class="card-body">           
                    <div class="row">
                        <div class="form-group col-md-4 col-sm-12 mb-1">               
                            <label for="urlfacebook" class="form-label">Url Facebook <i class="fab fa-facebook" style="color:blue"></i></label>
                            <input type="text" name="urlfacebook" id="urlfacebook" value="{{$beta->enlacefacebook}}" class="form-control form-control-sm"  required> 
                        </div>
                        <div class="form-group col-md-4 col-sm-12 mb-1">               
                            <label for="urlwhatsapp" class="form-label">Url WhatsApp <i class="fab fa-whatsapp" style="color:green"></i></label>
                            <input type="text" name="urlwhatsapp" id="urlwhatsapp" value="{{$beta->enlaceinstagram}}" class="form-control form-control-sm"  required> 
                        </div>
                        <div class="form-group col-md-4 col-sm-12 mb-1">               
                            <label for="urlinstagram" class="form-label">Url Instagram <i class="fab fa-instagram" style="color:#F04E52"></i></label>
                            <input type="text" name="urlinstagram" id="urlinstagram" value="{{$beta->enlacewhatsapp}}" class="form-control form-control-sm"  required> 
                        </div>
                    </div>
                </div> {{--.card-body --}}
            </div>
        </div>
        <br>
        <div class="form-group text-end">
            <a class="btn btn-outline-secondary" href="/solace/1" role="button">Aceptar Solicitud</a>
            <a class="btn btn-outline-secondary" href="/solrec/2" role="button">Rechazar Solicitud</a>
            <button type="submit" class="btn btn-primary">Regresar</button>
        </div>
        <br>
    </form>
        
    </div>
</section>
@endsection

@section('js')
        
@endsection