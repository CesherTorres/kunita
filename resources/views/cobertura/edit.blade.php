

  <div class="modal fade" id="editcobertura{{$cobertura->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Cobertura</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-muted text-start">(*) - Campos obligatorios</p>
          <form method="post" name="new_purchase" id="new_purchase" action="/cobertura/{{$cobertura->id}}" enctype="multipart/form-data">
            @csrf
            @method('put')
              <div class="form-group mb-3">               
                  <label for="ubigeocobertura_id" class="form-label text-start">Distrito/Provincia/Departamento(*)</label>
                  <select class="form-select form-select-sm" name="ubigeocobertura_id" id="ubigeocobertura_id" required>
                    <option value="{{$cobertura->ubigeos->id}}" disabled="disabled" selected="selected" hidden="hidden">{{$cobertura->ubigeos->departamento.'/'.$cobertura->ubigeos->provincia.'/'.$cobertura->ubigeos->distrito}}</option>
                    @foreach($ubigeo as $ub)
                        <option value="{{$ub->id}}">{{$ub->distrito. ', '.$ub->provincia. ', '.$ub->departamento}}</option>
                    @endforeach
                </select>
              </div>
              <div class="row ">
                  <div class=" form-group col-md-6 col-sm-12 mb-3">
                      <label for="precioenvio" class="form-label">Costo de Envío(*)</label>
                      <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">S/.</span>
                        <input type="text" class="form-control" name="precioenvio" value="{{$cobertura->precioenvio}}" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="2">
                      </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-12 mb-3">
                      <label for="diasestimados" class="form-label">Días Estimados(*)</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="diasestimados" value="{{$cobertura->diasestimados}}" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="2">
                        <span class="input-group-text">Días</span>
                      </div>
                  </div>
              </div> 
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
     
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>