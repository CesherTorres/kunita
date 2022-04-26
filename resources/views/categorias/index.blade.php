@extends('plantilla.principal')

@section('title', 'Categorías')

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
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
                @endcan
            @else
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
            @endif
            <a href="{{ url('/productos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/categorias') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
            <a href="{{ url('/subcategoria') }}" class="text-white d-block p-3 mx-4"><i class="bi bi-bookmarks me-2"></i> Subcategorias</a>
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
            <div class="col-lg-8">
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-bookmarks me-2"></i> Categorías</h1>
                <p class="text-muted">Lista de categorías</p>
            </div>
        </div>
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
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h6 class="text-uppercase fw-bold text-center">Nueva categoría</h6>
                        <span class="text-danger">(*) <small class="text-muted py-0 my-0 text-start"> - Campos obligatorios</small></span>
                        <form class="form-group" method="POST" action="/categoriass">      
                            @csrf
                            <div class="form-group py-1">
                                <label for="">Nombre de Categoria(*)</label>
                                <input type="text" name="namecategoria" class="form-control" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="40">
                            </div>
                            <div class="form-group py-1">
                                <label for="">Descripcion(*)</label>
                                <input type="text" name="descripcion" class="form-control" required onkeypress="return sololetrasespace(event)" onpaste="return false" maxLength="100">
                            </div>
                            <br>
                            <div class="text-center pt-4">
                                <button type="submit" class="btn btn-primary w-100">Guardar</button>   
                            </div>
                        </form>
                        <br>
                    </div>
                    <div class="col-md-8">
                        <div class="row"> 
                            <div class="col-lg-12 col-md-12  col-sm-12">
                                <div class="btn-group float-md-end  border rounded shadow-sm" role="group" aria-label="Basic example">
                                    {{-- <button type="button" class="btn btn-light">CSV</button>
                                    <button type="button" class="btn btn-light">PDF</button>
                                    <button type="button" class="btn btn-light">Imprimir</button> --}}
                                </div>
                            </div>
                        </div>
                        <!--modal-->
                        <br>
                        <table id="tcategorias" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                            <thead class="bg-light">
                                <tr>
                                    <th class="h6">id</th>
                                    <th class="h6">Categoría</th>
                                    <th class="h6">Descripcion</th>
                                    <th class="text-center h6">Accion</th>
                                </tr>
                            </thead>
                            
                                <tbody>
                                    @foreach ($categorias as $categorias)
                                        <tr>
                                            <td class="font-weight-light">{{$categorias->id}}</td>
                                            <td class="font-weight-light">{{$categorias->namecategoria}}</td>
                                            <td class="font-weight-light">{{$categorias->descripcion}}</td>
                                            <td>                                        
                                                <div class="text-center">
                                                    <form method="POST" action="{{ route('delete.category',$categorias->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editcategory{{$categorias->id}}"><i class="bi bi-pencil-square"></i></button>
                                                        {{-- <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button> --}}
                                                    </form>
                                                </div>      
                                            </td>
                                            @include('categorias.edit')
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
                $('#tcategorias').DataTable({
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
    @if(session('addacategory') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '¡Buen trabajo!',
            text: 'Categoría registrada correctamente',
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
            text: "¡Ten en cuenta que tienes Subcategorias relacionadas!",
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