@extends('plantilla.pyme')

@section('title', 'Cobertura')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  
    <!--icono y footer  -->
    <link rel="stylesheet" type="text/css" href="/public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/public/css/icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">  
    
    <!--  -->
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/public//images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
            </div>
        </div>
        <div class="user border-bottom">
            <div class="brand-link  brand-logo-primary navbar-primary mx-2 my-3">
                <img src="/public/logos/{{Auth::user()->propietario->empresas->logoempresa}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Noticia</a>
            <a href="{{ url('/perfil') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Perfil</a>
            <a href="{{ url('/productos_pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/cobertura') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-truck me-2 lead"></i>Cobertura</a>
            <a href="{{ url('/pedidos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-box-seam me-2 lead"></i> Pedidos</a>
            <a href="{{ url('/ventas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-cash-coin me-2 lead"></i> Ventas</a>
            <a href="{{ url('/graficos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-symmetry-vertical me-2 lead"></i> Graficos</a>

        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-truck me-2"></i> Cobertura</h1>
                <p class="text-muted">Lista de coberturas</p>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-12 col-lg-6">

            </div>
            <div class="col-12 col-lg-6">
                <div class="btn-group float-md-end  border rounded shadow-sm" role="group" aria-label="Basic example">
                    <a href="{{ url('coberturaExcell') }}" target="blank"><button type="button" class="btn btn-light">EXCEL</button></a>
                    <a href="{{ url('coberturapdfT') }}" target="blank"><button type="button" class="btn btn-light">PDF</button></a>
                    <a href="{{ url('coberturapdfI') }}" target="blank"><button type="button" class="btn btn-light">Imprimir</button></a>
                </div>
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
                {{-- table --}}

                <div class="row"> 
                    <div class="col-12 col-md-4">
                        <h6 class="text-uppercase fw-bold text-center">Nueva cobertura</h6>
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
                            
                            <div class=" form-group mb-3">
                                <label for="precioenvio" class="form-label">Costo de Envío(*)</label>
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">S/.</span>
                                    <input type="text" class="form-control" name="precioenvio" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="2">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="diasestimados" class="form-label">Días Estimados(*)</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" name="diasestimados" required onkeypress="return solonumeros(event)" onpaste="return false" maxLength="2">
                                    <span class="input-group-text">Días</span>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                                <button type="submit" class="btn btn-primary w-100">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-8">
                        <table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">Departamento/Provincia/Distrito</th>
                                    <th class="h6">Costo de Envío</th>
                                    <th class="h6">Días Estimados</th>
                                    <th class="text-center h6">Accion</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach($coberturas as $cobertura)
                                        <tr>
                                            <td class="font-weight-light">{{$cobertura->ubigeos->departamento.'/'.$cobertura->ubigeos->provincia.'/'.$cobertura->ubigeos->distrito}}</td>
                                            <td class="font-weight-light">{{$cobertura->precioenvio}}</td>
                                            <td class="font-weight-light">{{$cobertura->diasestimados}}</td>
                                            <td>                                        
                                                <div class="text-center">
                                                <form method="POST" action="{{ route('cobertura.destroy',$cobertura->id) }}" class="form-delete">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editcobertura{{$cobertura->id}}"><i class="bi bi-pencil-square"></i></button>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                                @include('cobertura.edit')
                                                </div>      
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>  
                        
                            
                        </table>
                    </div>
                </div>
                {{-- end table --}}
            </div>
        </div>
    </div>
    <br>
</section>
@endsection
@section('foterRedes')
                <li><a href="https://www.facebook.com/CuanticaGroup" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=968370868" target="_blank"><i class="fab fa-whatsapp "></i></a></li>
                {{--<li><a href="{{Redes->propietario->empresas->enlacefacebook}}"><i class="fab fa-twitter "></i></a></li>--}}
                <li><a href="https://www.instagram.com/cuanticagroup/" target="_blank"><i class="fab fa-instagram "></i></a></li>
@endsection
@section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        
        {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script> --}}
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
            <!-- extension responsive -->
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
   <script>
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        </script>
        
        <!--datatables-->
        <script>
            $(document).ready(function() {
                $('#tcompany').DataTable({
                    responsive: true,
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontró nada, lo siento",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate":{
                            "next": "&raquo;",
                            "previous": "&laquo;"
                        } 
                    }
                });
            } );
        </script>

        <!--sweet alert agregar-->
    @if(session('addcobertura') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '¡Buen trabajo!',
            text: 'Cobertura registrada correctamente',
            })
        </script>
    @endif

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '¡Actualizado!',
            text: 'Registro actualizado correctamente',
            })
        </script>
    @endif
    
    <!--sweet alert eliminar-->
    @if(session('delete') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '¡Eliminado!',
            text: 'Registro eliminado correctamente',
            })
        </script>
    @endif
    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();

            Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
            this.submit();
            }
            })

        });
    </script>
    <!--.sweet alert eliminar-->
    @endsection