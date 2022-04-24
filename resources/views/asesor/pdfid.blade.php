<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kunaq | Reporte Asesor PDF</title>
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
        /* background-image: url({{ public_path('/images/bg-asesor.png') }}); */
    }

    .content{
        margin-top: 0.8cm;
        margin-left: 0.4cm;
        margin-right: 0.4cm;
        margin-bottom: 0.8cm;
    }

    header {
        font-family: Cairo, sans-serif !important;
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 0.8cm;
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

    .page_break {
  page-break-before: always;
}


</style>
<body>
    <div class="content">
        <header>
            <div class="container">
                <div class="clearfix">
                    <div class="text-center">
                        <img src="{{ public_path('images/LOGO.png') }}" class="p-1 shadow bg-white" style="height:25px" alt="...">
                    </div>
                </div>
            </div>
        </header>
        
        <div class="text-center">
            <table class="w-100">
                <tbody class="" style="font-size: 12px">
                    <tr class="">
                        <td style="width: 100%" class="">
                            <div class="text-center mt-4">
                                <img src="{{ public_path("userAsesor/".$asesor->fotouser) }}" class="rounded rounded-fill border border-primary" style="width:80px; height:80px" alt="...">                
                            </div>            
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-2">
                <h3 class="text-primary" style="font-size: 13px">{{$asesor->name}}</h3>
                <p class="text-muted text-uppercase " style="font-size: 8px">{{$asesor->tipodocumento. ': '.$asesor->ndocumento}}</p>
                <span class="badge bg-primary rounded text-uppercase">{{$asesor->tipousuario->name_tipo_usuario}}</span>
            </div>
        </div>

        <div class="page_break"></div>

        <div class="mt-2" style="font-size: 7px">
            <span class="text-uppercase fw-bold">Nro. Contacto</span>
            <p>{{$asesor->telefono}}</p>

            <span class="text-uppercase fw-bold">Dirección</span>
            <p>{{$asesor->direccion}}</p>

            <span class="text-uppercase fw-bold">Departamento/provincia/distrito</span>
            <p>{{$asesor->ubigeo->distrito.'/'.$asesor->ubigeo->provincia.'/'.$asesor->ubigeo->departamento}}</p>

            <span class="text-uppercase fw-bold">Correo electrónico</span>
            <p>{{$asesor->email}}</p>

            <span class="text-uppercase fw-bold">Estado</span>
            <p>{{$asesor->estadouser}}</p>
        </div>
    
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
    </div>
</body>
</html>

