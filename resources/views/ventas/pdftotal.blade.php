<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kaita | Reporte Almacen PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ public_path('/css/templategeneral.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ public_path('/css/main.css') }}" type="text/css"> --}}
</head>
<style>
    @font-face {
      font-family: 'Cairo';
      font-style: normal;
      font-weight: 300;
      src: local('Cairo'), local('Cairo'), url(https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap) format('truetype');
    }

    @page {
        margin: 0cm 0cm;
    }
    body{
        font-family: Cairo, sans-serif !important;
        margin-top: 1.5cm;
        margin-left: 1.5cm;
        margin-right: 1.5cm;
        margin-bottom: 1.5cm;
    }

    header {
        font-family: Cairo, sans-serif !important;
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 1.5cm;
        background-color: #0069AA;
        color: white;
    }

    footer {
        font-family: Cairo, sans-serif !important;
        position: fixed; 
        bottom: 0.2cm; 
        left: 0cm; 
        right: 0cm;
        height: 2cm;
    }
    .bg-primary{
        background-color: #0069AA !important;
    }

    .bg-secondary{
        background-color: #999999 !important;
    }

    .border-primary{
        border-color: #0069AA !important;
    }


</style>
<body>
    <header>
        <div class="container">
            <div class="clearfix">
                <div class="float-start">
                    <span class="text-uppercase pb-2 fs-6 fw-bold align-middle"><img src="{{ public_path('images/kunaq-v.png') }}" class="p-3 shadow bg-white" style="height:85px" alt="..."> Kunaq - Generando valor</span>
                </div>
                <div class="float-end">
                    <span class="text-uppercase fs-6 float-end fw-bold pt-4">{{$now->format('Y-m-d')}}</span>
                </div>
               
                
            </div>
        </div>
    </header>

    <table class="w-100 text-center">
        <tr>
            <td style="width: 25%">
                
            </td>
            
            <td style="width: 40%">
                <span class="text-uppercase fs-6 text-center fw-bold d-block">{{ Auth::user()->propietario->empresas->razonsocial }}</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 10px">{{ Auth::user()->propietario->empresas->direccion }}</p>
                <span class="fw-light fst-italic d-block" style="font-size: 10px">{{ Auth::user()->propietario->empresas->telefonoempresa }}</span>
            </td>
            <td style="width: 35%">
                <img src="{{ public_path("logos/".Auth::user()->propietario->empresas->logoempresa) }}" class=" card-img" style="height:85px" alt="...">
            </td>
            
        </tr>
    </table>

    <div class="text-center">
        
        <span class="text-uppercase pt-2 text-start text-primary small fw-bold d-block">Reporte Total de Ventas</span>
        <br>
        <table class="w-100" style="font-size: 10px; ">
            <thead>
                <tr>
                    <th class="border" style="width: 40%">CLIENTE</th>
                    <th class="border" style="width: 30%">COBERTURA</th>
                    <th class="border" style="width: 20%">FECHA</th>
                    <th class="border" style="width: 10%">TOTAL</th>
                </tr>
            </thead>
            <tbody class="alto">
                @foreach ($ventas as $venta)
                    <tr> 
                        <td class=" align-top text-blue border-start border-bottom" style="width: 40%">{{$venta->namecliente. ' - '.$venta->tipodocumento. ': '.$venta->ndocumento}}</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 30%">{{$venta->cobertura->ubigeos->departamento.'/'.$venta->cobertura->ubigeos->provincia.'/'.$venta->cobertura->ubigeos->distrito}}</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 20%">{{$venta->fecha_hora}}</td>
                        <td class=" align-top text-blue border-start border-bottom border-end" style="width: 10%">{{$venta->total}}</td>
                    </tr>
                
                @endforeach
            </tbody>
            
        </table>
    </div>
    <br>
{{-- 
    <footer>
        Copyright &copy; <?php echo date("Y");?> 
    </footer> --}}

    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Cairo, sans-serif", "normal");
                $pdf->text(270, 820, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    	</script>
</body>
</html>






{{-- 
<body>
  
      
        <div class="container">
            @foreach ($ventas as $venta)
            <div class="row">
                <div class="card ">

                    <div class="card-body text-center">
        
                        <img src="{{ public_path("logos/".Auth::user()->propietario->empresas->logoempresa) }}" style="width: 12rem; height: 200px;" alt="...">
                        
                    
                        <h3 class="text-primary fw-bold mb-0"> {{ Auth::user()->propietario->empresas->razonsocial }}</h3>
                        <h3 class="text-primary fw-bold mb-0"> RUC: {{ Auth::user()->propietario->empresas->ruc }}</h3>
                        <h3 class="text-primary fw-bold mb-0"> Fecha: {{$venta->fecha_hora}}</h3>
        
                
                      
        
                        <p class="fw-bold lead border-bottom border-primary text-left">Datos del cliente</p>
        
        
                        
                        <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 ">Cliente:</th>
                                    <th class="h6 ">Tipo Identificación:</th>
                                    <th class="h6 ">Nro Identificación:</th>
                                    
                                </tr>
                            </thead>
                            
                                <tbody>
                                    
                                        <tr>
                                            <td class="alert alert-primary">{{$venta->namecliente}}</td>
                                            <td class="alert alert-primary">{{$venta->tipodocumento}}</td>
                                            <td class="alert alert-primary">{{$venta->ndocumento}}</td>
                                           
                                        </tr>
                                                                    
                                  
                                </tbody>  
                        </table>
        
                            
                        <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 ">Telefono:</th>
                                    <th class="h6 ">Cobertura:</th>
                                   
                                </tr>
                            </thead>
                                <tbody>
                                        <tr>
                                            <td class="alert alert-primary ">{{$venta->celular}}</td>
                                            <td class="alert alert-primary">{{$venta->cobertura->ubigeos->departamento.'/'.$venta->cobertura->ubigeos->provincia.'/'.$venta->cobertura->ubigeos->distrito}}</td>
                                           
                                        </tr>
                                                                    
                                </tbody>  
                        </table>
        
        
                           
        
                        <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 ">Dirección: </th>
                                    <th class="h6 ">Referencia:</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                        <tr>
                                            <td class="alert alert-primary">{{$venta->direccion}}</td>
                                            <td class="alert alert-primary">{{$venta->referencia}}</td>
                                           
                                        </tr>
                                                                    
                                </tbody>  
                        </table>
        
    
                             
                             <p class="fw-bold lead border-bottom border-primary text-left">Medidas:</p>
                        
                        <table id="tcompany" class="table table-bordered"" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6 "> Correo: </th>

                                   
                                </tr>
                            </thead>
                                <tbody>
                                        <tr>
                                            <td class="alert alert-primary">{{$venta->correo}}</td>
                                            
                                            
                                           
                                        </tr>
                                                                    
                                </tbody>  
                        </table>

        
                           
        
                        <table id="tcompany" class="table table-bordered" cellspacing="0" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th class="h6">Producto</th>
                                                <th class="h6">Cantidad</th>
                                                <th class="h6">Precio</th>
                                                <th class="h6">SubTotal</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                         @foreach($detalleventa as $detalle)
                                                <tr>
                                                    <td class="font-weight-light">{{$detalle->nameproducto}}</td>
                                                    <td class="font-weight-light">{{$detalle->cantidad}}</td>
                                                    <td class="font-weight-light">{{$detalle->precio}}</td>
                                                    <td class="font-weight-light">{{$detalle->cantidad*$detalle->precio}}</td>
                                                </tr>
                                                @endforeach
                                                                    
                                </tbody>  
                        </table>     
                           
                    </div>
                </div>
            </div>
            <div class="page_break"></div>
            @endforeach
        </div>

</body>
</html> --}}

