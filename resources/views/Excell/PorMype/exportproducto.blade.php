<table id="tproductos" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">Empresa</th>
                            <th class="h6">Producto</th>
                            <th class="h6">Marca</th>
                            <th class="h6">Modelo</th>
                            <th class="h6">Genero</th>
                            <th class="h6">Alto</th>
                            <th class="h6">Profundidad</th>
                            <th class="h6">Ancho</th>
                            <th class="h6">Peso</th>
                            <th class="h6">Temperatura</th>
                            <th class="h6">stock</th>
                            <th class="h6">Oferta</th>
                            <th class="h6">Categoria</th>
                            <th class="h6">Sub-Categoria</th>
                            <th class="h6">Precio</th>
                            <th class="h6">Estado</th>
                        </tr>
                    </thead>
                    
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td class="font-weight-light">{{$producto->razonsocial}}</td>
                                    <td class="font-weight-light">{{$producto->nameproducto}}</td>
                                    <td class="font-weight-light">{{$producto->marca}}</td>
                                    <td class="font-weight-light">{{$producto->modelo}}</td>
                                    <td class="font-weight-light">{{$producto->genero}}</td>
                                    <td class="font-weight-light">{{$producto->alto}}</td>
                                    <td class="font-weight-light">{{$producto->profundidad}}</td>
                                    <td class="font-weight-light">{{$producto->ancho}}</td>
                                    <td class="font-weight-light">{{$producto->peso}}</td>
                                    <td class="font-weight-light">{{$producto->temperatura}}</td>
                                    <td class="font-weight-light">{{$producto->stock}}</td>
                                    <td class="font-weight-light">{{$producto->oferta}}</td>
                                    <td class="font-weight-light">{{$producto->namecategoria}}</td>
                                    <td class="font-weight-light">{{$producto->namesubcategoria}}</td>
                                    <td class="font-weight-light">{{$producto->preciosugerido}}</td>
                                    <td class="font-weight-light">{{$producto->estado}}</td>
                                </tr>
                            @endforeach
                        </tbody>  
                   
                    
                </table>