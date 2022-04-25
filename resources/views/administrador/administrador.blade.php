@extends('plantilla.principal')

@section('title', 'Dashboard')

@section('css')
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
                <img src="/public//userAsesor/{{Auth::user()->fotouser}}" alt="Logo" class="rounded-circle me-2" style="width: 2rem;">
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
<div class="" id="app">
    <section class="py-3">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-9">
                    <h1 class="text-success fw-bold mb-0 text-uppercase h2">Bienvenido Usuario {{Auth::user()->tipousuario->name_tipo_usuario}}</h1>
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
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card border-primary shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Solicitudes Empresas</h6>
                            @foreach($sempresas as $semp)
                                <h3 class="fw-bold text-primary">{{$semp->se}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-primary">
                            <a href="{{ url('/solicitudesusuarios') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card border-warning shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Solicitudes Productos</h6>
                            @foreach($sproductos as $sprod)
                                <h3 class="fw-bold text-primary">{{$sprod->sp}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-warning">
                            <a href="{{ url('/solicitudesproductos') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card border-secondary shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Total Empresas</h6>
                            @foreach($empresas as $emp)
                                <h3 class="fw-bold text-primary">{{$emp->e}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-secondary">
                            <a href="{{ url('/empresas') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 py-2">
                    <div class="card border-danger shadow-sm mb-3 text-center h-100">
                        <div class="card-body">
                            <h6 class="card-title text-dark ">Total Productos</h6>
                            @foreach($productos as $prod)
                                <h3 class="fw-bold text-primary">{{$prod->p}}</h3> 
                            @endforeach
                        </div>
                        <div class="card-footer bg-danger">
                            <a href="{{ url('/productos') }}" class="text-white text-decoration-none">Información</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container" id="reportPage">
            <admin></admin>
        </div>
    </section>
</div>
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
  var pdfctxX = 80;
  var pdfctxY = 100;
  var buffer = 60;

    // Se puede cambiar durante la ejecución
    pdfctx.font = "30px Arial Black";
    pdfctx.strokeText("EMPRESAS ACTIVAS", 720, 70);
    pdfctx.strokeStyle = "green";

    pdfctx.font = "30px Arial Black";
    pdfctx.strokeText("PRODUCTOS MAS VENDIDOS", 120, 70);
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
  var pdf = new jsPDF('lx', 'pt', [900,300]);
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);

  // download the pdf
  pdf.save('Reporte_Total.pdf');
});
</script>        

@endsection