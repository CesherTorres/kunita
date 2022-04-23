<table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
    <thead class="bg-light">
        <tr>
            <th class="h6">Departamento/Provincia/Distrito</th>
            <th class="h6">Costo de Envio</th>
            <th class="h6">Dias Estimados</th>
        </tr>
    </thead>
    
        <tbody>
            @foreach($coberturas as $cobertura)
            <tr>
                <td class="font-weight-light">{{$cobertura->ubigeos->departamento.'/'.$cobertura->ubigeos->provincia.'/'.$cobertura->ubigeos->distrito}}</td>
                <td class="font-weight-light">{{$cobertura->precioenvio}}</td>
                <td class="font-weight-light">{{$cobertura->diasestimados}}</td>
            </tr>
            @endforeach
        </tbody>  
    
        
    
    
</table>