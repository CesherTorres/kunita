@extends('plantilla.store')

@section('title', 'Registrar empresa')

@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
{{-- <header class="pb-3 pb-md-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <img src="/images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 8rem;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex mt-3 mt-lg-0">
                    <input class="form-control me-2" type="search" placeholder="Escribe algo" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item mx-md-2">
                        <button class="btn btn-outline-warning mt-3 mt-lg-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Categorías <i class="bi bi-list"></i></button>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ url('/store') }}">Inicio</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="{{ url('/empresas-asociadas') }}">Empresas</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ url('/') }}" target="bank"><i class="bi bi-person-fill h4"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/carritoIndex') }}"><i class="bi bi-cart-plus-fill h4"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header> --}}
    <!-- fin barra de navegacion -->

	<!-- offcanvas start -->
	{{-- <div class="offcanvas offcanvas-start sidebar-nav" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
		<div class="offcanvas-header">
		  <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Categorías</h5>
		  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body">
			<div class="accordion accordion-flush" id="categorias">
				
				@foreach($categorias as $categoria)
					<div class="accordion-item">
						<h2 class="accordion-header" id="{{$categoria->namecategoria}}-h">
						<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{$categoria->namecategoria}}" aria-expanded="false" aria-controls="{{$categoria->namecategoria}}">
							{{$categoria->namecategoria}}
						</button>
						</h2>
						<div id="{{$categoria->namecategoria}}" class="accordion-collapse collapse" aria-labelledby="{{$categoria->namecategoria}}-h" data-bs-parent="#categorias">
						<div class="accordion-body">
							<div>
								<ul class="navbar-nav ps-3">
									<li>
									@foreach($subcategorias as $subcategoria)
										<a href="" class="nav-link text-info">
											<span>{{$subcategoria->namesubcategoria}}</span>
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
	</div> --}}
	<!-- offcanvas end -->
	{{--  --}}
