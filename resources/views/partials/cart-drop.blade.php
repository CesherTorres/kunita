@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="row mx-1" align="center">
                <div class="col-3">
                    <img src="/public/images_product/{{ $item->attributes->imgprincipal }}"
                         style="width: 80px; height: 80px;">
                </div>
                <div class="col-4 my-3">
                    <b>{{$item->name}}</b>
                    <br><small class="text-muted fw-light">Cantidad: {{$item->quantity}}</small>
                </div>
                <div class="col-5 my-2">
                    <div class="row">
                        <div class="col-9 mt-3">
                        <p class="fw-normal fs-4">S/. {{ \Cart::get($item->id)->getPriceSum() }}</p>
                        </div>
                        <div class="col-md-3 mt-3">
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @method('DELETE')
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-sm fw-bold rounded-circle"><i class="bi bi-x"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
        <li class="list-group-item">
            <div class="text-center">
                <h4 class="fw-light">TOTAL: <span class="fw-bold">S/. {{ \Cart::getTotal() }}</span></h4> 
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-6">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="d-grid gap-2">
                            <button class="btn btn-dark ">
                                Vaciar <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary" href="{{ route('compra.carrito') }}">
                            Verificar <i class="bi bi-arrow-up-right-square"></i>
                        </a>
                    </div>
                </div>
            </div>   
        </li>
@else
    <li class="list-group-item"><p class="text-center fw-light lead mt-2">Tu carrito esta vacío</p></li>
@endif