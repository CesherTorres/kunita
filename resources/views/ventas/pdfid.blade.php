
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kunaq | Comprobante de Pedido</title>
    <link rel="icon" href=" {{ public_path("images/logo-kunaq.png") }} ">
    {{-- <link rel="stylesheet" href="/sass/custom.css"> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/css/main.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- @yield('css') --}}

</head>

<style>
    @font-face {
      font-family: 'Cairo';
      font-style: normal;
      font-weight: 300;
      src: local('Cairo'), local('Cairo'), url(https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700&display=swap) format('truetype');
    }
    body{
        font-family: Cairo, sans-serif !important;
        
    }

    .text-primary{
        color: #0069AA !important;
    }

    .bg-primary{
        background-color: #0069AA !important;
    }

    .border-primary{
        border-color: #0069AA !important;
    }
    #cabecera{
        text-align: center;
    }


</style>
<body>
    <table class="w-100 text-center">
        <tr>
            @php 
                $empresa = \App\Models\Empresa::find($venta->empresa_id);
            @endphp
            <td style="width: 25%">
                <img src="{{ public_path("logos/".Auth::user()->propietario->empresas->logoempresa) }}" class="card-img" style="height:85px;" alt="...">
            </td>
            <td style="width: 40%">
                <span class="text-uppercase fs-5 text-center fw-bold d-block">{{ Auth::user()->propietario->empresas->razonsocial }}</span>
                <p class="fw-light fst-italic mb-0" style="font-size: 12px">{{ Auth::user()->propietario->empresas->direccion }}</p>
                <span class="fw-light fst-italic d-block" style="font-size: 12px">{{ Auth::user()->propietario->empresas->telefonoempresa }}</span>
            </td>
            <td style="width: 34%; font-size: 13px; border: 1px solid #0069AA;">
                <div class="bg-primary float-center" style="font-size: 16px; margin-top:-10px;">
                    <span class="text-uppercase text-white fw-bold py-1">Comprobante de Pedido</span>
                </div>
                <p class="text-uppercase my-2" style="font-size: 22px;">RUC - {{$venta->empresa->ruc}}</p>
            </td>
        </tr>
    </table>
    <br>
    <p class="text-dark mb-0 text-start small text-uppercase" style="font-size: 10px">Datos del cliente:</p>
    <table class="w-100 border mb-3" style="font-size: 11px">
        <tr>
            <td style="width: 48%; width: 30%; padding: 10px 10px 10px 10px;">
                <div class="clearfix">
                    <span class="fw-bold">CLIENTE:</span>
                    <span class="fw-normal float-end">{{$venta->namecliente}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">TIPO DE IDENTIFICACION:</span>
                    <span class="fw-normal float-end">{{$venta->tipodocumento}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">N° DE IDENTIFICACION:</span>
                    <span class="fw-normal float-end">{{$venta->ndocumento}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold">TELEFONO:</span>
                    <span class="fw-normal float-end">{{$venta->celular}}</span>
                </div>
            </td>
            <td style="width: 4%">
                
            </td>
            <td style="width: 48%; width: 30%; padding: 10px 10px 10px 10px;" class="float-end">
                <div class="clearfix">
                    <span class="fw-bold ">COBERTURA:</span>
                    <span class="fw-normal float-end">{{$venta->cobertura->ubigeos->departamento.'/'.$venta->cobertura->ubigeos->provincia.'/'.$venta->cobertura->ubigeos->distrito}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">DIRECCION:</span>
                    <span class="fw-normal float-end">{{$venta->direccion}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">REFERENCIA:</span>
                    <span class="fw-normal float-end">{{$venta->referencia}}</span>
                </div>
                <div class="clearfix">
                    <span class="fw-bold ">CORREO:</span>
                    <span class="fw-normal float-end">{{$venta->correo}}</span>
                </div>
            </td>
        </tr>
        
    </table>
    
    <p class="text-dark mb-0 text-start small text-uppercase" style="font-size: 10px">Métodos de pago</p>
    <table class="w-100 border mb-3">
        <thead style="font-size: 12px">
            <tr class="text-center">
                <th class="border" style="width: 50%">TRANSFERENCIA BANCARIA</th>
                <th class="border" style="width: 50%">BILLETERA DIGITAL</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px" class="border">
            <tr class="border">
                <td style="width: 50%" class="border">
                    <p class="fw-bold small mb-1">ENTIDAD BANCARIA: <span class="fw-normal">{{$venta->empresa->cuentabanco}}</span></p>
                    <p class="fw-bold small mb-1">NRO: <span class="fw-normal">{{$venta->empresa->ncuentabanco}}</span></p>
                    <p class="fw-bold small mb-1">CCI: <span class="fw-normal">{{$venta->empresa->ncuentabancocci}}</span></p>
                </td>
                <td style="width: 50%" class="border">
                    <p class="fw-bold small mb-1">BILLETERA: <span class="fw-normal">{{$venta->empresa->billeteradigital}}</span></p>
                    <p class="fw-bold small mb-1">NRO: <span class="fw-normal">{{$venta->empresa->numerobilletera}}</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <table class="w-100 border" style="font-size: 13px; ">
        <thead>
            <tr class="text-center">
                <th class="border" style="width: 3%">N°</th>
                <th class="border" style="width: 50%">PRODUCTO</th>
                <th class="border" style="width: 10%">CANTIDAD</th>
                <th class="border" style="width: 10%">PRECIO</th>
                <th class="border" style="width: 10%">SUBTOTAL</th>
            </tr>
        </thead>
        <tbody class="alto text-center" style="font-size: 13px;">
            @php
             $contador=1;   
            @endphp
            @foreach($detalleventa as $ventas)
                <tr> 
                    <td class=" align-top border-start" style="width: 3%">{{$contador}}</td>
                    <td class=" align-top border-start" style="width: 50%">{{$ventas->nameproducto}}</td>
                    <td class=" align-top border-start" style="width: 10%">{{$ventas->cantidad}}</td>
                    <td class=" align-top border-start" style="width: 10%">{{$ventas->precio}}</td>
                    <td class=" align-top border-start" style="width: 10%">{{$ventas->cantidad * $ventas->precio}}</td>
                </tr>
                @php
                    $contador++;
                @endphp
            @endforeach
            <tr>
                <td class=" align-top border-start" style="height: 200px"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
                <td class=" align-top border-start"></td>
            </tr>
        </tbody>
        
    </table>
    <table class="w-100 py-3" style="font-size: 13px;">
        <tbody>
            <tr> 
                <td style="width: 50%"></td>
                <td class="border" style="width: 30%">OPERACIONES GRAVADAS:</td>
                <td class="border" style="width: 20%">
                    <div class="clearfix">
                        <span>S/.</span>
                        <span class="float-end">{{$venta->total}}</span>
                    </div>
                    
                </td>
            </tr>
            
            <tr> 
                <td style="width: 50%"></td>
                <td class="border" style="width: 30%">COSTO DE ENVIO:</td>
                <td class="border" style="width: 20%">
                    <div class="clearfix">
                        <span>S/.</span>
                        <span class="float-end">{{$venta->cobertura->precioenvio}}</span>
                    </div>
                </td>
            </tr>
            <tr> 
                <td style="width: 50%"></td>
                <td class="border" style="width: 30%">TOTAL A PAGAR:</td>
                <td class="border" style="width: 20%">
                    <div class="clearfix">
                        <span>S/.</span>
                        <span class="float-end">{{$venta->total+$venta->cobertura->precioenvio}}</span>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>    
</body>
</html>