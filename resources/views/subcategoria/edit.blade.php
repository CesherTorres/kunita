<div class="container">
    <div class="modal fade" id="editsubcategory{{$subcategorias->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Sub-categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted text-start">(*) - Campos obligatorios</p>
                <form class="form-group" method="POST" action="/subcategoriaUpdate/{{$subcategorias->id}}">      
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="">Sub-Categorias(*)</label>
                        <input type="text" name="namesub" value="{{$subcategorias->namesubcategoria}}" class="form-control" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxlength="40">
                    </div>
                    <br>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Actualizar</button>   
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  