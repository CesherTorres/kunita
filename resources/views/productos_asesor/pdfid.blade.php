

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunaq | @yield('title')</title>
    <link rel="icon" href="/images/logo-kunaq.png">
    {{-- <link rel="stylesheet" href="/sass/custom.css"> --}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/css/main.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- @yield('css') --}}
   
</head>
<body>
    
    <div class="container">
      
        <div class="row">
            <div class="card ">
                
                {{-- <img src=""width="59" height="35" class="rounded-circle" > --}}
               
    
                <div class="card-body text-center">
    
                   
                    <img src="{{ public_path("images_product/".$producto->imgprincipal) }}" style="width: 12rem; height: 200px;" alt="...">
               
                    <h3 class="text-primary fw-bold mb-0"> Producto: {{$producto->nameproducto}} ({{$producto->estado}})</h3>
    
            
                  
    
                    <p class="fw-bold lead border-bottom border-primary text-left">Datos del Producto</p>
    
    
                    {{----------------------------Nombre y Apellidos ----------------------------}}
                    <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="h6 ">Empresa:</th>
                                <th class="h6 ">Marca:</th>
                                <th class="h6 ">Nombre del producto:</th>
                                
                            </tr>
                        </thead>
                        
                            <tbody>
                                
                                    <tr>
                                        <td class="alert alert-primary">{{$producto->razonsocial}}</td>
                                        <td class="alert alert-primary">{{$producto->marca}}</td>
                                        <td class="alert alert-primary">{{$producto->nameproducto}}</td>
                                       
                                    </tr>
                                                                
                              
                            </tbody>  
                    </table>
    
                         {{----------------------------Correo Telefono ----------------------------}}
                    <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="h6 ">Modelo:</th>
                                <th class="h6 ">Género:</th>
                               
                            </tr>
                        </thead>
                            <tbody>
                                    <tr>
                                        <td class="alert alert-primary ">{{$producto->modelo}}</td>
                                        <td class="alert alert-primary">{{$producto->genero}}</td>
                                       
                                    </tr>
                                                                
                            </tbody>  
                    </table>
    
    
    
    
                    
    
                         {{----------------------------RazonSocial NroRUC ----------------------------}}
    
                    <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="h6 ">Precio: </th>
                                <th class="h6 ">Categoría:</th>
                                
                            </tr>
                        </thead>
                            <tbody>
                                    <tr>
                                        <td class="alert alert-primary">S/. {{$producto->preciosugerido}}</td>
                                        <td class="alert alert-primary">{{$producto->namecategoria.'/'.$producto->namesubcategoria}}</td>
                                       
                                    </tr>
                                                                
                            </tbody>  
                    </table>
    

                         {{----------------------------Marca Giro ----------------------------}}
                         <p class="fw-bold lead border-bottom border-primary text-left">Medidas:</p>
                    
                    <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="h6 "> Alto:  </th>
                                <th class="h6 ">Profundidad:</th>
                                <th class="h6 ">Ancho:</th>
                               
                            </tr>
                        </thead>
                            <tbody>
                                    <tr>
                                        <td class="alert alert-primary">{{$producto->alto}} cm.</td>
                                        <td class="alert alert-primary">{{$producto->profundidad}} cm.</td>
                                        <td class="alert alert-primary">{{$producto->ancho}} cm.</td>
                                        
                                       
                                    </tr>
                                                                
                            </tbody>  
                    </table>
    
                         {{----------------------------Correo telefonoEmpresa ----------------------------}}
    
                    <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="h6 ">Peso:</th>
                                <th class="h6 ">Temperatura:</th>
                                <th class="h6 ">Stock:</th>
                                
                            </tr>
                        </thead>
                            <tbody>
                                    <tr>
                                        <td class="alert alert-primary">{{$producto->peso}} gr.</td>
                                        <td class="alert alert-primary">{{$producto->temperatura}}</td>
                                        <td class="alert alert-primary">{{$producto->stock}}</td>
                                       
                                    </tr>
                                                                
                            </tbody>  
                    </table>

                    <p class="fw-bold lead border-bottom border-primary text-left py-2">Imágenes (Izq. Der. Frontal)</p>

    <img src="{{ public_path("images_product/".$producto->imguno) }}" style="width: 15rem; height: 150px;"  class="mb-0 " > 
                            
                       
            
    <img src="{{ public_path("images_product/".$producto->imgdos) }}" style="width: 15rem; height: 150px;"  class="mb-0" > 
    <img src="{{ public_path("images_product/".$producto->imgtres) }}" style="width: 15rem; height: 150px;"  class="mb-0" > 

                   
                    <div class="form-group col-md-6 col-sm-12  my-2 my-md-0 order-2 order-md-1">
                        <p class="fw-bold lead border-bottom border-primary text-left py-2">Imágen principal</p>
                        <img src="{{ public_path("images_product/".$producto->imgprincipal) }}" style="width: 15rem; height: 150px;" class="mb-0" > 
                    </div>
                   
                    
                    
                    
                         {{----------------------------Dis/Pro/Dep Direccion ----------------------------}}
    
                    <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="h6 ">Descripción:</th>
                                
                                
                            </tr>
                        </thead>
                            <tbody>
                                    <tr>
                                        <td class="alert alert-primary">{{$producto->descripcion}}</td>
                                       
                                       
                                    </tr>
                                                                
                            </tbody>  
                    </table>
                         {{----------------------------Dis/Pro/Dep Direccion ----------------------------}}
                         <p class="fw-bold lead border-bottom border-primary text-left">Oferta:</p>
                    <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th class="h6 ">Descripción:</th>
                                <th class="h6 ">Fecha terminar:</th>
                      
                            </tr>
                        </thead>
                            <tbody>
                                    <tr>
                                        <td class="alert alert-primary"> {{$producto->oferta}}</td>
                                        <td class="alert alert-primary">{{$producto->fecha_vencimiento}}</td>
                                
                                    </tr>
                                                                
                            </tbody>  
                    </table>
                       
                </div>
            </div>
        </div>
        
      
    </div>
 


</body>
</html>