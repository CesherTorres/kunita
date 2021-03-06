@extends('plantilla.principal')

@section('title', 'Productos')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/cardP.css">
    <link rel="stylesheet" type="text/css" href="/css/pagination.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
            <a href="{{ url('/productos') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
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
                <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-shop me-2"></i> Productos</h1>
                <p class="text-muted">Lista de productos registrados</p>
            </div>
            <div class="col-lg-3 d-flex">
                <a href="{{ url('/productos/create') }}" class="btn btn-primary w-100 align-self-center text-white"><i class="bi bi-plus-circle-fill me-2"></i> Nuevo Producto</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-12 mb-2">
                <div class="btn-group w-100 align-self-center btn-sm pt-0" data-toggle="buttons">
                    <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="success-outlined"><a href="{{ url('/productos') }}"><i class="bi bi-grid-3x2"></i></label></a>

                    <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="danger-outlined"><a href="{{ url('/listaP') }}"><i class="bi bi-image"></i></label></a>
                </div>
            </div>
            <div class="col-lg-10 col-md-4  col-sm-12">
                <div class="btn-group float-md-end  border rounded shadow-sm" role="group" aria-label="Basic example">
                    <a href="{{ url('/excel/producto-export') }}" target="blank"><button type="button" class="btn btn-light">EXCEL</button></a>
                    <a href="{{ url('/productospdf') }}" target="blank"><button type="button" class="btn btn-light">PDF</button></a>
                    <a href="{{ url('/pdf_productoImprimir') }}" target="blank"><button type="button" class="btn btn-light">Imprimir</button></a>
                </div>
            </div>
        </div>
       
        <div class="card border-4 borde-top-primary shadow-sm py-2 mb-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6 py-auto">
                        <form class="">
                            <div class="input-group input-group-sm">
                                <input class="form-control border-0 rounded-0 border-bottom" type="search" id="site-search" name="buscarpor" aria-label="Search" placeholder="Buscar">
                                <button class="btn rounded-0 border-bottom" type="submit" id="button-addon2">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="float-end">
                            {{$producto->links()}}
                        </div>
                    </div>
                </div>

                {{-- table --}}

                <div class="row justify-content-center" align="center">
                    @foreach($producto as $productos)
                    <div class="col col-sm col-md-6 col-lg-4">
                        <div id="cards">
                            <div class="image">
                            <img src="/images_product/{{$productos->imgprincipal}}" style="background: #FFFEC8;min-width: auto; min-height: 300px;"/>
                            </div>
                            <div class="details">
                                <div class="center">
                                    <h1>{{$productos->nameproducto}}<br><span>Marca: {{$productos->marca}}</span></h1>
                                    <p>PRECIO: S/{{$productos->preciosugerido}}</p>
                                    <ul>
                                    <form method="POST" action="{{ route('productos.destroy',$productos->id) }}" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <li><a href="/productos/{{$productos->id}}/edit"><i class="bi bi-pencil-square"></i></a></li>
                                        <li><button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button></li>
                                        <li><button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#oferta"><i class="bi bi-percent"></i></button></li>
                                    </form>
                                    </ul>
                                </div>
                            </div>
                        </div><br> 
                    </div>
                    <div class="modal fade" id="oferta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Establecer Oferta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="/productos/oferta/{{$productos->id}}" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-1">               
                                                    <label for="" class="form-label">Oferta de</label>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <input id="oferta" name="oferta" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
                                                        <span class="input-group-text" id="basic-addon1">%</span>
                                                    </div>           
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-1">               
                                                    <label for="" class="form-label">Precio Sugerido</label>
                                                    <div class="input-group input-group-sm mb-3">
                                                        <span class="input-group-text" id="basic-addon1">S/</span>
                                                        <input id="preciosugerido" name="preciosugerido" value="{{$productos->preciosugerido}}" type="text" class="form-control"  aria-label="Username" aria-describedby="basic-addon1" required>
                                                    </div>           
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-1">               
                                            <label for="" class="form-label">Fecha vencimiento</label>
                                            <input name="fecha_vencimiento" id="fecha_vencimiento" type="date" class="form-control form-control-sm"  aria-label="Username" aria-describedby="basic-addon1" required>                                         
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Guardar</button>   
                                            <button type="button" class="btn btn-danger" data-bs-dismiss='modal'>Cancelar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <br>
                {{-- end table --}}
            </div>
        </div>
    </div>
    <br>
    
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
    @if(session('addacount') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '??Buen trabajo!',
            text: 'Cuenta registrada correctamente',
            })
        </script>
    @endif

    <!--sweet alert actualizar-->
    @if(session('update') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '??Actualizado!',
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
            title: '??Eliminado!',
            text: 'Registro eliminado correctamente',
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