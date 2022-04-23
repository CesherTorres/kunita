<div class="container">
    <div class="modal fade" id="editcategory{{$categorias->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($message = Session::get('errors'))
                    <div class="alert alert-danger">
                        <ul>
                        <p>¡Algo salió mal!</p>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                        </ul>
                    </div>
                @endif
                <p class="text-muted text-start">(*) - Campos obligatorios</p>
                <form class="form-group" method="POST" action="/categoriaUpdate/{{$categorias->id}}">      
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="">Nombre de Categoria(*)</label>
                        <input type="text" name="namecategori" value="{{$categorias->namecategoria}}" class="form-control" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion(*)</label>
                        <input type="text" name="descripcion" value="{{$categorias->descripcion}}" class="form-control" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="100">
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

  