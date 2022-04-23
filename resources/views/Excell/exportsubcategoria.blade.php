      <table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">Categoría</th>
                                    <th class="h6">Sub-categoría</th>
                                    <th class="h6">Descripcion</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach ($subcategoria as $subcategorias)
                                        <tr>
                                            <td class="font-weight-light">{{$subcategorias->categoria->namecategoria}}</td>
                                            <td class="font-weight-light">{{$subcategorias->namesubcategoria}}</td>
                                            <td class="font-weight-light">{{$subcategorias->categoria->descripcion}}</td>
                                        </tr>
                                                                    
                                    @endforeach
                                </tbody>  
                        </table>