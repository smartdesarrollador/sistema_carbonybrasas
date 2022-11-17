@extends('layout.layout.layout')

@section('titulo', 'Detalle')

@section('librerias-inicio')
    <script src="assets/js/registerWorker.js"></script>
    <!-- <link rel="stylesheet" href="vendor/swiper/swiper.min.css"> -->
    <link rel="stylesheet" href="{!! asset('librerias/videojs/video-js.css') !!}">
    <link rel="stylesheet" href="{!! asset('librerias/videojs/cityVideoJs.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/cintSection.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/vendor/css/owl.carousel.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/vendor/css/owl.theme.default.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/cards.css') !!}">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <!--META TAGS-->
@section('meta_title', 'Bienvenidos a Green Shop Lince')

<!-- The Open Graph protocol -->
<meta property="og:type" content="restaurant.restaurant">
<meta property="og:title" content="Green Shop">
<meta property="og:description" content="Green Shop">
<meta property="og:image" content="https://greenshop.pe/assets/og/og-logo.jpg">
<meta property="og:image:height" content="503">
<meta property="og:image:width" content="961">
<meta property="og:url" content="https://greenshop.pe">

<!--restaurant-->
<meta property="restaurant:menu" content="https://greenshop.pe/categorias.php">
<meta property="restaurant:contact_info:website" content="https://greenshop.pe">
<meta property="restaurant:contact_info:street_address" content="Brigadier Pumacahua 2321">
<meta property="restaurant:contact_info:locality" content="Lince">
<meta property="restaurant:contact_info:region" content="Lima">
<meta property="restaurant:contact_info:postal_code" content="15073">
<meta property="restaurant:contact_info:country_name" content="Perú">
<meta property="restaurant:contact_info:email" content="reservaciones@greenshop.pe">
<meta property="restaurant:contact_info:phone_number" content="012660426">


<link rel="stylesheet" href="{!! asset('assets/css/carouselCarrito.css') !!}" />
<link rel="stylesheet" href="{!! asset('assets/vendor/css/owl.carousel.min.css') !!}" />
<link rel="stylesheet" href="{!! asset('assets/vendor/css/owl.theme.default.min.css') !!}" />
<style>
    /*---- image-radio -----*/
    .image-radio {
        cursor: pointer;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 4px solid transparent;
        margin-bottom: 0;
        outline: 0;
    }

    .image-radio input[type="radio"] {
        display: none;
    }

    .image-radio-checked {
        border-color: red;
    }

    .image-radio .glyphicon {
        position: absolute;
        color: #4A79A3;
        background-color: transparent;
        padding: 10px;
        top: 0;
        right: 0;
    }

    .image-radio-checked .glyphicon {
        display: block !important;
    }

    /* --- image-checkbox -----*/
    .image-checkbox {
        cursor: pointer;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 4px solid transparent;
        margin-bottom: 0;
        outline: 0;
    }

    .image-checkbox input[type="checkbox"] {
        display: none;
    }

    .image-checkbox-checked {
        border-color: red;
    }

    .image-checkbox .glyphicon {
        position: absolute;
        color: #4A79A3;
        background-color: transparent;
        padding: 10px;
        top: 0;
        right: 0;
    }

    .image-checkbox-checked .glyphicon {
        display: block !important;
    }
</style>
@endsection

@section('contenido')

