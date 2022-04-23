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

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th class="h6"><b>Nombres y Apellidos:</b></th>
                <th class="h6"><b>Identificación</b></th>
                <th class="h6"><b>Correo</b></th>
                <th class="h6"><b>Telefono</b></th>
                <th class="h6"><b>Estado</b></th>
                <th class="h6"><b>Razon social</b></th>
                <th class="h6"><b>Nro RUC</b></th>
                <th class="h6"><b>Marca</b></th>
                <th class="h6"><b>Giro</b></th>
                <th class="h6"><b>Correo Empresa</b></th>
                <th class="h6"><b>Tel. Empresa</b></th>
                <th class="h6"><b>Direccion</b></th>
                <th class="h6"><b>Cuenta bancaria</b></th>
                <th class="h6"><b>Nro cuenta</b></th>
                <th class="h6"><b>Nro CCI</b></th>
                <th class="h6"><b>Billetera digital</b></th>
                <th class="h6"><b>Numero</b></th>
                <th class="h6"><b>Url Facebook</b></th>
                <th class="h6"><b>Url Whatsapp</b></th>
                <th class="h6"><b>Url Instagram</b></th>
                <th class="h6"><b>Asesor</b></th>
                <th class="h6"><b>Descripcion</b></th>
          </tr>
        </thead>
        <tbody>
            @foreach($companys as $company)
            <tr>
                <td class="font-weight-light">{{$company->propietario->user->name}}</td>
                <td class="font-weight-light">{{$company->propietario->user->tipodocumento.': '.$company->propietario->user->ndocumento}}</td>
                <td class="font-weight-light">{{$company->propietario->user->email}}</td>
                <td class="font-weight-light">{{$company->propietario->user->telefono}}</td>
                <td class="font-weight-light">{{$company->propietario->user->estadouser}}</td>
                <td class="font-weight-light">{{$company->razonsocial}}</td>
                <td class="font-weight-light">{{$company->ruc}}</td>
                <td class="font-weight-light">{{$company->marca}}</td>
                <td class="font-weight-light">{{$company->giro->namegiros}}</td>
                <td class="font-weight-light">{{$company->correoempresa}}</td>
                <td class="font-weight-light">{{$company->telefonoempresa}}</td>
                <td class="font-weight-light">{{$company->direccion}}</td>
                <td class="font-weight-light">{{$company->cuentabanco}}</td>
                <td class="font-weight-light">{{$company->ncuentabanco}}</td>
                <td class="font-weight-light">{{$company->ncuentabancocci}}</td>
                <td class="font-weight-light">{{$company->billeteradigital}}</td>
                <td class="font-weight-light">{{$company->numerobilletera}}</td>
                <td class="font-weight-light">{{$company->enlacefacebook}}</td>
                <td class="font-weight-light">{{$company->enlaceinstagram}}</td>
                <td class="font-weight-light">{{$company->enlacewhatsapp}}</td>
                <td class="font-weight-light">{{$company->user->name}}</td>
                <td class="font-weight-light">{{$company->descripcion}}</td>
            </tr>
            @endforeach
      </table>


</body>
</html>





