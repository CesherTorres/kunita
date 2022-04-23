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
    <u> <h1 class="text fw-bold mb-0 text-center py-1 display-1">Empresas</h1></u>
        <div class="page_break"></div>
   
    
   


<div class="container">
    @foreach ($companys as $company)
    <div class="row">
        <div class="card ">
            
            {{-- <img src=""width="59" height="35" class="rounded-circle" > --}}
           

            <div class="card-body text-center">

               <div class="card-img-top">
                <img src="{{ public_path("logos/".$company->logoempresa) }}" style="width: 18rem; height: 180px;" alt="...">
               </div>

                <h3 class="text-primary fw-bold mb-0"> Empresa: {{$company->razonsocial}}</h3>

        
              

                <p class="fw-bold lead border-bottom border-primary text-left">Datos del propietario</p>


                {{----------------------------Nombre y Apellidos ----------------------------}}
                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Nombres y Apellidos:</th>
                            <th class="h6 ">Identidor:</th>
                            
                        </tr>
                    </thead>
                    
                        <tbody>
                            
                                <tr>
                                    <td class="alert alert-primary">{{$company->propietario->user->name}}</td>
                                    <td class="alert alert-primary">{{$company->propietario->user->tipodocumento.': '.$company->propietario->user->ndocumento}}</td>
                                   
                                </tr>
                                                            
                          
                        </tbody>  
                </table>

                     {{----------------------------Correo Telefono ----------------------------}}
                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Correo:</th>
                            <th class="h6 ">Telefono:</th>
                            <th class="h6 ">Estado:</th>
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-primary ">{{$company->propietario->user->email}}</td>
                                    <td class="alert alert-primary">{{$company->propietario->user->telefono}}</td>
                                    <td class="alert alert-primary">{{$company->propietario->user->estado}}</td>
                                </tr>
                                                            
                        </tbody>  
                </table>




                <p class="fw-bold lead border-bottom border-success text-left">Datos de la Empresa</p>

                     {{----------------------------RazonSocial NroRUC ----------------------------}}

                <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Razon social: </th>
                            <th class="h6 ">Nro RUC:</th>
                            
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-warning">{{$company->razonsocial}}</td>
                                    <td class="alert alert-warning">{{$company->ruc}}</td>
                                   
                                </tr>
                                                            
                        </tbody>  
                </table>

                     {{----------------------------Marca Giro ----------------------------}}

                <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Marca:  </th>
                            <th class="h6 ">Giro:</th>
                            
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-warning">{{$company->marca}}</td>
                                    <td class="alert alert-warning">{{$company->giro->namegiros}}</td>
                                   
                                </tr>
                                                            
                        </tbody>  
                </table>

                     {{----------------------------Correo telefonoEmpresa ----------------------------}}

                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Correo Empresa:</th>
                            <th class="h6 ">Tel. Empresa: </th>
                            
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-warning">{{$company->correoempresa}}</td>
                                    <td class="alert alert-warning">{{$company->telefonoempresa}}</td>
                                   
                                </tr>
                                                            
                        </tbody>  
                </table>
                     {{----------------------------Dis/Pro/Dep Direccion ----------------------------}}

                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Distrito/Provincia/Departamento:</th>
                            <th class="h6 ">Direccion:</th>
                            
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-warning">{{$company->ubigeo->distrito.'/'.$company->ubigeo->provincia.'/'.$company->ubigeo->departamento}} </td>
                                    <td class="alert alert-warning">{{$company->direccion}}</td>
                                   
                                </tr>
                                                            
                        </tbody>  
                </table>
                     {{----------------------------Dis/Pro/Dep Direccion ----------------------------}}

                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Cuenta bancaria:</th>
                            <th class="h6 ">Nro cuenta:</th>
                            <th class="h6 ">Nro CCI:</th>
                            
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-warning"> {{$company->cuentabanco}}</td>
                                    <td class="alert alert-warning">{{$company->ncuentabanco}}</td>
                                    <td class="alert alert-warning"> {{$company->ncuentabancocci}} </td>
                                </tr>
                                                            
                        </tbody>  
                </table>
                    {{----------------------------N°/Billetera Digital/Numero ----------------------------}}
                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                           
                            <th class="h6 ">Billetera digital:</th>
                            <th class="h6 ">Numero: </th>
                            
                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                   
                                    <td class="alert alert-warning">{{$company->billeteradigital}}</td>
                                    <td class="alert alert-warning">{{$company->numerobilletera}}</td>
                                   
                                </tr>
                                                            
                        </tbody>  
                </table>
                    {{----------------------------Asesor Descripcion ----------------------------}}
                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Asesor:</th>
                            <th class="h6 ">Descripcion: </th>
                            
                        </tr>

                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-warning"> {{$company->user->name}} </td>
                                    <td class="alert alert-warning">{{$company->descripcion}}</td>
                                    
                                   
                                </tr>
                                                            
                        </tbody>  
                </table>

                <p class="fw-bold lead border-bottom border-success text-left">Redes Sociales</p>
                    {{----------------------------URL----------------------------}}
                    {{----------------------------Facebook----------------------------}}

                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Url Facebook:</th>
                            
                        </tr>

                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-info">{{$company->enlacefacebook}} </td>
                                    
                                    
                                </tr>
                                                            
                        </tbody>  
                </table>

               
                 {{----------------------------Instagram----------------------------}}
                <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                           
                            <th class="h6 ">Url Instagram: </th>
                
                            
                        </tr>

                    </thead>
                        <tbody>
                                <tr>
                                    
                                    <td class="alert alert-danger">{{$company->enlaceinstagram}}</td>
                                
                                    
                                   
                                </tr>
                                                            
                        </tbody>  
                </table>

                  {{----------------------------Whssap----------------------------}}
                  <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th class="h6 ">Url Whatsapp: </th>
                        </tr>

                    </thead>
                        <tbody>
                                <tr>
                                    <td class="alert alert-success">{{$company->enlacewhatsapp}}</td>              
                                </tr>
                                                            
                        </tbody>  
                </table>
            
            </div>
        </div>
    </div>
    <div class="page_break"></div>
    @endforeach
</div>


</body>
</html>