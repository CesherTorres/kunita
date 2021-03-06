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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kunaq | @yield('title')</title>
	{{-- carrito de compra --}}
	<link rel="stylesheet" href="/css/carrito.css">	
	{{-- fin carrito --}}

	<!-- <link rel="stylesheet" href="/css/image_zoom.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.css">
    @livewireStyles
    @stack('styles')
  {{--  --}}
	<!-- CSS only -->
    <link rel="icon" href="/images/logo-kunaq.png">
    <link rel="stylesheet" href="/sass/custom_store.css">
    <link rel="stylesheet" href="/css/main_store.css">
	<!-- <link rel="stylesheet" href="/css/image_zoom.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    @yield('css')
</head>
<body oncontextmenu= "return false">
  <div class="">
    @yield('content')
</div>
    <!-- footer -->
    <footer class="bg-light pt-3">
      <div class="container">
          <div class="row text-center text-md-start">
              <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                <img src="/images/kunaq-v.png" style="width:200px; height: 160px" alt="">  
              </div>

              <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                  <h5 class="text-uppercase mb-2 font-weight-bold text-secondary">REDES</h5>
                  <a href="https://www.facebook.com/KunaqYachay/" target="_bank" class="text-decoration-none text-dark">
                    <p>
                      <i class="bi bi-facebook me-2"></i>
                      Facebook
                    </p>
                  </a>
                  <a href="http://api.whatsapp.com/send?phone=+51922009301" target="_bank" class="text-decoration-none text-dark">
                    <p>
                      <i class="bi bi-whatsapp me-2"></i>
                      Whatsapp
                    </p>
                  </a>
                  <a href="https://www.instagram.com/kunaqyachay/" target="_bank" class="text-decoration-none text-dark">
                    <p>
                      <i class="bi bi-instagram me-2"></i>
                      Instagram
                    </p>
                  </a>
                  <a href="https://twitter.com/KunaqYachay" target="_bank" class="text-decoration-none text-dark">
                    <p class="mb-0">
                      <i class="bi bi-twitter me-2"></i>
                      Twitter
                    </p>
                  </a>
              </div>

              <div class="col-md-4 col-lg-4 col-xl-4 mt-3">
                  <h5 class="text-uppercase mb-2 fW-bold text-secondary">CONT??CTENOS</h5>
                  <p class="text-dark"><i class="bi bi-building me-3"></i> Direccion: Lima / Sector 1, grupo 9, Manzana I, Lote 24 - Villa el Salvador</p>
                  <p class="text-dark"><i class="bi bi-envelope-fill me-3"></i> marleniureta@kunaq.org.pe</p>
                  <p class="text-dark"><i class="bi bi-telephone-fill me-3"></i> 922 009 301</p>
              </div>
          </div>
      </div>
      <hr class="">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12 col-md-6">
                  <h6 class="text-center text-md-start px-5">Copyright ?? <?php echo date("Y");?> <a href="https://kunaq.org.pe/" target="_bank" style="text-decoration: none;" class="text-secondary fw-bold">Kunaq</a> - Todos los derechos Reservados</h6>
              </div>
              <div class="col-12 col-md-6">
                  <h6 class="text-center text-md-end px-5">Desarrollado por <a href="https://cuanticagroup.com/" target="_bank" style="text-decoration: none;" class="text-secondary fw-bold">Cuantica Group</a></h6>
              </div>
          </div>
      </div>
          
  </footer>
  <!-- fin footer -->
    {{-- carrito compra --}}
    <script src="/js/carrito.js"></script>
	{{-- fin --}}
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/validacionesinput.js"></script>
    <script src="/js/functions.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="/js/chosen.jquery.min.js"></script>

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
    <script  type="text/javascript">
  
        // var contador=[];
        // var operacion = [];
      function masfu(precio,cod,elemento,key,metodo){
          let cantidad;
          
          if(metodo=='sumar'){
            cantidad=Number(elemento.parent().find('.quantity').val())+1;
          }else{
            cantidad=Number(elemento.parent().find('.quantity').val())-1;
          }
          if(cantidad=='0'){
                cantidad=1;
            }
          
          let precios=cantidad*precio;
          contador[cod]=contador[cod]+1;  
          operacion[cod] = Number(precio) * Number(contador[cod]);
          operacion[cod]=Math.ceil(operacion[cod] * 100) / 100;
          suma = suma + Number(precio);
          suma=Math.floor(suma * 100) / 100;
          document.getElementById(cod).innerHTML = 'S/.'+precios;
          document.getElementById("tot").innerHTML = 'S/.'+String(suma);

           var data = {nuevaoferta:precios,quantity:cantidad,key:key,metodo:metodo};

           $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });

             $.post('{{ route('update.cart') }}', data , function(response) {
              
                 if (response) {
                      document.getElementById("subtot").innerHTML = 'S/.'+String(response.total);                     
                     console.log(response.total);
                     }

             }).fail(function(response) {


             });
       }
          
        
        
       
    </script>
    <!-- <script language="JavaScript" type="text/javascript">
     var ubi2 = 0;
     var ubi1 = 0;
     ubi2 = document.getElementById('ubigeo_nuevo').value;
    function cambio(){
    ubi1 = document.getElementById('ubigeo_cobertura').value;
   
 
   if(ubi1 == ubi2){
    document.getElementById('message').innerHTML ="Correcto";
    } else {
    document.getElementById('message').innerHTML ="Nada";
    }
   }
</script> -->

      @yield('js')
</body>
</html>

