@extends('plantilla.principal')

@section('title', 'Empresas')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="images/kunaq-white.png" alt="Logo" class="me-2 my-1" style="width: 8rem;">
            </div>
        </div>
        <div class="user border-bottom">
            <div class="brand-link  brand-logo-primary navbar-primary mx-2 my-3">
                
                <img src="/public/userAsesor/{{ Auth::user()->fotouser }}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">                                
                
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/home') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresa_asesor') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            <a href="{{ url('/productos_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            <a href="{{ url('/solicitudesproductos_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success fw-bold mb-0"><i class="bi bi-building me-2"></i> Empresas</h1>
                <p class="lead text-muted">Se muestran la lista de empresas asociadas</p>
            </div>
            <!-- <div class="col-lg-3 d-flex">
                {{-- <button class="btn btn-primary w-100 align-self-center">Nueva Empresa</button> --}}
                <div class="btn-group w-100 align-self-center btn-sm pt-0" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="success-outlined"><i class="bi bi-grid-3x2"></i></label>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="danger-outlined"><i class="bi bi-image"></i></label>
                </div>
            </div> -->
        </div>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                        <a href="{{ url('/empresa_asesor/create') }}" class="btn btn-warning text-white"> Nueva Empresa</a>
                    </div>
                    <div class="col-lg-6 col-md-6  col-sm-12">
                        <div class="btn-group float-md-end  border rounded shadow-sm" role="group" aria-label="Basic example">
                            <a href="{{ url('/excel/asesores-Empresa') }}"><button type="button" class="btn btn-light">EXCEL</button></a>
                            <a href="{{ url('AsesorpdfEmpresa') }}"><button type="button" class="btn btn-light">PDF</button></a>
                            <a href="{{ url('AsesorpdfEmpresaI') }}" target="blank"><button type="button" class="btn btn-light">Imprimir</button></a>
                        </div>
                    </div>
                </div>

                {{-- table --}}
                <br>
                <table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">Razon Social</th>
                            <th class="h6">Giro</th>
                            <th class="h6">Propietario</th>
                            <th class="h6">Correo</th>
                            <th class="h6">Estado - Empresa</th>
                            <th class="text-center h6">Accion</th>
                        </tr>
                    </thead>
                    
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="font-weight-light">{{$user->razonsocial}}</td>
                                <td class="font-weight-light">{{$user->namegiros}}</td>
                                <td class="font-weight-light">{{$user->name}}</td>
                                <td class="font-weight-light">{{$user->email}}</td>
                                <td class="font-weight-light">{{$user->estadoemp}}</td>
                                <td>                                        
                                    <div class="text-center">
                                    <form method="POST" action="{{ route('empresa_asesor.destroy',$user->id) }}" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                        <a class="btn btn-outline-info btn-sm" href="/empresa_asesor/{{$user->id}}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-outline-warning btn-sm" href="/empresa_asesor/{{$user->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
    
                                    </div>      
                                </td>
                            </tr>
                            @endforeach
                        </tbody>  
                    
                        
                   
                    
                </table>
                {{-- end table --}}
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
            <!-- extension responsive -->
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        
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
    @if(session('addcompany') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Empresa registrada correctamente',
            timer: 2000
            })
        </script>
    @endif

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Registro actualizado correctamente',
            timer: 2000
            })
        </script>
    @endif
    <!--sweet alert alerta-->
    @if(session('info') == 'informacion')
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ha Ocurrido un Error',
                text: 'Las Contraseñas no coinciden',
            timer: 2000
            })
        </script>
    @endif
    <!--sweet alert eliminar-->
    @if(session('delete') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'El registro a sido eliminado',
            timer: 2000
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