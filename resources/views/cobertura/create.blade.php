
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Cobertura</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-muted text-start">(*) - Campos obligatorios</p>
          <form method="post" name="new_purchase" id="new_purchase" action="/cobertura" enctype="multipart/form-data">
            @csrf
              <div class="form-group mb-3">               
                  <label for="ubigeocobertura_id" class="form-label">Distrito/Provincia/Departamento(*)</label>
                  <select class="form-select  js-example-basic-single" name="ubigeocobertura_id" id="ubigeocobertura_id" required>
                    <option value="" disabled="disabled" selected="selected" hidden="hidden"></option>
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
                        <input type="text" class="form-control" name="precioenvio" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="2">
                      </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-12 mb-3">
                      <label for="diasestimados" class="form-label">Días Estimados(*)</label>
                      <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="diasestimados" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="2">
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

