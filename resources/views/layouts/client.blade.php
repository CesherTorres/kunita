<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from nouthemes.net/html/farmart/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 20:34:40 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.png" rel="icon">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Farmart - Html Template</title>
    <link rel="icon" href="/images/logo-kunaq.png">
	<!-- <link rel="stylesheet" href="/css/image_zoom.css"> -->
    @yield('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="farmart/fonts/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/gh/Dogfalo/materialize%40master/extras/noUiSlider/nouislider.css">
    <link rel="stylesheet" href="farmart/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="farmart/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="farmart/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="farmart/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="farmart/plugins/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="farmart/plugins/slick/slick.css">
    <link rel="stylesheet" href="farmart/plugins/lightGallery/dist/css/lightgallery.min.css">
    <link rel="stylesheet" href="farmart/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.css">
    @livewireStyles
    @stack('styles')
</head>

<body>
    <header class="header">
        <div class="ps-top-bar">
            <div class="container">
                <div class="top-bar">
                    <div class="top-bar__right">
                        <ul class="nav-top">
                            <li class="nav-top-item contact"><a class="nav-top-link" href="tel:970978-6290"> <i class="icon-telephone"></i><span>KUNAQ:</span><span class="text-success font-bold">970 978-6290</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-header--center header--mobile">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__left">
                        <button class="navbar-toggler"><i class="icon-menu"></i></button>
                    </div>
                    <div class="header-inner__center"><img src="images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 8rem;"></div>
                    <div class="header-inner__right">
                        <button class="button-icon icon-sm search-mobile"><i class="icon-magnifier"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <section class="ps-header--center header-desktop">
            <div class="container">
                <div class="header-inner">
                    <div class="header-inner__left"><img src="images/LOGO.png" alt="Logo" class="me-5 my-1" style="width: 20rem;"></a>
                        <a class="button-icon icon-md" href="{{ url('/store') }}" style="margin-left:4px"><i class="bi bi-house h1"></i></a>
                    </div>
                    <div class="header-inner__center">
                        <div class="input-group">
                            <input class="form-control input-search" placeholder="BUSCA TUS PRODUCTOS...">
                            <div class="input-group-append">
                                <button class="btn">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="header-inner__right">
                        <a class="button-icon icon-md" href="{{ url('/store') }}">Inicio</a>
                        <a class="button-icon icon-md" href="{{ url('/empresas-asociadas') }}">Empresas</a><a class="button-icon icon-md" href="wishlist.html"><i class="bi bi-person"></i><span class="badge bg-warning"></span></a>
                        <div class="button-icon btn-cart-header"><a href="{{url('/carritoIndex')}}"><i class="icon-cart icon-shop5"></i><span class="badge bg-warning">3</span></a>
                            <div class="mini-cart">
                                <div class="mini-cart--content">
                                    <div class="mini-cart--overlay"></div>
                                    <div class="mini-cart--slidebar cart--box">
                                        <div class="mini-cart__header">
                                            <div class="cart-header-title">
                                                <h5>Shopping Cart(3)</h5><a class="close-cart" href="javascript:void(0);"><i class="icon-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="mini-cart__products">
                                            <div class="out-box-cart">
                                                <div class="triangle-box">
                                                    <div class="triangle"></div>
                                                </div>
                                            </div>
                                            <ul class="list-cart">
                                                <li class="cart-item">
                                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme Budweiser Light Can</a>
                                                            <p class="ps-product__unit">500g</p>
                                                            <p class="ps-product__meta"> <span class="ps-product__price">$3.90</span><span class="ps-product__quantity">(x1)</span>
                                                            </p>
                                                        </div>
                                                        <div class="ps-product__remove"><i class="icon-trash2"></i></div>
                                                    </div>
                                                </li>
                                                <li class="cart-item">
                                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_31a.jpg" alt="alt" /></a>
                                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Honest Organic Still Lemonade</a>
                                                            <p class="ps-product__unit">100g</p>
                                                            <p class="ps-product__meta"> <span class="ps-product__price-sale">$5.99</span><span class="ps-product__is-sale">$8.99</span><span class="quantity">(x1)</span>
                                                            </p>
                                                        </div>
                                                        <div class="ps-product__remove"><i class="icon-trash2"></i></div>
                                                    </div>
                                                </li>
                                                <li class="cart-item">
                                                    <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                                                        <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Matures Own 100% Wheat</a>
                                                            <p class="ps-product__unit">1.5L</p>
                                                            <p class="ps-product__meta"> <span class="ps-product__price">$12.90</span><span class="ps-product__quantity">(x1)</span>
                                                            </p>
                                                        </div>
                                                        <div class="ps-product__remove"><i class="icon-trash2"></i></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mini-cart__footer row">
                                            <div class="col-6 title">TOTAL</div>
                                            <div class="col-6 text-right total">$29.98</div>
                                            <div class="col-12 d-flex"><a class="view-cart" href="shopping-cart.html">View cart</a><a class="checkout" href="checkout.html">Checkout</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <nav class="navigation">
            <div class="container">
                <ul class="menu">
                <p></p>
                </ul>
            </div>
        </nav>
        <div class="mobile-search--slidebar">
            <div class="mobile-search--content">
                <div class="mobile-search__header">
                    <div class="mobile-search-box">
                        <div class="input-group">
                            <input class="form-control" placeholder="I'm shopping for..." id="inputSearchMobile">
                            <div class="input-group-append">
                                <button class="btn"> <i class="icon-magnifier"></i></button>
                            </div>
                        </div>
                        <button class="cancel-search"><i class="icon-cross"></i></button>
                    </div>
                </div>
                <div class="mobile-search__history">
                    <h5> <i class="icon-history2"></i>History<a href="javascript:void(0);">Clear all</a></h5>
                    <div class="history-content">
                        <ul class="history-list">
                            <li class="history-item"><a class="history-link" href="javascript:void(0);"> <span>apple</span><i class="icon-cross2"></i></a></li>
                            <li class="history-item"><a class="history-link" href="javascript:void(0);"> <span>organic fruit</span><i class="icon-cross2"></i></a></li>
                            <li class="history-item"><a class="history-link" href="javascript:void(0);"> <span>meat beef</span><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="mobile-search__result">
                    <h5> <span class="number-result">5</span>search result</h5>
                    <ul class="list-result">
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_18a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html"><u>Organic</u> Large Green Bell Pepper</a>
                                    <p class="ps-product__rating">
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3" selected="selected">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select><span>(5)</span>
                                    </p>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$6.90</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_16a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Avocado <u>Organic</u> Hass Large</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$12.90</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_32a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Tailgater Ham <u>Organic</u> Sandwich</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$33.49</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_6a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                    <p class="ps-product__rating">
                                        <select class="rating-stars">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4" selected="selected">4</option>
                                            <option value="5">5</option>
                                        </select><span>(16)</span>
                                    </p>
                                    <p class="ps-product__meta"> <span class="ps-product__price-sale">$4.99</span><span class="ps-product__is-sale">$8.99</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="cart-item">
                            <div class="ps-product--mini-cart"><a href="product-default.html"><img class="ps-product__thumbnail" src="farmart/img/products/01-Fresh/01_22a.jpg" alt="alt" /></a>
                                <div class="ps-product__content"><a class="ps-product__name" href="product-default.html">Extreme <u>Organic</u> Light Can</a>
                                    <p class="ps-product__meta"> <span class="ps-product__price">$12.99</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main class="no-main">
        @yield('content')
    </main>
     <footer class="bg-primary text-white pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row text-center  text-md-center">

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-secondary">Telefonos</h5>
                    <p class="text-white"><i class="bi bi-telephone-fill me-3"></i> 05623454 - 987798345 - 987723645</p>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-secondary">Correo</h5>
                    <p class="text-white"><i class="bi bi-envelope-fill me-3"></i> help@kunaq.com</p>
                </div>

                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 font-weight-bold text-secondary">Dirección</h5>
                    <p class="text-white"><i class="bi bi-building me-3"></i> Direccion: Lima / san isidro 324</p>
                </div>
            </div>

            <div class="text-center">
                <a class="btn btn-secondary rounded-circle text-white" href="#" role="button"><i class="bi bi-facebook"></i></a>
                <a class="btn btn-secondary rounded-circle text-white" href="#" role="button"><i class="bi bi-whatsapp"></i></a>
                <a class="btn btn-secondary rounded-circle text-white" href="#" role="button"><i class="bi bi-instagram"></i></a>
                <a class="btn btn-secondary rounded-circle text-white" href="#" role="button"><i class="bi bi-twitter"></i></a>
            </div>

        </div>
        <hr class="mb-4">
            <h6 class="text-center px-5">Copyright © 2021 <a href="#" style="text-decoration: none;" class="text-secondary fw-bold">Kunaq</a> - Todos los derechos Reservados</h6>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

	{{-- fin --}}
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
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

      @yield('js')
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="farmart/plugins/jquery.min.js"></script>
    <script src="farmart/plugins/popper.min.js"></script>
    <script src="farmart/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="farmart/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="farmart/plugins/jquery.matchHeight-min.js"></script>
    <script src="farmart/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="farmart/plugins/select2/dist/js/select2.min.js"></script>
    <script src="farmart/plugins/slick/slick.js"></script>
    <script src="farmart/plugins/lightGallery/dist/js/lightgallery-all.min.js"></script>
    <script src="../../../cdn.jsdelivr.net/gh/Dogfalo/materialize%40master/extras/noUiSlider/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js"></script>
    <!-- custom code-->
    <script src="farmart/js/main.js"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @stack('scripts')
</body>


<!-- Mirrored from nouthemes.net/html/farmart/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Mar 2021 20:43:03 GMT -->
</html>