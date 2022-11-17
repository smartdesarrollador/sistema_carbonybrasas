@extends('layout.layout.layout')

@section('titulo', 'Promociones')

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

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="owl-carousel banner owl-theme">
                <div class="item">
                    <a href="gift-cards.php">
                        <img src="{!! asset('assets/images/covid_richards.png') !!}" class="img-fluid" alt="Green Shop" />
                    </a>
                </div>
                <div class="item">
                    <img src="{!! asset('assets/images/index/slider1.jpg') !!}" class="img-fluid" alt="Green Shop" />
                </div>
                <div class="item">

                    <img src="{!! asset('assets/images/index/slider2.jpg') !!}" class="img-fluid" alt="Green Shop" />
                </div>
                <div class="item">

                    <img src="{!! asset('assets/images/index/slider3.jpg') !!}" class="img-fluid" alt="Green Shop " />
                </div>
            </div>
        </div>
    </div>
</div>

<!---- Polleria ------>

<div class="container">
    <h3 class="no-span text-center m-5">Promociones</h3>
    <!--  <div class="row row-cols-1 row-cols-md-12 mb-4 owl-carousel productosCarousel mt-5" id="productsDataContainer">

    </div> -->
    <div class="row row-cols-1 row-cols-md-3 justify-content-center" id="productsDataContainer">

    </div>
</div>


<!----/Polleria ------>





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
<script type="text/javascript">
    const data = @json($lista);
    console.log(data);

    let dataContainer = document.getElementById('productsDataContainer');

    var estadoTienda = "{{ $estadoTienda }}";

    /* var estadoTienda = @json($estadoTienda); */
    console.log(estadoTienda);

    if (localStorage.getItem('addressIsSelected')) {
        if (localStorage.getItem('addressIsSelected') === '1') {
            renderData(parseInt(localStorage.getItem('store')));
        }

    }

    function renderData(storeId) {
        data.filter(value => value.store_id * 1 === storeId).forEach(product => {
            dataContainer.innerHTML += objectToProductoCard(product);

        })
    }

    function objectToProductoCard(product) {
        var url_detalle = "{{ url('detalle') }}" + "/" + product.idProducto;
        let card = '<div class="col mb-5 animated fadeIn"><div class="card h-100 card-products">' +
            '<img src="{{ $url_img_produc }}/' + product.imagenProducto + '" class="card-img-top" alt="...">\n' +
            '                    <div class="card-body p-2 d-flex flex-column">';
        if (product.esNuevo === 'TRUE') {
            card += '<h5 class="text-richard mt-2">\n' +
                '                                !NUEVO PRODUCTO!\n' +
                '                            </h5>'
        }
        card += '<h5 class="card-title titulo-cards text-secondary">' + product.nombreProducto + '</h5>\n' +
            '                        <p class="card-text">' + isNull(product.descripcionProducto) + '</p>\n' +
            '                        <p class="card-points-description">';
        if (product.acumulaNPuntos * 1 > 0) {
            card += 'Acumula  ' + product.acumulaNPuntos + ' puntos';
        }
        card += '</p>'
        if (product.precioDescuento * 1 > 0) {
            card += '<h5 class="card-price text-danger">\n' +
                '                                <del>S/. ' + product.precioDescuento + '</del>\n' +
                '                            </h5>'
        }
        card += '<p class="card-price text-danger">S/ ' + Number.parseFloat(product.precioProducto).toFixed(2) + '</p>';


        if (product.stock === 'YES') {

            if (product.productoObservaciones === 'MULTI_BOWL') {
                card += '<a onclick="buyProductAndValidate(event)"\n' + 'href="bowl-mediano-y-chicha.php?id=' + product
                    .idProducto + '"' +
                    'class="comprar-button w-100 align-self-end mt-auto">Arma tu Bowl</a>'
            } else if (estadoTienda === 'CERRADO') {

                card += '<a onclick="buyProductAndValidate(event)"\n' +
                    '                                       href="script/cartAction.php?action=addToCart&id=' + product
                    .idProducto + '&cantidad=1"\n' +
                    '                                    class="comprar-button w-100 align-self-end mt-auto not-active">Fuera de horario</a>'
            } else {

                card += '<a onclick="buyProductAndValidate(event)" onclick="mostrarLoading()"\n' +
                    'href="' + url_detalle + '"\n' +
                    '                                    class="comprar-button w-100 align-self-end mt-auto ">Comprar</a>'
            }

        } else {

            card += '<button type="button" class="comprar-button w-100 align-self-end mt-auto">AGOTADO\n' +
                '                                </button>'

        }

        card += '</div>\n' +
            '                </div>\n' +
            '            </div>';
        return card;
    }
</script>

@endsection
