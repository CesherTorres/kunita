@extends('plantilla.pyme')

@section('title', 'Dashboard')
@section('css')
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="/css/footer.css">
    <link rel="stylesheet" type="text/css" href="/css/icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
@endsection
@section('aside')
<div class="offcanvas offcanvas-start sidebar-nav bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <div class="logo">
            <div class="brand-link d-flex border-bottom justify-content-center align-items-center brand-logo-primary navbar-primary">
                <img src="/images/kunaq-mype.png" alt="Logo" class="me-2 my-1" style="width: 14rem;">
            </div>
        </div>
        <div class="user border-bottom">
            <div class="brand-link  brand-logo-primary navbar-primary mx-2 my-3">
                <img src="/logos/{{Auth::user()->propietario->empresas->logoempresa}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem; height: 2rem;">
                <span class="brand-text fw-light text-white">{{ Auth::user()->name }}</span>
            </div>
        </div>
        <div class="menu">
            <a href="{{ url('/pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-newspaper me-2 lead"></i> Noticia</a>
            <a href="{{ url('/perfil') }}" class=" text-white d-block p-3 mx-2"><i class="bi bi-building me-2 lead"></i> Perfil</a>
            <a href="{{ url('/productos_pyme') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-shop me-2 lead"></i> Productos</a>
            <a href="{{ url('/cobertura') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-truck me-2 lead"></i>Cobertura</a>
            <a href="{{ url('/pedidos') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-box-seam me-2 lead"></i> Pedidos</a>
            <a href="{{ url('/ventas') }}" class="text-white d-block p-3 mx-2"><i class="bi bi-cash-coin me-2 lead"></i> Ventas</a>
            <a href="{{ url('/graficos') }}" class="btn btn-secondary rounded-pill text-start text-white d-block mx-2 mt-2"><i class="bi bi-symmetry-vertical me-2 lead"></i> Graficos</a>

        </div>
    </div>
</div>
@endsection

@section('content')
<div class="" id="app">
    <section class="py-3">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="text-success fw-bold mb-0 text-uppercase h2"><i class="bi bi-symmetry-vertical me-2"></i> Graficos</h1>
                    <p class="text-muted">Revisa la ultima información</p>
                </div>
                <div class="col-lg-3 d-flex">
                    <button class="btn btn-primary w-100 align-self-center" id="downloadPdf">Descargar Reporte</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card border-primary shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Total Pedidos</h6>
                            @foreach($tcpventas as $v)   
                                <h3 class="fw-bold text-primary">{{$v->pventitas}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-primary">
                            <a href="{{ url('/pedidos') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card border-warning shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark "> Total N° Ventas</h6>
                            @foreach($tcventas as $v) 
                                <h3 class="fw-bold text-primary">{{$v->ventitas}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-warning">
                            <a href="{{ url('/ventas') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card border-secondary shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Total S/. Ventas</h6>
                            @foreach($tventas as $v) 
                                <h3 class="fw-bold text-primary">{{$v->total}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-secondary">
                            <a href="{{ url('/ventas') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card border-danger shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Total Productos</h6>
                            @foreach($productos as $prod)  
                                <h3 class="fw-bold text-primary">{{$prod->prod}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-danger">
                            <a href="{{ url('/productos_pyme') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" id="reportPage">
            <pyme></pyme>
        </div>
        <br>
    </section>
</div>
@endsection
@section('foterRedes')
                <li><a href="https://www.facebook.com/CuanticaGroup" target="_blank"><i class="fab fa-facebook-f "></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=968370868" target="_blank"><i class="fab fa-whatsapp "></i></a></li>
                {{--<li><a href="{{Redes->propietario->empresas->enlacefacebook}}"><i class="fab fa-twitter "></i></a></li>--}}
                <li><a href="https://www.instagram.com/cuanticagroup/" target="_blank"><i class="fab fa-instagram "></i></a></li>
@endsection
@section('js')
<script src="/js/app.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>   


<script>

$('#downloadPdf').click(function(event) {
  // get size of report page
  var reportPageHeight = $('#reportPage').innerHeight();
  var reportPageWidth = $('#reportPage').innerWidth();
  
  // create a new canvas object that we will populate with all other canvas objects
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  // keep track canvas position
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 55;
  var pdfctxY = 100;
  var buffer = 60;

    // Se puede cambiar durante la ejecución
    pdfctx.font = "30px Arial Black";
    pdfctx.strokeText("EMPRESAS ACTIVAS", 785, 70);
    pdfctx.strokeStyle = "green";

    pdfctx.font = "30px Arial Black";
    pdfctx.strokeText("PRODUCTOS MAS VENDIDOS", 125, 70);
    pdfctx.strokeStyle = "green";

  // for each chart.js chart
  $("canvas").each(function(index) {
    // get the chart height/width
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
    // draw the chart into the new canvas
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    // our report page is in a grid pattern so replicate that in the new canvas
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  // create new pdf and add our new canvas as an image
  var pdf = new jsPDF('lx', 'pt', [1000,300]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);

  // download the pdf
  pdf.save('Reporte_Total.pdf');
});
</script>   
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