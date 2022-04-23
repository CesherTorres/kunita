<div class="modal fade" id="exampleModal{{$asesor->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edita tu Contraseña</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" name="new_purchase" id="new_purchase" action="/updatepassword/{{$asesor->id}}" enctype="multipart/form-data">
         @csrf
        @method('put')
      <div class="modal-body">
            
            <div class="row">
                <label for="inputPassword5" class="form-label">Contraseña</label>
                <input type="password" name="password" id="inputPassword5" class="form-control" value="{{$asesor->password}}" aria-describedby="passwordHelpBlock">
            </div>
            <div class="row">
                <label for="inputPassword5" class="form-label">Confirmar Contraseña</label>
                <input type="password" name="confirmpassword" id="inputPassword5" class="form-control" value="{{$asesor->confirmpassword}}" aria-describedby="passwordHelpBlock">
            </div>
            <span id='message'></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>

    </div>
  </div>
</div>