<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kunaq | Reporte Producto PDF</title>
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

    <table class="w-100 text-center">
        <tr>
            <td style="width: 25%">
                
            </td>
            
            <td style="width: 40%">
                <span class="text-uppercase fs-6 text-center fw-bold d-block">{{$producto->empresa->razonsocial }}</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 10px">{{ $producto->empresa->direccion }}</p>
                <span class="fw-light fst-italic d-block" style="font-size: 10px">{{ $producto->empresa->telefonoempresa }}</span>
            </td>
            <td style="width: 35%">
                <img src="{{ public_path("logos/".$producto->empresa->logoempresa) }}" class=" card-img" style="width: auto; height:85px" alt="...">
            </td>
            
        </tr>
    </table>

    <div class="text-center">
        
        <span class="text-uppercase my-2 text-start text-dark small fw-bold d-block">Producto: <span class="text-primary">{{$producto->nameproducto}}</span></span>

        <table class="w-100 mb-2">
            <tbody style="font-size: 12px">
                <tr>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">MARCA: <span class="fw-normal">{{$producto->marca}}</span></p>
                    </td>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">MODELO: <span class="fw-normal">{{$producto->modelo}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">CATEGORÍA: <span class="fw-normal">{{$producto->subcategoria->categoria->namecategoria.'/'.$producto->subcategoria->namesubcategoria}}</span></p>
                    </td>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">GENERO: <span class="fw-normal">{{$producto->genero}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">PRECIO: <span class="fw-normal">{{$producto->preciosugerido}}</span></p>
                    </td>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">TEMPERATURA: <span class="fw-normal">{{$producto->temperatura}}</span></p>
                    </td>
                </tr>

                <tr>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">STOCK: <span class="fw-bold text-primary">{{$producto->stock}}</span></p>
                    </td>
                    <td style="width: 50%" class="">
                        
                    </td>
                </tr>
                
            </tbody>
        </table>

        <p class="text-muted mb-0 text-start small text-uppercase" style="font-size: 10px">Medidas:</p>
        <table class="w-100 mb-2">
            <tbody style="font-size: 12px">
                <tr class="border">
                    <td style="width: 25%" class="">
                        <p class="fw-bold small">ALTO: <span class="fw-normal">{{$producto->alto}}</span></p>
                    </td>
                    <td style="width: 25%" class="">
                        <p class="fw-bold small">ANCHO: <span class="fw-normal">{{$producto->ancho}}</span></p>
                    </td>
                    <td style="width: 25%" class="">
                        <p class="fw-bold small">PROFUNDIDAD: <span class="fw-normal">{{$producto->profundidad}}</span></p>
                    </td>
                    <td style="width: 25%" class="">
                        <p class="fw-bold small">PESO: <span class="fw-normal">{{$producto->peso}}</span></p>
                    </td>
                </tr>
            </tbody>
        </table>

        
        <table class="w-100">
            <tbody>
                <tr>
                    <td style="width: 25%" class="">
                        <img src="{{ public_path("images_product/".$producto->imgprincipal) }}" class=" card-img" style="width:168px; height:168px" alt="...">
                    </td>
                    <td style="width: 25%" class="">
                        <img src="{{ public_path("images_product/".$producto->imguno) }}" class=" card-img" style="width:168px; height:168px" alt="...">
                    </td>
                    <td style="width: 25%" class="">
                        <img src="{{ public_path("images_product/".$producto->imgdos) }}" class=" card-img" style="width:168px; height:168px" alt="...">
                    </td>
                    <td style="width: 25%" class="">
                        <img src="{{ public_path("images_product/".$producto->imgtres) }}" class=" card-img" style="width:168px; height:168px" alt="...">
                    </td>
                </tr>
            </tbody>
        </table>
        
        <table class="w-100 my-2">
            <tbody style="font-size: 12px">
                <tr>
                    <td>
                        <p class="fw-bold small mb-2">DESCRIPCIÓN:</p>
                        <span class="fw-normal">
                            {{$producto->descripcion}}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="w-100 mb-2">
            <tbody style="font-size: 12px">
                <tr>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">OFERTA: <span class="fw-bold text-success">{{$producto->oferta}}%</span></p>
                    </td>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small">FECHA DE TÉRMINO: <span class="fw-bold text-success">{{$producto->fecha_vencimiento}}</span></p>
                    </td>
                </tr>
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

