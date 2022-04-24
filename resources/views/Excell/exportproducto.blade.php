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
            <th colspan="16" style="background-color:#0069AA; color:white; "></th>
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
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>
            <th colspan="16" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th colspan="3" style="background-color:#0069AA; color:white; font-size:20px;font-weight: bold;"><u>LISTA DE PRODUCTOS</u></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>
            <th colspan="16" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Empresa</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Producto</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Marca</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Modelo</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Genero</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Alto</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Profundidad</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Ancho</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Peso</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Temperatura</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">stock</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Oferta</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Categoria</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Sub-Categoria</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Precio</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Estado</th>
        </tr>
    </thead>
    
        <tbody>
            @php 
                $contador = 1;
            @endphp
            @foreach($productos as $producto)
                <tr>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->empresa->razonsocial}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->nameproducto}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->marca}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->modelo}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->genero}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->alto}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->profundidad}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->ancho}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->peso}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->temperatura}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->stock}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->oferta}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->namecategoria}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->namesubcategoria}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->preciosugerido}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$producto->estado}}</td>
                    </tr>
                @php 
                    $contador++;
                @endphp
            @endforeach
        </tbody>  
</table>
</html>
