@extends('plantilla.pyme')

@section('title', 'Ventas')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/css/icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

@endsection

@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
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
            <a href="{{ url('/cobertura') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-truck me-2 lead"></i>Cobertura</a>
            <a href="{{ url('/pedidos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-box-seam me-2 lead"></i> Pedidos</a>
            <a href="{{ url('/ventas') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-cash-coin me-2 lead"></i> Ventas</a>
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
                <h1 class="text-success fw-bold mb-0"><i class="bi bi-cash-coin me-2"></i> Ventas</h1>
                <p class="lead text-muted">Lista de ventas</p>
            </div>
        </div> 
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-2">
                        <a href="{{ url('/ventas/create') }}" class="btn btn-warning text-white"> Nueva venta</a>
                    </div>
                    <div class="col-lg-6 col-md-6  col-sm-12">
                        <div class="btn-group float-md-end  border rounded shadow-sm" role="group" aria-label="Basic example">
                            <a href="{{ url('/excel/Venta-exportVS') }}" target="_bank"><button type="button" class="btn btn-light">EXCEL</button></a>
                            <a href="{{ url('/TotalVentapdf') }}" target="_bank"><button type="button" class="btn btn-light">PDF</button></a>
                            <a href="{{ url('/TotalVentapdfI') }}" target="blank"><button type="button" class="btn btn-light">Imprimir</button></a>
                        </div>
                    </div>
                </div>
                {{-- table --}}
                <br>
                <table id="tcompany" class="table table-hover table-sm" cellspacing="0" style="width:100%">
                    <thead class="bg-light">
                        <tr>
                            <th class="h6">Cliente</th>
                            <th class="h6">Telefono</th>
                            <th class="h6">direccion</th>
                            <th class="h6">Fecha</th>
                            <th class="h6">Precio Total</th>
                            <th class="h6">Estado</th>
                            <th class="text-center h6">Accion</th>
                        </tr>
                    </thead>
                    
                        <tbody>
                            @foreach($ventas as $venta)
                                <tr>
                                    <td class="font-weight-light">{{$venta->namecliente}}</td>
                                    <td class="font-weight-light">{{$venta->celular}}</td>
                                    <td class="font-weight-light">{{$venta->direccion}}</td>
                                    <td class="font-weight-light">{{$venta->fecha_hora}}</td>
                                    <td class="font-weight-light">{{$venta->total}}</td>
                                    <td class="font-weight-light">{{$venta->estado}}</td>
                                    <td>                                        
                                        <div class="text-center">
                                        {{-- <form method="POST" action="" class="form-delete">
                                        @csrf
                                        @method('DELETE')
                                            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#createacount"><i class="bi bi-credit-card-fill"></i></button>
                                            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                        </form> --}}

                                        <a class="btn btn-outline-info btn-sm" href="/ventas/{{$venta->id}}"><i class="bi bi-eye"></i></a>
                                        <a class="btn btn-outline-dark btn-sm" href="/imprimirventa/{{$venta->id}}" target="blank"><i class="bi bi-printer"></i></a>
        
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
    <br>
</section>
@endsection
@section('foterRedes')
                <li><a href="{{$redes->propietario->empresas->enlacefacebook}}" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
                <li><a href="{{$redes->propietario->empresas->enlacewhatsapp}}" target="_blank"><i class="fab fa-whatsapp "></i></a></li>
                {{--<li><a href="{{Redes->propietario->empresas->enlacefacebook}}"><i class="fab fa-twitter "></i></a></li>--}}
                <li><a href="{{$redes->propietario->empresas->enlaceinstagram}}" target="_blank"><i class="fab fa-instagram "></i></a></li>
                {{-- <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li> --}}
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
    @if(session('addventas') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '¡Buen trabajo!',
            text: 'La venta ha sido registrada correctamente',
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