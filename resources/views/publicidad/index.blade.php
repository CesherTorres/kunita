@extends('plantilla.principal')

@section('title', 'Publicidad')

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
                <img src="/userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/home') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/publicidad') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
                @endcan
            @else
                    <a href="{{ url('/publicidad') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
            @endif
            <a href="{{ url('/productos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categor??as</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/Asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
                @endcan
            @else
                <a href="{{ url('/Asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-people me-2 lead"></i> Asesor</a>
            @endif
            <a href="{{ url('/solicitudesproductos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-arrow-down-square me-2 lead"></i> Solicitudes</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<section class="py-3">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-newspaper me-2"></i> Publicidad</h1>
                <p class="text-muted">Lista de publicidad registradas</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a href="{{ url('/publicidad/create') }}" class="btn btn-primary w-100 align-self-center text-white "><i class="bi bi-plus-circle-fill me-2"></i> Nueva Publicidad</a>
            </div>
        </div>
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
                <table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">Titulo</th>
                            <th class="h6">Tipo</th>
                            <th class="h6">Propietario</th>
                            <th class="h6">Correo</th>
                            <th class="h6">Telefono</th>
                            <th class="text-center h6">Accion</th>
                        </tr>
                    </thead>
                    
                        <tbody>
                        @foreach($publicidad as $publicidad)
                            <tr>
                                <td class="font-weight-light">{{$publicidad->titulo}}</td>
                                <td class="font-weight-light">{{$publicidad->tipo}}</td>
                                <td class="font-weight-light">{{$publicidad->propietario}}</td>
                                <td class="font-weight-light">{{$publicidad->correo}}</td>
                                <td class="font-weight-light">{{$publicidad->telefono}}</td>
                                <td>                                        
                                    <div class="text-center">
                                    <form method="POST" action="{{ route('publicidad.destroy',$publicidad->id) }}" class="form-delete">
                                    @csrf
                                    @method('DELETE')
                                        <a class="btn btn-outline-info btn-sm" href="/publicidad/{{$publicidad->id}}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-outline-warning btn-sm" href="/publicidad/{{$publicidad->id}}/edit"><i class="bi bi-pencil-square"></i></a>
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
                        "zeroRecords": "No se encontr?? nada, lo siento",
                        "info": "Mostrando p??gina _PAGE_ de _PAGES_",
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
    @if(session('addpublicidad') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Publicidad registrada correctamente',
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
            title: '??Estas seguro?',
            text: "??No podr??s revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '??S??, eliminar!',
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