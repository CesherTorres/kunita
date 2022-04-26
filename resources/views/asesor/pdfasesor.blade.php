<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kunaq | Reporte de Asesores PDF</title>
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

    <div class="text-center my-2">
        
        <span class="text-uppercase my-2 text-center text-primary small fw-bold d-block">Reporte Total de Asesores</span>

        <table class="w-100">
            @foreach ($asesores as $asesor)
                <tbody class="border-bottom" style="font-size: 12px">
                    <tr>
                        <td style="width: 20%" class="">
                            <img src="{{ public_path("userAsesor/".$asesor->fotouser) }}" class=" card-img rounded rounded-fill border my-2 border-primary" style="width:100px; height:100px" alt="...">
                        </td>
                        <td style="width: 40%" class="">
                            <p class="fw-bold small mb-1">NOMBRE: <span class="fw-normal">{{$asesor->name}}</span></p>
                            <p class="fw-bold small mb-1">IDENTIFICACIÓN: <span class="fw-normal">{{$asesor->tipodocumento. ': '.$asesor->ndocumento}}</span></p>
                            <p class="fw-bold small mb-1">NRO. CONTACTO: <span class="fw-normal">{{$asesor->telefono}}</span></p>
                            <p class="fw-bold small mb-1">ESTADO: <span class="fw-normal">{{$asesor->estadouser}}</span></p>
                        </td>
                        <td style="width: 40%" class="">
                            <p class="fw-bold small mb-1">CORREO: <span class="fw-normal">{{$asesor->email}}</span></p>
                            <p class="fw-bold small mb-1">DIRECCIÓN: <span class="fw-normal">{{$asesor->direccion}}</span></p>
                            <p class="fw-bold small mb-1">D.P.D.: <span class="fw-normal">{{$asesor->ubigeo->distrito.'/'.$asesor->ubigeo->provincia.'/'.$asesor->ubigeo->departamento}}</span></p>
                            <p class="fw-bold small mb-1"><span class="fw-normal">-</span></p>
                        </td>
                    </tr>
                </tbody>
            @endforeach
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