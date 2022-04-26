@extends('plantilla.principal')

@section('title', 'Productos')

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
                <img src="/public/userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/home') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresa_asesor') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            <a href="{{ url('/productos_asesor') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
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
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-shop me-2"></i> Productos</h1>
                <p class="text-muted">Lista de productos registrados</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a href="{{ url('/productos_asesor/create') }}" class="btn btn-primary w-100 align-self-center text-white"><i class="bi bi-plus-circle-fill me-2"></i> Nuevo Producto</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 mb-2">
                <div class="btn-group w-100 align-self-center btn-sm pt-0" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="success-outlined"><a href="{{ url('/productos_asesor') }}"><i class="bi bi-grid-3x2"></i></label></a>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="danger-outlined"><a href="{{ url('/listaPA') }}"><i class="bi bi-image"></i></a></label>
                </div>
            </div>
            <div class="col-lg-10 col-md-10  col-sm-12 mb-2">
                <div class="btn-group float-md-end  border rounded shadow-sm" role="group" aria-label="Basic example">
                    <a href="{{ url('/excel/producto-exportA') }}" target="_blank"><button type="button" class="btn btn-light">EXCEL</button></a>
                    <a href="{{ url('productospdfA') }}" target="_blank"><button type="button" class="btn btn-light">PDF</button></a>
                    <a href="{{ url('/productospdfI') }}" target="_blank"><button type="button" class="btn btn-light">Imprimir</button></a>
                </div>
            </div>
        </div>

        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
                <table id="tproductos" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">Empresa</th>
                            <th class="h6">Producto</th>
                            <th class="h6">Marca</th>
                            {{-- <th class="h6">Categoria</th> --}}
                            {{-- <th class="h6">Sub-Categoria</th> --}}
                            <th class="h6">Precio</th>
                            <th class="h6">Stock</th>
                            <th class="h6">Estado</th>
                            <th class="text-center h6">Accion</th>
                        </tr>
                    </thead>
                    
                        <tbody>
                            @foreach($productos as $producto)
                                <tr>
                                    <td class="font-weight-light">{{$producto->razonsocial}}</td>
                                    <td class="font-weight-light">{{$producto->nameproducto}}</td>
                                    <td class="font-weight-light">{{$producto->marca}}</td>
                                    {{-- <td class="font-weight-light">{{$producto->subcategoria->categoria->namecategoria}}</td> --}}
                                    {{-- <td class="font-weight-light">{{$producto->subcategoria->namesubcategoria}}</td> --}}
                                    <td class="font-weight-light">{{$producto->preciosugerido}}</td>
                                    <td class="font-weight-light">{{$producto->stock}}</td>
                                    <td class="font-weight-light">{{$producto->estado}}</td>
                                    <td>                                        
                                        <div class="text-center">
                                        <form method="POST" action="{{ route('productos_asesor.destroy',$producto->id) }}" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                            <a class="btn btn-outline-info btn-sm" href="/productos_asesor/{{$producto->id}}"><i class="bi bi-eye"></i></a>
                                            <a class="btn btn-outline-warning btn-sm" href="/productos_asesor/{{$producto->id}}/edit"><i class="bi bi-pencil-square"></i></a>
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#aoferta{{$producto->id}}"><i class="bi bi-percent"></i></button>
                                        </form>
        
                                        </div>       
                                    </td>
                                </tr>

                                <!-- modal -->
                                
                                <div class="modal fade" id="aoferta{{$producto->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Establecer Oferta</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="/productos_asesor/aoferta/{{$producto->id}}" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf                                                  
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-1">               
                                                                <label for="" class="form-label">Oferta de</label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <input id="oferta" name="oferta" type="number" max="100" min="0" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
                                                                    <span class="input-group-text" id="basic-addon1">%</span>
                                                                </div>           
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group mb-1">               
                                                                <label for="" class="form-label">Precio Sugerido</label>
                                                                <div class="input-group input-group-sm mb-3">
                                                                    <span class="input-group-text" id="basic-addon1">S/</span>
                                                                    <input id="preciosugerido" name="preciosugerido" value="{{$producto->preciosugerido}}" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
                                                                </div>           
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-1">               
                                                        <label for="" class="form-label">Fecha vencimiento</label>
                                                        <input name="fecha_vencimiento" id="fecha_vencimiento" type="date" class="form-control form-control-sm"  aria-label="Username" aria-describedby="basic-addon1">                                         
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Guardar</button>   
                                                        <button class="btn btn-danger" data-dismiss='modal'>Cancelar</button>
                                                    </div>
                                                </form>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>  
                   
                    
                </table>
                {{-- end table --}}
                <!-- modal -->
                <!-- fin modal -->
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
                $('#tproductos').DataTable({
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
    @if(session('addproducto') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Producto registrado correctamente',
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