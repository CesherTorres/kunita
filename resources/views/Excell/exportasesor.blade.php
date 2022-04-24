<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
    <thead>
        <tr>
            <th colspan="8" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th colspan="3" style="background-color:#0069AA; color:white; font-size:25px;font-weight: bold;">KUNAQ - GENERANDO VALOR</th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th rowspan="2" colspan="3" style="text-align: justify; background-color:#0069AA; color:white; font-size:13px;font-weight: bold;"><p>Direccion: Lima / Sector 1, grupo 9, Manzana I, Lote 24 - Villa el Salvador</p></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>
            <th colspan="8" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th colspan="3" style="background-color:#0069AA; color:white; font-size:20px;font-weight: bold;"><u>LISTA DE ASESORES</u></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>
            <th colspan="8" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>
            <th class="h6" style="background-color:#6E7E6B; color:white;">N°</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Nombres y Apellidos:</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Identificación</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Nº de Identificación</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Dirección</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Telefono</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Email</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Estado</th>
        </tr>
    </thead>
    
        <tbody>
            @php 
                $contador = 1;
            @endphp
            @foreach($asesores as $asesor)
                <tr>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$contador}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$asesor->name}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$asesor->tipodocumento}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$asesor->ndocumento}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$asesor->direccion}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$asesor->telefono}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$asesor->email}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$asesor->estadouser}}</td>
                    </tr>
                @php 
                    $contador++;
                @endphp
            @endforeach
        </tbody>  
</table>
</html>
