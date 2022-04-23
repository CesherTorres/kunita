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
            <a href="{{ url('/categorias') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-bookmarks me-2 lead"></i> Categorías</a>
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
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
        </div>      
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
        </div> 
        <div class="col-12 col-md-6 col-lg-3 col-xl-3 text-center mt-3 my-lg-5">
            <div class="card justify-content-center align-items-center border-0 bg-white rounded shadow">
                <img src="/images/company.png" class="rounded-top" style="width: 100%; height: 180px;" alt="">
                <div class="card-body">
                    <h4 class="text-secondary fw-light">Publicidad 1</h4>
                    <p class="text-dark my-lg-4">Av. Siempre Viva Nº742</p>
                    <div class="text-center">
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-facebook"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-primary rounded-circle" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    
                </div>
            </div>
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
    @if(session('addacount') == 'ok')
        <script>
            Swal.fire({
            icon: 'success',
            confirmButtonColor: '#3085d6',
            title: '¡Buen trabajo!',
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