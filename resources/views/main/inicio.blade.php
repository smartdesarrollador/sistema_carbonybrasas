@extends('layout.layout.layout')

@section('titulo', 'Inicio')

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


<link rel="stylesheet" href="assets/css/index.css">
<style>
    .not-active {
        pointer-events: none;
        cursor: default;
    }

    .banner-nuevo {
        /* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#b4ddb4+0,83c783+17,52b152+33,008a00+67,005700+83,002400+100;Green+3D+%231 */
        background: #b4ddb4;
        /* Old browsers */
        background: -moz-linear-gradient(top, #b4ddb4 0%, #83c783 17%, #52b152 33%, #008a00 67%, #005700 83%, #002400 100%);
        /* FF3.6-15 */
        background: -webkit-linear-gradient(top, #b4ddb4 0%, #83c783 17%, #52b152 33%, #008a00 67%, #005700 83%, #002400 100%);
        /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, #b4ddb4 0%, #83c783 17%, #52b152 33%, #008a00 67%, #005700 83%, #002400 100%);
        /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b4ddb4', endColorstr='#002400', GradientType=0);
        /* IE6-9 */


        border-radius: 5px;
        width: 100%;
        height: 250px;

    }
</style>
@endsection

@section('contenido')




<div class="owl-carousel banner owl-theme">
    <div class="item">
        <a href="{{ route('carta') }}">
            <img src="{!! asset('assets/images/covid_richards.png') !!}" class="img-fluid" alt="Green Shop" />
        </a>
    </div>
    {{-- <div class="item">
                    <img src="{!! asset('assets/images/index/slider1.jpg') !!}" class="img-fluid" alt="Green Shop" />
                </div>
                <div class="item">

                    <img src="{!! asset('assets/images/index/slider2.jpg') !!}" class="img-fluid" alt="Green Shop" />
                </div>
                <div class="item">

                    <img src="{!! asset('assets/images/index/slider3.jpg') !!}" class="img-fluid" alt="Green Shop " />
                </div> --}}
</div>


<div class="row mx-0" style="background-color: #000000">
    <div class="col text-center">
        <div class="my-3">
            <h3 class="text-white satisfy">¡Haz tu pedido ahora!</h3>
            <a href="{{ route('carta') }}" class="btn btn-danger">Carta <i class="fa fa-list-alt"
                    aria-hidden="true"></i></a>
        </div>

    </div>

</div>

<div class="container">
    <div class="row" style="margin-bottom: 50px">
        <div class="col-md-6 col-lg-6" style="margin-top: 50px;">
            <img data-zoomable="true" class="img-fluid" src="{{ asset('assets/images/index/foto_dueno.jpg') }}"
                alt="Mesas - Richards Pescados y Mariscos">
        </div>
        <div class="col-md-6 col-lg-6"
            style="margin-top: 50px;text-align: left;display: flex; justify-content: center; align-items: center">
            <div>
                <!-- <h1 class="text-center satisfy ">Bienvenidos a Cevicheria Richard`s</h1>
            <hr> -->
                <p class="parrafoHelvetica" style="text-align: justify">
                <div class="text-center texto_carbon" style="font-style: italic;font-size:22px">Soy Melitón López
                    Osorio, pollero de corazón hace 40 años, mi pasión por el pollo, las brasas y parrillas, han hecho
                    que hace dos años, naciera nuestra primera pollería <strong style="color:#D01317;">“CARBON &
                        BRASAS”</strong> .</div>
                </p>
                <p class="parrafoHelvetica" style="text-align: justify">
                <h3 class="text-center texto_carbon"><strong>“Nuestro compromiso es deleitar el paladar de cada uno de
                        nuestros comensales”</strong></h3>
                </p>
            </div>
        </div>

    </div>
</div>

<div class="container">
    <div class="row mb-3">
        <div class="col">

            <iframe src="https://www.google.com/maps/d/embed?mid=1URZaous2RvEiNhfJci9AeYMtn9dwO58&ehbc=2E312F"
                width="100%" height="480"></iframe>
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
    $(document).ready(function() {
        $(".productosCarousel").owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            autoHeight: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });

    $('.banner').owlCarousel({
        loop: true,
        autoplayTimeout: 3000,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    function change(value, param) {
        const parent = value.parentElement;
        let add = parent.childNodes[3];
        if (param === 'add') {
            add.value = parseInt(add.value) + 1;
        }
        if (param === 'minus') {
            if (parseInt(add.value) > 1) {
                add.value = parseInt(add.value) - 1;
            } else {}

        }


    }
</script>


@endsection
