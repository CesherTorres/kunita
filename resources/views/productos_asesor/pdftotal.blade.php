<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kunaq | Reporte de Productos PDF</title>
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
    .text-primary{
        color: #0069AA !important;
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
                    <span class="text-uppercase fs-6 fw-bold align-middle"><img src="{{ public_path('images/LOGO.png') }}" class="p-3 shadow bg-white" style="height:31.3px" alt="..."> Kunaq - Generando valor</span>
                </div>
                <div class="float-end">
                    <span class="text-uppercase fs-6 float-end align-middle fw-bold pt-3">{{$now->format('Y-m-d')}}</span>
                </div>
               
                
            </div>
        </div>
    </header>

    <div class="text-center mt-3">
        
        <span class="text-uppercase pt-2 text-center text-primary small fw-bold d-block">Reporte Total de productos</span>
        <br>
        <table class="w-100" style="font-size: 10px; ">
            <thead>
                <tr>
                    <th class="border" style="width: 30%">PRODUCTO</th>
                    <th class="border" style="width: 20%">CATEGORÍA</th>
                    <th class="border" style="width: 10%">MARCA</th>
                    <th class="border" style="width: 10%">PRECIO</th>
                    <th class="border" style="width: 10%">STOCK</th>
                    <th class="border" style="width: 10%">OFERTA</th>
                    <th class="border" style="width: 20%">F. TÉRMINO</th>
                    <th class="border" style="width: 20%">EMPRESA</th>
                </tr>
            </thead> 
            <tbody class="alto">
                @foreach ($productos as $producto)
                    <tr> 
                        <td class=" align-top text-blue border-start border-bottom" style="width: 30%">{{$producto->nameproducto}}</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 20%">{{$producto->namecategoria.'/'.$producto->namesubcategoria}}</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 10%">{{$producto->marca}}</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 10%">{{$producto->preciosugerido}}</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 10%">{{$producto->stock}}</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 10%">{{$producto->oferta}}%</td>
                        <td class=" align-top text-blue border-start border-bottom" style="width: 20%">{{$producto->fecha_vencimiento}}</td>
                        <td class=" align-top text-blue border-start border-bottom border-end" style="width: 20%">{{$producto->razonsocial}}</td>
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
