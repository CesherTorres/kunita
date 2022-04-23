<div>
        <section class="section-shop shop-categories--default">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="ps-shop--sidebar">
                            <div class="sidebar__category">
                                <div class="sidebar__title">Todas las Caracteristicas</div>                             
                            </div>
                            <div class="sidebar__sort">
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">EMPRESAS<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" wire:model.debounce.350ms="searchTerm" type="text" placeholder="Search Subcategoria">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">POR SUBCATEGORIA<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" wire:model="searchTerm" type="text" placeholder="Search Subcategoria">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                    <div class="brand__content">
                                        <ul>
                                            @foreach ($this->subcategorias as $subcategoria)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox{{$subcategoria->id}}" 
                                                    wire:model="filters.subcategorias.{{$subcategoria->id}}"
                                                    value="">
                                                    <label for="checkbox{{$subcategoria->id}}"><img src="img/brand/brand_themeforest.jpg" alt><span>({{$subcategoria->productos->count()}})</span></label>
                                                </div>
                                            </li>
                                            @endforeach
                                            
                                            {{-- <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox1" value="">
                                                    <label for="checkbox1"><img src="img/brand/brand_envato.jpg" alt><span>(146)</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox2" value="">
                                                    <label for="checkbox2"><img src="img/brand/brand_codecanyon.jpg" alt><span>(20)</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox3" value="">
                                                    <label for="checkbox3"><img src="img/brand/brand_cudicjungle.jpg" alt><span>(16)</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox4" value="">
                                                    <label for="checkbox4"><img src="img/brand/brand_videohive.jpg" alt><span>(50)</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox5" value="">
                                                    <label for="checkbox5"><img src="img/brand/brand_photodune.jpg" alt><span>(23)</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox6" value="">
                                                    <label for="checkbox6"><img src="img/brand/brand_evatotuts.jpg" alt><span>(11)</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox7" value="">
                                                    <label for="checkbox7"><img src="img/brand/brand_3docean.jpg" alt><span>(67)</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox8" value="">
                                                    <label for="checkbox8"><img src="img/brand/microlancer.jpg" alt><span>(34)</span></label>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">Modelo<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" wire:model="search" type="text" placeholder="Search Subcategoria">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">POR PRECIO<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <div class="block__content">
                                        <div class="block__price">
                                            <div id="slide-price" wire:ignore></div>
                                        </div>
                                        <div class="block__input">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                <input class="form-control" wire:model.lazy ="min_precio" type="text" id="input-with-keypress-0">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                                <input class="form-control" wire:model.lazy ="max_precio" type="text" id="input-with-keypress-1">
                                            </div>
                                            <button>Go</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">GENERO<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <div class="block__content">
                                        <ul>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" wire:model='genero' type="checkbox" id="sold0" value="">
                                                    <label for="sold0">MARCULINO</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="sold1" value="">
                                                    <label for="sold1">FEMENINO</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">PESO<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" wire:model="searchTerm" type="text" placeholder="Search Subcategoria">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                    <div class="brand__content">
                                        <ul>
                                            @foreach ($this->subcategorias as $subcategoria)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox{{$subcategoria->id}}" 
                                                    wire:model="filters.subcategorias.{{$subcategoria->id}}"
                                                    value="">
                                                    <label for="checkbox{{$subcategoria->id}}"><img src="img/brand/brand_themeforest.jpg" alt><span>({{$subcategoria->productos->count()}})</span></label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">ALTO<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" wire:model="searchTerm" type="text" placeholder="Search Subcategoria">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                    <div class="brand__content">
                                        <ul>
                                            @foreach ($this->subcategorias as $subcategoria)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox{{$subcategoria->id}}" 
                                                    wire:model="filters.subcategorias.{{$subcategoria->id}}"
                                                    value="">
                                                    <label for="checkbox{{$subcategoria->id}}"><img src="img/brand/brand_themeforest.jpg" alt><span>({{$subcategoria->productos->count()}})</span></label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">ANCHO<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" wire:model="searchTerm" type="text" placeholder="Search Subcategoria">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                    <div class="brand__content">
                                        <ul>
                                            @foreach ($this->subcategorias as $subcategoria)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox{{$subcategoria->id}}" 
                                                    wire:model="filters.subcategorias.{{$subcategoria->id}}"
                                                    value="">
                                                    <label for="checkbox{{$subcategoria->id}}"><img src="img/brand/brand_themeforest.jpg" alt><span>({{$subcategoria->productos->count()}})</span></label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar__block open">
                                    <div class="sidebar__title">TEMPERATURA<span class="shop-widget-toggle"><i class="icon-minus"></i></span></div>
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" wire:model="searchTerm" type="text" placeholder="Search Subcategoria">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                    <div class="brand__content">
                                        <ul>
                                            @foreach ($this->subcategorias as $subcategoria)
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkbox{{$subcategoria->id}}" 
                                                    wire:model="filters.subcategorias.{{$subcategoria->id}}"
                                                    value="">
                                                    <label for="checkbox{{$subcategoria->id}}"><img src="img/brand/brand_themeforest.jpg" alt><span>({{$subcategoria->productos->count()}})</span></label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9">
                        {{-- <div class="category__top">
                            <div class="category__header">
                                <h3 class="category__name">Fresh</h3>
                                <div class="category__search">
                                    <form action="#">
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="Search in Fresh...">
                                            <div class="input-group-append"><i class="icon-magnifier"></i></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <p class="category__des"><b class='text-black'>Fresh food</b> is food which has not been preserved and has not spoiled yet. For vegetables and fruits, this means that they have been recently harvested and treated properly postharvest; for meat, it has recently been slaughtered and butchered; for fish, it has been recently caught or harvested and kept cold.</p>
                            <div class="shop__block category__carousel">
                                <div class="owl-carousel" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="5" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_35a.jpg" alt>
                                        <div class="categogy-name">Meat &amp; Poultry</div>
                                        <div class="categogy-number">16 items</div>
                                    </div>
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_4a.jpg" alt>
                                        <div class="categogy-name">Fruit</div>
                                        <div class="categogy-number">23 items</div>
                                    </div>
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_16a.jpg" alt>
                                        <div class="categogy-name">Vegetables</div>
                                        <div class="categogy-number">16 items</div>
                                    </div>
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_20a.jpg" alt>
                                        <div class="categogy-name">Milks, Butter &amp; Eggs</div>
                                        <div class="categogy-number">15 items</div>
                                    </div>
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_37a.jpg" alt>
                                        <div class="categogy-name">Fish</div>
                                        <div class="categogy-number">4 items</div>
                                    </div>
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_6a.jpg" alt>
                                        <div class="categogy-name">Frozen</div>
                                        <div class="categogy-number">45 items</div>
                                    </div>
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_28a.jpg" alt>
                                        <div class="categogy-name">Cheese</div>
                                        <div class="categogy-number">23 items</div>
                                    </div>
                                    <div class="categogy-item"><img src="img/products/01-Fresh/01_7a.jpg" alt>
                                        <div class="categogy-name">Pasta &amp; Sauce</div>
                                        <div class="categogy-number">10 items</div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
                        <div class="result__header">
                            <div class="page">page
                                <input type="text" value="1" disabled>of 3
                            </div>
                        </div>
                        <div class="result__sort mt-5">
                            <div class="viewtype--block">
                                <div class="viewtype__sortby">
                                    <div class="select">
                                        <select class="single-select2-no-search" name="state">
                                            <option value="popularity" selected="selected">Sort by popularity</option>
                                            <option value="price">Sort by price</option>
                                            <option value="sale">Sort by sale of</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="viewtype__select"> <span class="text">View: </span>
                                    <div class="select">
                                        <select wire:model="prodPage" class="single-no-search" name="state">
                                            <option value="25" selected="selected">25 per page</option>
                                            <option value="12">12 per page</option>
                                            <option value="5">5 per page</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="result__content mt-4">
                            <div class="section-shop--grid">
                                <div class="row m-0">
                                    @foreach ($this->results as $producto)
                                        <div class="col-6 col-md-4 col-lg-3 p-0">
                                            <div class="ps-product--standard"><a href="product-default.html"><img class="ps-product__thumbnail" style="white:auto; height:150px" src="/images_product/{{$producto->imgprincipal}}" alt="alt" /></a><a class="ps-product__expand" href="javascript:void(0);" data-toggle="modal" data-target="#popupQuickview"><i class="icon-expand"></i></a><span class="ps-badge ps-product__offbadge">%{{$producto->oferta}}</span>
                                                <div class="ps-product__content">
                                                    <p class="ps-product__type"><i class="icon-store"></i>{{$producto->marca}}</p>
                                                    <h5><a class="ps-product__name" align="center"><h3>{{$producto->nameproducto}}</h3></a></h5>
                                                </div>
                                                <div class="product__footer">
                                                    <div class="ps-product__total">Total:<span>{{$producto->preciosugerido}}</span>
                                                    </div>
                                                    <button class="ps-product__addcart" data-toggle="modal" data-target="#popupAddToCart"><i class="icon-cart"></i><a>LO QUIERO</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="ps-pagination blog--pagination">
                                {{-- <ul class="pagination">
                                    <li class="chevron"><a href="#"><i class="icon-chevron-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li class="chevron"><a href="#"><i class="icon-chevron-right"></i></a></li>
                                </ul> --}}
                                {{ $this->results->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>                       
</div>
@push('scripts')
<script>

    document.addEventListener('livewire:load', function () {
            var rangeSlider = document.getElementById('slide-price');
            //para redondear el valor
            var inicio_min = Math.round(@this.inicio_min);
            var inicio_max = Math.round(@this.inicio_max);

        if (rangeSlider) {
            var input0 = document.getElementById('input-with-keypress-0');
            var input1 = document.getElementById('input-with-keypress-1');
            var inputs = [input0, input1];
            noUiSlider.create(rangeSlider, {
                start: [inicio_min, inicio_max],
                connect: true,
                step: 1,
                range: {
                    min: [inicio_min],
                    max: [inicio_max]
                }
            });

            rangeSlider.noUiSlider.on("update", function(values, handle) {
                @this.set('min_precio', values[0]);
                @this.set('max_precio', values[1]);
                inputs[handle].value = values[handle];

                /* begin Listen to keypress on the input */
                function setSliderHandle(i, value) {
                    var r = [null, null];
                    r[i] = value;
                    rangeSlider.noUiSlider.set(r);
                }

                inputs.forEach(function(input, handle) {
                    input.addEventListener("change", function() {
                        setSliderHandle(handle, this.value);
                    });

                    input.addEventListener("keydown", function(e) {
                        var values = rangeSlider.noUiSlider.get();
                        var value = Number(values[handle]);

                        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
                        var steps = rangeSlider.noUiSlider.steps();

                        // [down, up]
                        var step = steps[handle];

                        var position;

                        // 13 is enter,
                        // 38 is key up,
                        // 40 is key down.
                        switch (e.which) {
                            case 13:
                            setSliderHandle(handle, this.value);
                            break;

                            case 38:
                            // Get step to go increase slider value (up)
                            position = step[1];

                            // false = no step is set
                            if (position === false) {
                                position = 1;
                            }

                            // null = edge of slider
                            if (position !== null) {
                                setSliderHandle(handle, value + position);
                            }

                            break;

                            case 40:
                            position = step[0];

                            if (position === false) {
                                position = 1;
                            }

                            if (position !== null) {
                                setSliderHandle(handle, value - position);
                            }

                            break;
                        }
                    });
                });
            });
        }
        })
</script>
@endpush