<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kunaq | Reporte Empresa PDF</title>
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
    
    <div class="text-center mt-5">
        <span class="text-uppercase pt-2 text-center text-primary small fw-bold d-block">Datos de la empresa {{$company->propietario->empresas->razonsocial}}</span>
        <br>
        <table class="w-100">
            <tbody class="" style="font-size: 12px">
                <tr class="">
                    <td style="width: 30%" class="">
                        <img src="{{ public_path("logos/".$company->propietario->empresas->logoempresa) }}" class=" card-img" style="width:100; height:auto" alt="...">
                    </td>
                    <td style="width: 30%" class="">
                        <p class="fw-bold small mb-1">R.U.C.: <span class="fw-normal">{{$company->propietario->empresas->ruc}}</span></p>
                        <p class="fw-bold small mb-1">MARCA: <span class="fw-normal">{{$company->propietario->empresas->marca}}</span></p>
                        <p class="fw-bold small mb-1">GIRO: <span class="fw-normal">{{$company->propietario->empresas->giro->namegiros}}</span></p>
                        <p class="fw-bold small mb-1">NRO. CONTACTO: <span class="fw-normal">{{$company->propietario->empresas->telefonoempresa}}</span></p>
                    </td>
                    <td style="width: 40%" class="">
                        <p class="fw-bold small mb-1">CORREO: <span class="fw-normal">{{$company->propietario->empresas->correoempresa}}</span></p>
                        <p class="fw-bold small mb-1">DIRECCIÓN: <span class="fw-normal">{{$company->propietario->empresas->direccion}}</span></p>
                        <p class="fw-bold small mb-1">D.P.D.: <span class="fw-normal">{{$company->propietario->empresas->ubigeo->departamento.'/'.$company->propietario->empresas->ubigeo->provincia.'/'.$company->propietario->empresas->ubigeo->distrito}}</span></p>
                        <p class="fw-bold small mb-1">ESTADO: <span class="fw-normal">{{$company->propietario->empresas->estadoemp}}</span></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="mb-0 text-start small text-dark text-uppercase mt-3" style="font-size: 10px">Descripción</p>
        <table class="w-100">
            <tbody class="" style="font-size: 12px">
                <tr class="">
                    <td style="width: 100%" class="">
                        <span class="fw-normal">{{$company->propietario->empresas->descripcion}}</span>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="mb-0 text-start small fw-bold text-primary text-uppercase mt-3 mb-2" style="font-size: 10px">Métodos de pago</p>
        <table class="w-100 border mb-3">
            <thead style="font-size: 11px">
                <tr class="text-center">
                    <th class="border" style="width: 50%">TRANSFERENCIA BANCARIA</th>
                    <th class="border" style="width: 50%">BILLETERA DIGITAL</th>
                </tr>
            </thead>
            <tbody style="font-size: 12px" class="border">
                <tr class="border">
                    <td style="width: 50%" class="border">
                        <p class="fw-bold small mb-1">ENTIDAD BANCARIA: <span class="fw-normal">{{$company->propietario->empresas->cuentabanco}}</span></p>
                        <p class="fw-bold small mb-1">NRO: <span class="fw-normal">{{$company->propietario->empresas->ncuentabanco}}</span></p>
                        <p class="fw-bold small mb-1">CCI: <span class="fw-normal">{{$company->propietario->empresas->ncuentabancocci}}</span></p>
                    </td>
                    <td style="width: 50%" class="border">
                        <p class="fw-bold small mb-1">BILLETERA: <span class="fw-normal">{{$company->propietario->empresas->billeteradigital}}</span></p>
                        <p class="fw-bold small mb-1">NRO: <span class="fw-normal">{{$company->propietario->empresas->numerobilletera}}</span></p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="mb-0 text-start small fw-bold text-primary text-uppercase mt-3 mb-2" style="font-size: 10px">Redes sociales</p>
        <table class="w-100  mb-3">
            <tbody style="font-size: 12px" class="">
                <tr class="">
                    <td style="width: 100%" class="">
                        <p class="fw-bold small mb-1">FACEBOOK: <span class="fw-normal">{{$company->propietario->empresas->enlacefacebook}}</span></p>
                        <p class="fw-bold small mb-1">INSTAGRAM: <span class="fw-normal">{{$company->propietario->empresas->enlaceinstagram}}</span></p>
                        <p class="fw-bold small mb-1">WHATSAPP: <span class="fw-normal">{{$company->propietario->empresas->enlacewhatsapp}}</span><p>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="mb-0 text-start small fw-bold text-primary text-uppercase mt-3 mb-2" style="font-size: 10px">Datos del propietario</p>
        <table class="w-100">
            <tbody class="" style="font-size: 12px">
                <tr class="">
                    <td style="width: 50%" class="">
                        <p class="fw-bold small mb-1">NOMBRE: <span class="fw-normal">{{$company->name}}</span></p>
                        <p class="fw-bold small mb-1">IDENTIFICACIÓN: <span class="fw-normal">{{$company->tipodocumento. ': '.$company->ndocumento}}</span></p>
                        <p class="fw-bold small mb-1">NRO. CONTACTO: <span class="fw-normal">{{$company->telefono}}</span></p>
                    </td>
                    <td style="width: 50%" class="">
                        <p class="fw-bold small mb-1">CORREO: <span class="fw-normal">{{$company->email}}</span></p>
                        <p class="fw-bold small mb-1">DIRECCIÓN: <span class="fw-normal">{{$company->direccion}}</span></p>
                        <p class="fw-bold small mb-1">ESTADO: <span class="fw-normal">{{$company->estadouser}}</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
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
</body>
</html>