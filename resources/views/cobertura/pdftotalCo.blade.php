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

<u> <h1 class="text-success fw-bold mb-0 text-center py-5">Coberturas de la Empresa {{Auth::user()->name}} </h1></u>
    
    <table id="tcompany" class="table" cellspacing="0" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th class="h6 ">Departamento/Provincia/Distrito</th>
                <th class="h6 ">Costo de Envio</th>
                <th class="h6 ">Dias Estimados</th>
            </tr>
        </thead>
        
            <tbody>
                @foreach ($coberturas as $cobertura)
                    <tr>
                        <td class="font-weight-light">{{$cobertura->ubigeos->departamento.'/'.$cobertura->ubigeos->provincia.'/'.$cobertura->ubigeos->distrito}}</td>
                        <td class="font-weight-light">{{$cobertura->precioenvio}}</td>
                        <td class="font-weight-light">{{$cobertura->diasestimados}}</td>
                    </tr>
                                                
                @endforeach
            </tbody>  
    </table>
</body>
</html>