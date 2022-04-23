<table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
    <thead class="bg-light">
        <tr>
            <th class="h6">Nombres y Apellidos:</th>
            <th class="h6">Identificación</th>
            <th class="h6">Nº de Identificación</th>
            <th class="h6">Dirección</th>
            <th class="h6">Telefono</th>
            <th class="h6">Email</th>
            <th class="h6">Estado</th>
        </tr>
    </thead>
    
        <tbody>
        @foreach($asesores as $asesor)
            <tr>
                <td class="font-weight-light">{{$asesor->name}}</td>
                <td class="font-weight-light">{{$asesor->tipodocumento}}</td>
                <td class="font-weight-light">{{$asesor->ndocumento}}</td>
                <td class="font-weight-light">{{$asesor->direccion}}</td>
                <td class="font-weight-light">{{$asesor->telefono}}</td>
                <td class="font-weight-light">{{$asesor->email}}</td>
                <td class="font-weight-light">{{$asesor->estado}}</td>
            </tr>
            @endforeach
        </tbody>  
    
        
    
    
</table>