
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunaq | @yield('title')</title>
    <link rel="icon" href=" {{ public_path("images/logo-kunaq.png") }} ">
    {{-- <link rel="stylesheet" href="/sass/custom.css"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/css/main.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- @yield('css') --}}


<style>
    .page_break {
  page-break-before: always;
}

</style>

</head>
    
<body>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
        <u> <h1 class="text fw-bold mb-0 text-center py-1 display-1">Ventas</h1></u>
        <div class="page_break"></div>
        
        <div class="container">
            <div class="row">
                <div class="card ">
                    
                    {{-- <img src=""width="59" height="35" class="rounded-circle" > --}}
                   
        
                    <div class="card-body text-center">
        
                        <img src="{{ public_path("logos/".Auth::user()->propietario->empresas->logoempresa) }}" style="width: 12rem; height: 200px;" alt="...">
                        
                    
                        <h3 class="text-primary fw-bold mb-0"> {{ Auth::user()->propietario->empresas->razonsocial }}</h3>
                        <h3 class="text-primary fw-bold mb-0"> RUC: {{ Auth::user()->propietario->empresas->ruc }}</h3>
                        <h3 class="text-primary fw-bold mb-0"> Fecha: {{$venta->fecha_hora}}</h3>
        
                
                      
        
                        <p class="fw-bold lead border-bottom border-primary text-left">Datos del cliente</p>
        
        
                        {{----------------------------Nombre y Apellidos ----------------------------}}
                        <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 ">Cliente:</th>
                                    <th class="h6 ">Tipo Identificación:</th>
                                    <th class="h6 ">Nro Identificación:</th>
                                    
                                </tr>
                            </thead>
                            
                                <tbody>
                                    
                                        <tr>
                                            <td class="alert alert-primary">{{$venta->namecliente}}</td>
                                            <td class="alert alert-primary">{{$venta->tipodocumento}}</td>
                                            <td class="alert alert-primary">{{$venta->ndocumento}}</td>
                                           
                                        </tr>
                                                                    
                                  
                                </tbody>  
                        </table>
        
                             {{----------------------------Correo Telefono ----------------------------}}
                        <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 ">Telefono:</th>
                                    <th class="h6 ">Cobertura:</th>
                                   
                                </tr>
                            </thead>
                                <tbody>
                                        <tr>
                                            <td class="alert alert-primary ">{{$venta->celular}}</td>
                                            <td class="alert alert-primary">{{$venta->cobertura->ubigeos->departamento.'/'.$venta->cobertura->ubigeos->provincia.'/'.$venta->cobertura->ubigeos->distrito}}</td>
                                           
                                        </tr>
                                                                    
                                </tbody>  
                        </table>
        
        
                             {{----------------------------RazonSocial NroRUC ----------------------------}}
        
                        <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 ">Dirección: </th>
                                    <th class="h6 ">Referencia:</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                        <tr>
                                            <td class="alert alert-primary">{{$venta->direccion}}</td>
                                            <td class="alert alert-primary">{{$venta->referencia}}</td>
                                           
                                        </tr>
                                                                    
                                </tbody>  
                        </table>
        
    
                             {{----------------------------Marca Giro ----------------------------}}
                             <p class="fw-bold lead border-bottom border-primary text-left">Medidas:</p>
                        
                        <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 "> Correo: </th>

                                   
                                </tr>
                            </thead>
                                <tbody>
                                        <tr>
                                            <td class="alert alert-primary">{{$venta->correo}}</td>
                                            
                                            
                                           
                                        </tr>
                                                                    
                                </tbody>  
                        </table>

        
                             {{----------------------------Correo telefonoEmpresa ----------------------------}}
        
                        <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6">Producto</th>
                                                <th class="h6">Cantidad</th>
                                                <th class="h6">Precio</th>
                                                <th class="h6">SubTotal</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                         @foreach($detalleventa as $detalle)
                                                <tr>
                                                    <td class="font-weight-light">{{$detalle->nameproducto}}</td>
                                                    <td class="font-weight-light">{{$detalle->cantidad}}</td>
                                                    <td class="font-weight-light">{{$detalle->precio}}</td>
                                                    <td class="font-weight-light">{{$detalle->cantidad*$detalle->precio}}</td>
                                                </tr>
                                                @endforeach
                                                                    
                                </tbody>  
                        </table>     
                           
                    </div>
                </div>
            </div>
            <div class="page_break"></div>
        </div>

</body>
</html>