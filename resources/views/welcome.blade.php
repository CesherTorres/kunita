@extends('plantilla.principal')

@section('title', 'Dashboard')

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
            <a href="{{ url('/home') }}" class=" btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-grid-1x2-fill me-2 lead"></i> Informe</a>
            <a href="{{ url('/empresas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Empresas</a>
            @if(Auth::user()->tipousuario_id == '2')
                @can('Asesor')
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
                @endcan
            @else
                    <a href="{{ url('/publicidad') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Publicidad</a>
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
        <div class="row">
            <div class="col-lg-9">
                <h1 class="text-success fw-bold mb-0">Bienvenido Usuario {{Auth::user()->tipousuario->name_tipo_usuario}}</h1>
                <p class="lead text-muted">Revisa la ultima información</p>
            </div>
            <div class="col-lg-3 d-flex">
                <button class="btn btn-primary w-100 align-self-center">Descargar Reporte</button>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                <div class="card border-primary shadow-sm mb-3 text-center h-100">
                    <div class="card-body">
                        <h6 class="card-title text-dark ">Solicitudes Empresas</h6>
                        <h3 class="fw-bold text-primary">15</h3> 
                    </div>
                    <div class="card-footer bg-primary">
                        <a href="#" class="text-white text-decoration-none">Información</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                <div class="card border-warning shadow-sm mb-3 text-center h-100">
                    <div class="card-body">
                        <h6 class="card-title text-dark ">Solicitudes Productos</h6>
                        <h3 class="fw-bold text-primary">150</h3> 
                    </div>
                    <div class="card-footer bg-warning">
                        <a href="#" class="text-white text-decoration-none">Información</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                <div class="card border-secondary shadow-sm mb-3 text-center h-100">
                    <div class="card-body">
                        <h6 class="card-title text-dark ">Empresas</h6>
                        @foreach($empresas as $emp)
                            <h3 class="fw-bold text-primary">{{$emp->e}}</h3> 
                        @endforeach
                    </div>
                    <div class="card-footer bg-secondary">
                        <a href="#" class="text-white text-decoration-none">Información</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                <div class="card border-danger shadow-sm mb-3 text-center h-100">
                    <div class="card-body">
                        <h6 class="card-title text-dark ">Nº Productos</h6>
                        <h3 class="fw-bold text-primary">400</h3> 
                    </div>
                    <div class="card-footer bg-danger">
                        <a href="#" class="text-white text-decoration-none">Información</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-6 col-md-12 colsm-12 pb-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold text-warning">Cantidad de busqueda de productos</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 colsm-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold text-secondary">Empresas Activas</h6>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3, 8, 20],
                    backgroundColor: [
                        '#009B3A',
                        '#009B3A',
                        '#009B3A',
                        '#009B3A',
                        '#009B3A',
                        '#009B3A',
                        '#009B3A',
                        '#009B3A'
                    ],
                    maxBarThickness:30,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
        <script>
            var ctx = document.getElementById('myChart2').getContext('2d');
            var myChart2 = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Activos', 'Inactivos'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19],
                        backgroundColor: [
                            '#F7971C',
                            '#0069AA'
                        ],
                        maxBarThickness:30,
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            </script>
@endsection