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
            <th colspan="13" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th colspan="3" style="background-color:#0069AA; color:white; font-size:25px;font-weight: bold;">KUNAQ - GENERANDO VALOR</th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th rowspan="2" colspan="3" style="text-align: justify; background-color:#0069AA; color:white; font-size:13px;font-weight: bold;"><p>Direccion: Lima / Sector 1, grupo 9, Manzana I, Lote 24 - Villa el Salvador</p></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>

        </tr>
        <tr>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>

        </tr>
        <tr>
            <th colspan="13" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th colspan="3" style="background-color:#0069AA; color:white; font-size:20px;font-weight: bold;"><u>LISTA DE VENTAS</u></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>

        </tr>
        <tr>
            <th colspan="13" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>
            <th class="h6" style="background-color:#6E7E6B; color:white;">N°</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Cliente</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Tipo de Identificacion</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Nro Identificación:</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Telefono</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Cobertura</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Dirección</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Referencia</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Correo</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Producto</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Cantidad</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Precio</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">SubTotal</th>
        </tr>
    </thead>
    
        <tbody>
            @php 
                $contador = 1;
            @endphp
            @foreach($ventas as $venta)
                @foreach($detalleventa as $detalle)
                <tr>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$contador}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->namecliente}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->tipodocumento}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->ndocumento}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->celular}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->cobertura->ubigeos->departamento.'/'.$venta->cobertura->ubigeos->provincia.'/'.$venta->cobertura->ubigeos->distrito}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->direccion}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->referencia}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$venta->correo}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$detalle->nameproducto}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$detalle->cantidad}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$detalle->precio}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$detalle->cantidad*$detalle->precio}}</td>
                    </tr>
                @php 
                    $contador++;
                @endphp
                @endforeach
            @endforeach
        </tbody>  
</table>
</html>
