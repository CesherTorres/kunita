@extends('plantilla.pyme')

@section('title', 'Nueva venta')

@section('css')
    <link rel="stylesheet" type="text/css" href="/public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/public/css/icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/public/images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
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
            <a href="{{ url('/perfil') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Perfil</a>
            <a href="{{ url('/productos_pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/cobertura') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-truck me-2 lead"></i>Cobertura</a>
            <a href="{{ url('/pedidos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-box-seam me-2 lead"></i> Pedidos</a>
            <a href="{{ url('/ventas') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-cash-coin me-2 lead"></i> Ventas</a>
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
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-cash-coin me-2"></i>Nueva Venta</h1>
                <p class="text-muted">Registra una nueva venta</p>
            </div>
        </div>
        <p class="text-muted text-start">(*) - Campos obligatorios</p>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
    <form method="post" name="new_purchase" id="new_purchase" action="/ventas" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class=" col-md-4 col-sm-12 form-group"> 
                            <img src="/public/logos/{{Auth::user()->propietario->empresas->logoempresa}}" style="width:200px; height:auto;" class="mx-auto d-block float-left" alt="...">   
                        </div>
                        <div class=" col-md-4 col-sm-12 text-center text-dark mt-0 mt-md-3 mt-lg-5">
                            <h2 class="text-center">{{ Auth::user()->propietario->empresas->razonsocial }}</h2>
                            <p class="">RUC: {{ Auth::user()->propietario->empresas->ruc }}</p>
                        </div>
                        <div class=" col-md-4 col-sm-12 form-group text-right">
                            <div class="row">
                                <div class="col-md-6 text-start text-md-end">
                                    <label for="fecha" class="form-label text-start text-md-end">Fecha(*)</label>
                                </div>
                                <div class="col-md-6 mt-10">
                                    <input type="date" class="form-control form-control-sm" required  name="fecha_hora" id="fecha_hora"  value="{{$now->format('Y-m-d')}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr> 
                    <p class="fw-bold">Datos del cliente</p>
                    <div class="row my-2">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="namecliente" class="form-label">Cliente(*)</label>
                                <input type="text" name="namecliente" required id="namecliente" class="form-control form-control-sm" onkeypress="return sololetrasespace(event)" onpaste="return false" maxlength="60"> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="tipodocumento"  class="form-label">Tipo Identificación(*)</label>
                                <select class="form-select form-select-sm" required name="tipodocumento" id="tipodocumento">
                                    <option value="" disabled="disabled" selected="selected" hidden="hidden"> --Seleccione-- </option>
                                    <option value="DNI">DNI</option> 
                                    <option value="Pasaporte">Pasaporte</option>
                                    <option value="Carne de extranjeria">Carne de extranjería</option>
                                    <option value="Otro">Otro</option>  
                                </select>             
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="ndocumento" class="form-label">Nro Identificación(*)</label>
                                <input type="text" name="ndocumento" required id="ndocumento" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxlength="12"> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="celular" class="form-label">Telefono(*)</label>
                                <input type="text" name="celular" required id="celular" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxlength="9"> 
                            </div>
                        </div>
                    </div> 
                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="cobertura_id" class="form-label">Cobertura(*)</label>
                                <select class="form-select form-select-sm js-example-basic-single" required name="cobertura_id" id="cobertura_id">
                                    <option value="" disabled="disabled" selected="selected" hidden="hidden"> --Seleccione-- </option>
                                    @foreach($coberturas as $cobertura)
                                    <option value="{{$cobertura->id}}">{{$cobertura->ubigeos->departamento.'/'.$cobertura->ubigeos->provincia.'/'.$cobertura->ubigeos->distrito}}</option> 
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                    <label for="direccion" class="form-label">Direccion(*)</label>
                                    <input type="text" name="direccion" id="direccion" required class="form-control form-control-sm" maxlength="190"> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="referencia" class="form-label">Referencia(*)</label>
                                <input type="text" name="referencia" id="referencia" required class="form-control form-control-sm" maxlength="190"> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="correo" class="form-label">Email(*)</label>
                                <input type="email" name="correo" id="correo" required class="form-control form-control-sm" onkeypress="return sololetraspunto(event)" onpaste="return false" maxlength="60"> 
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="fw-bold">Detalles de la venta</p>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="productos" class="form-label">Productos(*)</label>
                                <select class="form-select form-select-sm js-example-basic-single" id="id_producto" required>
                                <option  value="" disabled="disabled" selected="selected" hidden="hidden">--Seleccione--</option>
                                    @foreach($productos as $producto)
                                        <option value="{{$producto->id}}_{{$producto->stock}}_{{$producto->preciosugerido}}">{{$producto->nameproducto}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="ndocumento" class="form-label">Stock</label>
                                <input type="text" name="" disabled id="stock" class="form-control form-control-sm" > 
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="ndocumento" class="form-label">Cantidad(*)</label>
                                <input type="text" name="" id="cantidad" class="form-control form-control-sm" onkeypress="return solonumeros(event)" onpaste="return false" maxlength="4"> 
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="ndocumento" class="form-label">Precio(*)</label>
                                <input type="text" name="" id="preciosugerido" class="form-control form-control-sm" onkeypress="return solonumerospunto(event)" onpaste="return false" maxlength="6"> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="form-group">               
                                <label for="ndocumento" class="form-label">Agregar</label>
                                <div class="d-grid gap-2">
                                    <button type="button" id="btagregar" class="btn btn-outline-warning btn-sm "> Agregar</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    {{-- fin_agregar_productos --}}
                    <div class="table-responsive">
                        <table id="detalles" class="table table-hover table-sm h-100">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">Producto</th>
                                    <th class="h6">Cantidad</th>
                                    <th class="h6">Precio</th>
                                    <th class="h6">SubTotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                                <tbody>
                                        
                                </tbody>       
                        </table>
                    </div>
                    {{-- fin_tabla_detalles_productos --}}
                    <br>
                    <div class="text-end">                        
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-sm-12">
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <label for="subtotal" class="form-label text-end h3">Total</label>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <h3 class="font-weight-light" id="total">S/. 0.00</h3><input type="hidden" name="total" id="total_total" required>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
        <div class="container form-group text-end pb-5">
            <a class="btn btn-outline-secondary btn-lg" href="{{ url('/ventas') }}" role="button">Cancelar</a>
            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
        </div>
    </form>
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
@push('scripts')
        
        <script>

        $(document).ready(function(){
                $('#btagregar').click(function(){
                    agregar();
                });
            });


                $("#id_producto").change(mostrarValores);
            function mostrarValores()
            {
                datosProducto=document.getElementById('id_producto').value.split('_');
                $("#stock").val(datosProducto[1]);
                $("#preciosugerido").val(datosProducto[2]);
            }

            var cont=0;
            total=0;
            subtotal=[];

            function agregar()
            {
                datosProducto=document.getElementById('id_producto').value.split('_');
                idproducto=datosProducto[0];
                producto=$("#id_producto option:selected").text();
                pventa=$("#preciosugerido").val();
                cantidad=$("#cantidad").val();
                stock=$("#stock").val();


                if (producto!="" && cantidad!="" && cantidad>0  && preciosugerido!="")
                {
                    
                   
                        subtotal[cont]=(cantidad*pventa);
                    total=total+subtotal[cont];
                    var fila='<tr class="selected" id="fila'+cont+'"><td class="font-weight-light"><input type="hidden" name="producto[]" value="'+idproducto+'">'+producto+'</td><td class="font-weight-light"><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td class="font-weight-light"><input type="hidden" name="pventa[]" value="'+pventa+'">'+pventa+'</td><td class="font-weight-light">'+subtotal[cont]+'</td><td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar('+cont+');"><i class="fas fa-trash-alt"></i></button></td></tr>'; 
                    cont++;
                    limpiar();
                    $("#total").html("S/."+total);
                    $("#total_total").val(total);
                    
                    $('#detalles').append(fila);                 

                    
                }else{
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al ingresar el detalle de la compra, revise los datos del producto',
                    })
                    // alert("Error al ingresar el detalle de la compra, revise los datos del insumo");

                }
            }
            function limpiar(){
                $('#cantidad').val("");
                $('#stock').val("");
                $('#preciosugerido').val("");
            } 

            function eliminar(index){
                
                total=total-subtotal[index];
                $("#total").html("S/ "+ total);
                $("#total").val(total);
                $("#fila" + index).remove();
            }

        </script>
    @endpush

@section('js')  
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script> 
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
 
@endsection