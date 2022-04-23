<table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
    <thead class="bg-light">
        <tr>
            <th class="h6">Cliente</th>
            <th class="h6">Tipo de Identificacion</th>
            <th class="h6">Nro Identificación:</th>
            <th class="h6">Telefono</th>
            <th class="h6">Cobertura</th>
            <th class="h6">Dirección</th>
            <th class="h6">Referencia</th>
            <th class="h6">Correo</th>
            <th class="h6">Producto</th>
            <th class="h6">Cantidad</th>
            <th class="h6">Precio</th>
            <th class="h6">SubTotal</th>
        </tr>
    </thead>
    
        <tbody>
            @foreach($ventas as $venta)
                @foreach($detalleventa as $detalle)
            <tr>
                <td class="font-weight-light">{{$venta->namecliente}}</td>
                <td class="font-weight-light">{{$venta->tipodocumento}}</td>
                <td class="font-weight-light">{{$venta->ndocumento}}</td>
                <td class="font-weight-light">{{$venta->celular}}</td>
                <td class="font-weight-light">{{$venta->cobertura->ubigeos->departamento.'/'.$venta->cobertura->ubigeos->provincia.'/'.$venta->cobertura->ubigeos->distrito}}</td>
                <td class="font-weight-light">{{$venta->direccion}}</td>
                <td class="font-weight-light">{{$venta->referencia}}</td>
                <td class="font-weight-light">{{$venta->correo}}</td>
                <td class="font-weight-light">{{$detalle->nameproducto}}</td>
                <td class="font-weight-light">{{$detalle->cantidad}}</td>
                <td class="font-weight-light">{{$detalle->precio}}</td>
                <td class="font-weight-light">{{$detalle->cantidad*$detalle->precio}}</td>
                

            </tr>
            @endforeach
            @endforeach
        </tbody>  
    
        
    
    
</table>