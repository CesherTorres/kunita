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
            <th colspan="4" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th colspan="3" style="background-color:#0069AA; color:white; font-size:25px;font-weight: bold;">KUNAQ - GENERANDO VALOR</th>
        </tr>
        <tr>
            <th style="background-color:#0069AA;"></th>
            <th rowspan="2" colspan="3" style="text-align: justify; background-color:#0069AA; color:white; font-size:13px;font-weight: bold;"><p>Direccion: Lima / Sector 1, grupo 9, Manzana I, Lote 24 - Villa el Salvador</p></th>

        </tr>
        <tr>
            <th style="background-color:#0069AA;"></th>
        </tr>
        <tr>
            <th colspan="4" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>

            <th style="background-color:#0069AA;"></th>
            <th colspan="3" style="background-color:#0069AA; color:white; font-size:20px;font-weight: bold;"><u>LISTA DE SUBCATEGORIAS</u></th>
        </tr>
        <tr>
            <th colspan="4" style="background-color:#0069AA; color:white; "></th>
        </tr>
        <tr>
            <th class="h6" style="background-color:#6E7E6B; color:white;">N°</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Categoría</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Sub-categoría</th>
            <th class="h6" style="background-color:#6E7E6B; color:white;">Descripcion</th>
        </tr>
    </thead>
    
        <tbody>
            @php 
                $contador = 1;
            @endphp
            @foreach ($subcategoria as $subcategorias)
                <tr>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$contador}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$subcategorias->categoria->namecategoria}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$subcategorias->namesubcategoria}}</td>
                    <td class="font-weight-light" style="text-align: center; border:2px;">{{$subcategorias->categoria->descripcion}}</td>
                </tr>
                @php 
                    $contador++;
                @endphp
            @endforeach
        </tbody>  
</table>
</html>
