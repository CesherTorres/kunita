<!-- ####
-----------
Desarrollado por
Gilberto Alexander De La Cruz Saravia
-----------
#### -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kunaq | @yield('title')</title>
	  <link rel="stylesheet" href="/css/carrito.css">	
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.css">
    <link rel="icon" href="/images/logo-kunaq.png">
    <link rel="stylesheet" href="/sass/custom_store.css">
    <link rel="stylesheet" href="/css/main_store.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    @stack('styles')
    @yield('css')
    <link rel="stylesheet" href="/css/flexslider.css">
</head>
<body>
  <div class="">
    @yield('content')
</div>
    <!-- footer -->
    <footer class="bg-primary text-white pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row text-center  text-md-center">

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-secondary">Telefonos</h5>
                    <p class="text-white"><i class="bi bi-telephone-fill me-3"></i> 922 009 301</p>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-secondary">Correo</h5>
                    <p class="text-white"><i class="bi bi-envelope-fill me-3"></i> marleniureta@kunaq.org.pe</p>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-secondary">Dirección</h5>
                    <p class="text-white"><i class="bi bi-building me-3"></i> Direccion: Lima / Sector 1, grupo 9, Manzana I, Lote 24 - Villa el Salvador</p>
                </div>
            </div>

            <div class="text-center">
                <a class="btn btn-secondary rounded-circle text-white" href="https://www.facebook.com/KunaqYachay/" target="_bank" role="button"><i class="bi bi-facebook"></i></a>
                <a class="btn btn-secondary rounded-circle text-white" href="http://api.whatsapp.com/send?phone=+51922009301" target="_bank" role="button"><i class="bi bi-whatsapp"></i></a>
                <a class="btn btn-secondary rounded-circle text-white" href="https://www.instagram.com/kunaqyachay/" target="_bank" role="button"><i class="bi bi-instagram"></i></a>
                <a class="btn btn-secondary rounded-circle text-white" href="https://twitter.com/KunaqYachay" target="_bank" role="button"><i class="bi bi-twitter"></i></a>
            </div>

        </div>
        <hr class="mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h6 class="text-center text-md-start px-5">Copyright © <?php echo date("Y");?> <a href="https://kunaq.org.pe/" target="_bank" style="text-decoration: none;" class="text-secondary fw-bold">Kunaq</a> - Todos los derechos Reservados</h6>
                </div>
                <div class="col-12 col-md-6">
                    <h6 class="text-center text-md-end px-5">Desarrollado por <a href="https://cuanticagroup.com/" target="_bank" style="text-decoration: none;" class="text-secondary fw-bold">Cuantica Group</a> - <?php echo date("Y");?></h6>
                </div>
            </div>
        </div>
            
    </footer>
    <!-- fin footer -->

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/jquery.flexslider-min.js"></script>
	  <script src="/js/carrito.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/validacionesinput.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <!--    -->
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".productos-slider", {
        //   slidesPerView: 1,
        loop:true,
          spaceBetween: 45,
          navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
          breakpoints: {
            0: {
              slidesPerView: 1,
            //   spaceBetween: 20,
            },
            768: {
              slidesPerView: 2,
            //   spaceBetween: 40,
            },
            1024: {
              slidesPerView: 4,
            //  spaceBetween: 50,
            },
          },
        });
    </script>
      @stack('scripts')
      @yield('js')
</body>
</html>