<div class="container-fluid ">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-sm-12 	col-md-6 	col-lg-6 	col-xl-6">

                <img loading="lazy" data-zoomable="true" src="{{ asset('' . $producto->imagenProducto) }}"
                    class="img-fluid img-thumbnail" alt="..."
                    onerror="this.onerror = null; this.src = '{{ $url_img }}'; ">

            </div>
            <div class="col-sm-12 	col-md-6 	col-lg-6 	col-xl-6">
                <h2 class="text-left mt-3">{{ $producto->nombreProducto }}</h2>
                <hr style="border:0.5px solid white;">
                <h3 class="text-left">S/.{{ $producto->precioProducto }}</h3>
                <p class="text-left">{{ $producto->descripcionProducto }}</p>





                <div class="input-group mb-1 mt-4">
                    @if ($estadoTienda->estado == 'ABIERTO')
                        @if ($producto->stock == 'YES')
                            <form action="{{ route('script.cartaction') }}" method="post" style="width: 100%">
                                @csrf
                                @if ($producto->idProducto == 1 ||
                                    $producto->idProducto == 3 ||
                                    $producto->idProducto == 4 ||
                                    $producto->idProducto == 5 ||
                                    $producto->idProducto == 6 ||
                                    $producto->idProducto == 8 ||
                                    $producto->idProducto == 9)
                                    <!------  RadioButton ------>
                                    <h5>Elige</h5>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="parte_pollo"
                                            id="{{ $uniqid1 }}" value="Parte Pecho" required>
                                        <label class="form-check-label " for="{{ $uniqid1 }}">Pecho</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="parte_pollo"
                                            id="{{ $uniqid2 }}" value="Parte Pierna" required>
                                        <label class="form-check-label" for="{{ $uniqid2 }}">Pierna</label>
                                    </div>

                                    <!------ /RadioButton ------>
                                @endif

                                @if ($producto->idProducto == 1 ||
                                    $producto->idProducto == 2 ||
                                    $producto->idProducto == 3 ||
                                    $producto->idProducto == 4 ||
                                    $producto->idProducto == 5 ||
                                    $producto->idProducto == 6)
                                    <!------  RadioButton ------>
                                    <h5>Escoge tu ensalada</h5>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="ensalada"
                                            id="{{ $uniqid1 }}" value="Ensalada fresca" required>
                                        <label class="form-check-label" for="{{ $uniqid1 }}">fresca</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="ensalada"
                                            id="{{ $uniqid2 }}" value="Ensalada Cocida" required>
                                        <label class="form-check-label" for="{{ $uniqid2 }}">Cocina</label>
                                    </div>

                                    <!------ /RadioButton ------>
                                @endif

                                @if ($producto->idProducto == 1 || $producto->idProducto == 4 || $producto->idProducto == 6)
                                    <!------  RadioButton ------>
                                    <h5>Escoge tu gaseosa</h5>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="gaseosa"
                                            id="{{ $uniqid1 }}" value="Inka Kola" required>
                                        <label class="form-check-label" for="{{ $uniqid1 }}">Inka Kola</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="gaseosa"
                                            id="{{ $uniqid2 }}" value="Inka Kola Zero" required>
                                        <label class="form-check-label" for="{{ $uniqid2 }}">Inka Kola
                                            zero</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="gaseosa"
                                            id="{{ $uniqid3 }}" value="Coca Cola" required>
                                        <label class="form-check-label" for="{{ $uniqid3 }}">Coca Cola</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input " type="radio" name="gaseosa"
                                            id="{{ $uniqid4 }}" value="Coca Cola Zero" required>
                                        <label class="form-check-label" for="{{ $uniqid4 }}">Coca Cola
                                            zero</label>
                                    </div>

                                    <!------ /RadioButton ------>
                                @endif

                                @if ($producto->idProducto == 1 ||
                                    $producto->idProducto == 2 ||
                                    $producto->idProducto == 3 ||
                                    $producto->idProducto == 4 ||
                                    $producto->idProducto == 5 ||
                                    $producto->idProducto == 6 ||
                                    $producto->idProducto == 7 ||
                                    $producto->idProducto == 8 ||
                                    $producto->idProducto == 9 ||
                                    $producto->idProducto == 10)
                                    <!-- Checkbox -->
                                    <h5>Escoge tu Salsa</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Todas las salsas"
                                            id="todas_las_salsas" name="todas_las_salsas">
                                        <label class="form-check-label" for="todas_las_salsas">
                                            Todas las salsas
                                        </label>
                                    </div>
                                    <div id="salsas_individuales">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Mayonesa"
                                                id="{{ $uniqid1 }}" name="mayonesa">
                                            <label class="form-check-label" for="{{ $uniqid1 }}">
                                                Mayonesa
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Ketchup"
                                                id="{{ $uniqid2 }}" name="ketchup">
                                            <label class="form-check-label" for="{{ $uniqid2 }}">
                                                Ketchup
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Ají"
                                                id="{{ $uniqid3 }}" name="aji">
                                            <label class="form-check-label" for="{{ $uniqid3 }}">
                                                Ají
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Vinagreta"
                                                id="{{ $uniqid4 }}" name="vinagreta">
                                            <label class="form-check-label" for="{{ $uniqid4 }}">
                                                Vinagreta
                                            </label>
                                        </div>
                                    </div>
                                    <!--/Checkbox -->
                                @endif

                                <input type="hidden" name="action" value="addToCart">
                                <input type="hidden" name="id" value="{{ $producto->idProducto }}">

                                <div class="row mt-3">
                                    <div class="col-md-6 col-sm-6 col-xl-6  text-center">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend input-group-append w-100">
                                                <button onclick="changeQty(this,'minus')"
                                                    class="btn btn-outline-secondary" type="button"><i
                                                        class="fas fa-minus"></i></button>
                                                <input required onkeypress="return solonumeros(event);" type="number"
                                                    minlength="1" class="form-control text-center" min="1"
                                                    name="cantidad" value="1" placeholder="Cantidad"
                                                    aria-label="Cantidad" aria-describedby="button-addon2">
                                                <button onclick="changeQty(this,'add')" type="button"
                                                    class="btn btn-outline-secondary"><i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xl-6 text-center">
                                        <div class="input-group">

                                            <button style="z-index: 0;margin: 5px"
                                                class="btn btn-danger btn-lg btn-block my-2 my-sm-0 px-1 comprar-button"
                                                type="submit"><i class="fas fa-cart-plus"></i>
                                                Comprar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="row" style="width: 100%;margin: 0;">
                                <div class="col-sm-12 col-xl-12 col-12 col-md-12 text-center">
                                    <button type="button" class="btn btn-outline-dark btn-lg">Agotado
                                    </button>
                                </div>
                            </div>

                        @endif
                    @else
                        <div class="row" style="width: 100%;margin: 0;">
                            <div class="col-sm-12 col-xl-12 col-12 col-md-12 text-center">
                                <button type="button" class="btn btn-outline-dark btn-lg">Fuera del horario de
                                    atención
                                </button>
                            </div>
                        </div>



                    @endif


                </div>

            </div>
        </div>


    </div>