<section class="py-3 bg-light">
    <div class="container-fluid pt-3">
        
            <div class=" text-center">
                <h1 class="text-success fw-bold mb-0"> Nueva Empresa</h1>
                <p class="lead text-muted">Registra los datos de tu empresa y forma parte de nosotros</p>
            </div>
            
            <p class="text-muted text-start">(*) - Campos obligatorios</p>
            @if($message = Session::get('errors'))
            <div class="alert alert-danger">
                <ul>
                <p>¡Algo salió mal!</p>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                </ul>
            </div>
        @endif
        <form method="post" name="new_purchase" id="new_purchase" action="/nueva_empresa" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header bg-primary text-white fw-bolder">Datos del propietario</div>
                            <div class="card-body">           
                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 mb-1">               
                                        <label for="name" class="form-label">Nombres y Apellidos(*)</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-sm" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">            
                                    </div>
                                </div>
                                
                                <div class="form-group mb-1">               
                                    <label for="tipodocumento" class="form-label">Tipo Identificación(*)</label>
                                    <select class="form-select form-select-sm" name="tipodocumento" id="tipodocumento" required>
                                        <option value="" disabled="disabled" selected="selected" hidden="hidden"> --Seleccione-- </option>
                                        <option value="DNI">DNI</option> 
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Carne de extranjeria">Carne de extranjería</option>
                                        <option value="Otro">Otro</option>  
                                    </select>             
                                </div>

                                <div class="form-group mb-1">               
                                    <label for="ndocumento" class="form-label">Nro Identificación(*)</label>
                                    <input type="text" name="ndocumento" id="ndocumento" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="12"> 
                                </div>
                                
                                <div class="form-group mb-1">               
                                    <label for="telefono" class="form-label">Telefono(*)</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9"> 
                                </div>

                                <div class="form-group mb-1">               
                                    <label for="email" class="form-label">Email(*)</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-sm" required  maxLength="50">           
                                </div>

                                <div class="form-group mb-1">               
                                    <label for="password" class="form-label">Contraseña(*)</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-sm" required onkeypress="return sololetrasynumeros(event)" onpaste="return false" maxLength="16"> 
                                </div>
                                
                                <div class="form-group mb-1">               
                                    <label for="confirmpassword" class="form-label">Confirmar Contraseña(*)</label>
                                    <input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-control-sm" required onkeypress="return sololetrasynumeros(event)" onpaste="return false" maxLength="16">           
                                    <span id='message'></span>
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
                                        <input type="text" name="razonsocial" id="razonsocial" class="form-control form-control-sm" required onkeypress="return sololetrasespacepunto(event)" onpaste="return false" maxLength="80">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="ruc" class="form-label">Nro. RUC(*)</label>
                                        <input type="text" name="ruc" id="ruc" class="form-control form-control-sm"  required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="11"> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="correoempresa" class="form-label">Email Empresa(*)</label>
                                        <input type="email" name="correoempresa" id="correoempresa" class="form-control form-control-sm" required maxLength="50">            
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="telefonoempresa" class="form-label">Telefono Empresa(*)</label>
                                        <input type="text" name="telefonoempresa" id="telefonoempresa" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9"> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="giro_id" class="form-label">Giro(*)</label>
                                        <select class="form-select form-select-sm" name="giro_id" id="giro_id" required>
                                            <option value="" disabled="disabled" selected="selected" hidden="hidden">--Seleccione--</option>
                                            @foreach($giros as $giro) 
                                                <option value="{{$giro->id}}">{{$giro->namegiros}}</option> 
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="marca" class="form-label">Marca(*)</label>
                                        <input type="text" name="marca" id="marca" class="form-control form-control-sm"  required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">           
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12 mb-1">
                                        <label for="direccion" class="form-label">Dirección(*)</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control form-control-sm"  required maxlength="190">                
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">   
                                        <label for="usuario_id" class="form-label">Asesor(*)</label>
                                        <select class="form-select form-select-sm js-example-basic-single" name="usuario_id" id="usuario_id" required>
                                            <option value="" disabled="disabled" selected="selected" hidden="hidden">--Seleccione--</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>            
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12 col-sm-12 mt-2">               
                                        <label for="ubigeo_id" class="form-label">Distrito/Provincia/Departamento(*)</label>
                                        <select class="form-select form-select-sm js-example-basic-single" name="ubigeo_id" id="ubigeo_id" required>
                                            <option value="" disabled="disabled" selected="selected" hidden="hidden"></option>
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
                                        <textarea class="form-control" name="descripcion" placeholder="Max. 190 caracteres" id="descripcion" rows="3" required onkeypress="return sololetrasespacepunto(event)" onpaste="return false" maxLength="190"></textarea>           
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12 mb-1">               
                                        <label for="categorias" class="form-label text-start">Logo(*)</label>
                                        <div class="card bg-white text-white text-center" style="min-height: 100px; max-height: 100px">
                                            <label for="uploadImage1" class="font-weight-light mb-0">
                                                <img for="uploadImage1" id="uploadPreview1" width="200px" height="98px" src="/images/logo_update.png" />
                                            </label>
                                            <input id="uploadImage1" class="form-control-file" type="file" name="logoempresa" onchange="previewImage(1);" hidden required/>
                                        </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="cuentabanco" class="form-label">Entidad Bancaria</label>
                                        <select class="form-select form-select-sm" name="cuentabanco" id="cuentabanco" required>
                                            <option value="" disabled="disabled" selected="selected" hidden="hidden">--Seleccione--</option>
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
                                        <input type="text" name="ncuentabanco" id="ncuentabanco" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="18"> 
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="ncuentabancocci" class="form-label">Nro de CCI</label>
                                        <input type="text" name="ncuentabancocci" id="ncuentabancocci" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="20"> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="billeteradigital" class="form-label">Metodos de Pago</label>
                                        <select class="form-select form-select-sm" name="billeteradigital" id="billeteradigital" required>
                                            <option value="" disabled="disabled" selected="selected" hidden="hidden">--Seleccione--</option>
                                            <option value="Yape">Yape</option> 
                                            <option value="Tunki">Tunki</option>
                                            <option value="Lukita">Lukita</option>
                                            <option value="VendeMas">Vende Mas</option>
                                            <option value="Otro">Otro</option>  
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="numerobilletera" class="form-label">Nro de Cuenta</label>
                                        <input type="text" name="numerobilletera" id="numerobilletera" class="form-control form-control-sm" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="9"> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="enlacefacebook" class="form-label">Url Facebook(*) <i class="fab fa-facebook" style="color:blue"></i></label>
                                        <input type="text" name="enlacefacebook" id="enlacefacebook" class="form-control form-control-sm"  required maxlength="190"> 
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="enlacewhatsapp" class="form-label">Url WhatsApp(*) <i class="fab fa-whatsapp" style="color:green"></i></label>
                                        <input type="text" name="enlacewhatsapp" id="enlacewhatsapp" class="form-control form-control-sm"  required maxlength="190"> 
                                    </div>
                                    <div class="form-group col-md-4 col-sm-12 mb-1">               
                                        <label for="enlaceinstagram" class="form-label">Url Instagram(*) <i class="fab fa-instagram" style="color:#F04E52"></i></label>
                                        <input type="text" name="enlaceinstagram" id="enlaceinstagram" class="form-control form-control-sm"  required maxlength="190"> 
                                    </div>
                                </div>
                                            
                            </div> {{--.card-body --}}
                    </div>{{--.card --}}
                </div>
            </div>
            <br>
            <div class="form-group text-center">

                <a class="btn btn-outline-secondary btn-lg" href="{{ url('/') }}" role="button">Ir a la tienda</a>
                <button type="submit" class="btn btn-primary btn-lg">Registrarme</button>
            </div>
            <br>
        </form>    
    </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
        $('#password, #confirmpassword').on('keyup', function () {
    if ($('#password').val() == $('#confirmpassword').val()) {
        $('#message').html('CORRECTO').css('color', 'green');
    } else 
        $('#message').html('LAS CONTRASEÑA NO COINCIDEN').css('color', 'red');
});
    </script>
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
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <!--sweet alert alerta-->
        @if(session('info') == 'informacion')
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Ha Ocurrido un Error',
                    text: 'Las Contraseñas no coinciden',
                timer: 2000
                })
            </script>
        @endif
        <script>
            function previewImage(nb) {        
                var reader = new FileReader();         
                reader.readAsDataURL(document.getElementById('uploadImage'+nb).files[0]);         
                reader.onload = function (e) {             
                    document.getElementById('uploadPreview'+nb).src = e.target.result;         
                };     
            }
        </script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
@endsection

