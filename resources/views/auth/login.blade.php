<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>login</title>
    <link rel="icon" href="/images/logo-kunaq.png">
    <link rel="stylesheet" href="sass/custom.css">
    <link rel="stylesheet" href="css/main_store.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>
<body>
    <section>
        <div class="row g-0">
            <div class="col-lg-4 d-flex flex-column align-items-end min-vh-100">
                <div class="text-center pt-lg-5 pb-lg-3 p-4 w-100  align-self-center">
                    <a 
                    @auth
                        @if( Auth::user()->tipousuario_id == 1 )
                            href="{{url('administrador')}}"
                        @elseif(Auth::user()->tipousuario_id == 2)
                            href="{{url('asesores')}}"
                        @elseif(Auth::user()->tipousuario_id == 3)
                            href="{{url('pyme')}}"
                        @endif
                    @endauth
                    >
                        <img src="images/LOGO.png" class="img-fluid logo" alt="">
                    </a>
                </div>
                <div class="text-center text-primary py-lg-4 p-4 w-100 align-self-center">
                    <h3 class="fw-bold mb-4">Ingresa a tu cuenta</h3>
                    <form method="POST" action="{{ route('login') }}">
                     @csrf
                        <div class="mb-4 text-start">
                            <label for="email" class="form-label text-dark fw-bold">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 text-start">
                            <label for="password" class="form-label text-dark fw-bold">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <a href="#" id="emailHelp" class="form-text text-muted text-decoration-none">
                                ¿Has olvidado tu contraseña?</a>
                                
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                        </div>
                    </form>
                    

                        <div class="text-center pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                            <p class="fw-bold mt-5 text-center text-muted">¿Tienes un negocio? - Únete a nosotros</p>
                        <div class="d-grid gap-2">
                        <a href="{{ url('/nueva_empresa/create') }}" type="button" class=" fw-bold">Registrarme</a>
                    </div>
                      </div>
                      
                    

                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active min-vh-100 img-1">
                        <!-- <img src="img-pymes/pyme-1.jpg" class="d-block w-100" alt="..."> -->
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Tienda en linea</h5>
                            <p>Publica tus productos en nuestra marketplace y vende más</p>
                        </div>
                      </div>
                      <div class="carousel-item min-vh-100 img-2">
                        <!-- <img src="img-pymes/pymes-2.jpg" class="d-block w-100" alt="..."> -->
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Haz seguimiento de tus balances</h5>
                          <p>Obtén reportes en tiempo real para tomar mejores decisiones</p>
                        </div>
                      </div>
                      <div class="carousel-item min-vh-100 img-3">
                        <!-- <img src="img-pymes/pymes-3.jpg" class="d-block w-100" alt="..."> -->
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Desde cualquier dispositivo</h5>
                          <p>Accede a la información de tu negocio y ten el control de los procesos</p>
                        </div>
                      </div>
                    </div>
                    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button> --}}
                  </div>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<!--sweet alert agregar-->
    @if(session('addempresapyme') == 'ok')
        <script>
           Swal.fire(
			'Registro exitoso!',
			'Su empresa a sido registrada, su asesor asignado se comunicará con usted a la brevedad posible para la activación de su cuenta',
			'success'
			)
        </script>
    @endif
</body>
</html>


{{-- @extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