</div>

@endsection

@section('scripts')
<script src="{!! asset('librerias/swiper/swiper.min.js') !!}"></script>
<script src="{!! asset('librerias/videojs/video.js') !!}"></script>
<script src="{!! asset('assets/js/index.js?v=2') !!}"></script>
<script src="{!! asset('assets/vendor/js/owl.carousel.min.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script>
    /*------ Image RadioButton --------*/
    $(document).ready(function() {
        // add/remove checked class
        $(".image-radio").each(function() {
            if ($(this).find('input[type="radio"]').first().attr("checked")) {
                $(this).addClass('image-radio-checked');
            } else {
                $(this).removeClass('image-radio-checked');
            }
        });

        // sync the input state
        $(".image-radio").on("click", function(e) {
            $(".image-radio").removeClass('image-radio-checked');
            $(this).addClass('image-radio-checked');
            var $radio = $(this).find('input[type="radio"]');
            $radio.prop("checked", !$radio.prop("checked"));

            e.preventDefault();
        });
    });
    /*------ /Image Checkbox --------*/

    /*------ Image Checkbox --------*/
    // add/remove checked class
    $(".image-checkbox").each(function() {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        } else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    // sync the input state
    $(".image-checkbox").on("click", function(e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked", !$checkbox.prop("checked"));

        e.preventDefault();
    });
    /*-------/Image Checkbox -------*/
</script>
<script>
    $(document).ready(function() {
        $("#todas_las_salsas").click(function() {
            $("#salsas_individuales").toggle();
        });


    });
</script>





@endsection
