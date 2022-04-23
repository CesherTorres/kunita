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

    <u> <h1 class="text fw-bold mb-0 text-center py-1 display-1">Asesores</h1></u>
    <div class="page_break"></div>


<div class="container">
@foreach ($asesores as $asesor)
<div class="row">
    <div class="card ">
        
        {{-- <img src=""width="59" height="35" class="rounded-circle" > --}}
       

        <div class="card-body text-center">

           <div class="card-img-top">
            <img src="{{ public_path("userAsesor/".$asesor->fotouser) }}" style="width: 18rem; height: 180px;" alt="...">
           </div>

            <h3 class="text-primary fw-bold mb-0"> Asesor: {{$asesor->name}}</h3>

    
          

            <p class="fw-bold lead border-bottom border-primary text-left">Datos del Asesor</p>


            {{----------------------------Nombre y Apellidos ----------------------------}}
            <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th class="h6 ">Nombres y Apellidos:</th>
                        <th class="h6 ">Identidor:</th>
                        <th class="h6 ">Nº de Identificación:</th>
                        
                    </tr>
                </thead>
                
                    <tbody>
                        
                            <tr>
                                <td class="alert alert-primary">{{$asesor->name}}</td>
                                <td class="alert alert-primary">{{$asesor->tipodocumento}}</td>
                                <td class="alert alert-primary">{{$asesor->ndocumento}}</td>
                               
                            </tr>
                                                        
                      
                    </tbody>  
            </table>

                 {{----------------------------Correo Telefono ----------------------------}}
            <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th class="h6 ">Distrito/Provincia/Departamento:</th>
                        <th class="h6 ">Dirección:</th>
                        <th class="h6 ">Telefono:</th>
                       
                    </tr>
                </thead>
                    <tbody>
                            <tr>
                                <td class="alert alert-primary ">{{$asesor->ubigeo->distrito.'/'.$asesor->ubigeo->provincia.'/'.$asesor->ubigeo->departamento}}</td>
                                <td class="alert alert-primary ">{{$asesor->direccion}}</td>
                                <td class="alert alert-primary">{{$asesor->telefono}}</td>
                            </tr>
                                                        
                    </tbody>  
            </table>
                 {{----------------------------Correo Telefono ----------------------------}}
            <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th class="h6 ">Email:</th>
                        <th class="h6 ">Estado:</th>
                       
                    </tr>
                </thead>
                    <tbody>
                            <tr>
                                <td class="alert alert-primary ">{{$asesor->email}}</td>
                                <td class="alert alert-primary">{{$asesor->estado}}</td>
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