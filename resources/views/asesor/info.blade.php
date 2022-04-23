<div class="modal fade" id="infoasesor{{$asesore->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width:1500px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informacion del Asesor</h5>
                <button class="close bg-danger text-white" data-bs-dismiss='modal'>&times;</button>
            </div>
            <div class="modal-body">
                <div class="card-group">
                    <div class="card col-md-4 col-sm-6 bg-light card-primary card-outline">
                        <div class="card-header border-none bg-primary text-white">
                            <div style="text-align: center"><h3>Foto del Asesor</h3></div>
                        </div>
                        <form>
                        <br>   
                        <div class="row justify-content-center">
                            <img src="/userAsesor/{{$asesore->fotouser}}" style="height: 320px; width:auto;" alt="...">
                        </div>    
                        </form>   
                    </div>{{--.card --}}
                    <div class="card col-md-8 col-sm-6 card-primary card-outline" style="text-align: center">
                        <div class="card-header bg-danger text-white border-none">
                            <div style="text-align: center"><h3 >Datos del Asesor</h3></div>
                        </div>
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-6"><label for="exampleInputEmail1" class="form-label"><strong><u>Nombre Completo</u></strong></label>
                                    <p>{{$asesore->name}}</p></div>
                            <div class="col-6"><label for="exampleInputEmail1" class="form-label"><strong><u>Direccion</u></strong></label>
                                    <p>{{$asesore->direccion}}</p>   
                        </div>
                        <div class="row justify-content-center">
                            
                                <div class="col-6"><label for="exampleInputEmail1" class="form-label"><strong><u>Tipo de Documento</u></strong></label>
                                    <p>{{$asesore->tipodocumento}}</p></div>
                                <div class="col-6"><label for="exampleInputEmail1" class="form-label"><strong><u>Nro de Documento</u></strong></label>
                                    <p>{{$asesore->ndocumento}}</p></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-6">
                            <div class="mb-3">          
                                    <label for="exampleInputEmail1" class="form-label"><strong><u>Distrito/provincia/departamento</u></strong></label>
                                    <p>{{$asesore->distrito.', '.$asesore->provincia.','.$asesore->departamento}}</p>
                            </div>        
                            </div>
                            <div class="col-6">
                                <div class="mb-3" id="correI">
                                    <label for="exampleInputEmail1" class="form-label"><strong><u>Correo</u></strong></label>
                                    <p>{{$asesore->email}}</p>
                                    </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a  href="{{ route('index.asesor')}}" class="btn btn-primary"><i class="bi bi-save"></i> Atras</a>
                        </div>
                        <br>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
