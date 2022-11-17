@extends('layout.layout.layout')

@section('titulo', 'Carrito')

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

@endsection

@section('contenido')

<div class="container  animated fadeIn slow mb-5 mt-5">

    <div class="row m-2">
        <div class="col-12 col-sm-12 col-md-12 col-xl-7 col-lg-7">
            <div class="row">
                <div class="col  p-2">
                    <div class="row mb-3">
                        <div class="col">
                            <h3 class="text-center">Carrito de Compras</h3>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="separador"></div>
                        </div>
                    </div>

                    @if ($total_items > 0)

                        @foreach ($cartItems as $itemCarrito)
                            @if ($itemCarrito['productoObservaciones'] == 'ADICIONAL')
                                @php
                                    $nAdicionalesCart = $nAdicionalesCart + 1;
                                @endphp
                            @endif
                            @php
                                $subtotal = $subtotal + $itemCarrito['subtotal'];
                                
                                $puntosAacumular = $puntosAacumular + $itemCarrito['subtotalPuntos'];
                            @endphp

                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                                    <h5>Producto</h5>
                                    <span style="text-transform: capitalize"
                                        class="font-italic">{{ $itemCarrito['nombreProducto'] }}</span>
                                    <span
                                        class="font-italic">{{ substr($itemCarrito['productoIngredientes'], 0, -2) }}</span>
                                    @if (strlen($itemCarrito['emailGift']) > 0)
                                        <small class=" d-block text-muted">Para: {{ $itemCarrito['emailGift'] }}</small>
                                    @endif

                                    @if (strlen($itemCarrito['dedicatoriaGift']) > 0)
                                        <small class=" d-block text-muted">Dedicatoria:
                                            {{ $itemCarrito['dedicatoriaGift'] }}</small>
                                    @endif
                                    <img class="cart-image"
                                        src="{{ asset('assets/img/promos/' . $itemCarrito['imagenProducto']) }}"
                                        alt="">
                                </div>
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center">
                                    <div>
                                        <h5 class="text-center">Cantidad</h5>
                                        <div class="row mt-1">
                                            <div class="col text-center">
                                                <a onclick="mostrarLoading()"
                                                    href="{{ route('script.cartaction.actualizar', ['action' => 'updateCartItem', 'id' => $itemCarrito['rowid'], 'qty' => $itemCarrito['qty'] - 1]) }}"
                                                    class="btn btn-sm"><i class="fa fa-minus"
                                                        aria-hidden="true"></i></a>
                                                <input readonly class="text-center" style="width: 60px" type="text"
                                                    value="<?php echo $itemCarrito['qty']; ?>">
                                                <a onclick="mostrarLoading()"
                                                    href="{{ route('script.cartaction.actualizar', ['action' => 'updateCartItem', 'id' => $itemCarrito['rowid'], 'qty' => $itemCarrito['qty'] + 1]) }}"
                                                    class="btn btn-sm "><i class="fa fa-plus"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center d-flex justify-content-center align-items-center">
                                    <div>
                                        <h5>Precio</h5>
                                        <span
                                            class="font-italic">{{ number_format($itemCarrito['price'], 2, '.', '') }}</span>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center d-flex justify-content-center align-items-center">
                                    <div>
                                        <h5 class="font-weight-bolder">SubTotal</h5>
                                        <span class="font-italic">S/
                                            {{ number_format($itemCarrito['subtotal'], 2, '.', '') }}
                                        </span>
                                    </div>
                                </div>
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-1 col-xl-1 text-center d-flex justify-content-center align-items-center">
                                    <div>
                                        <a onclick="mostrarLoading();"
                                            href="{{ route('script.cartaction.remover', ['action' => 'removeCartItem', 'id' => $itemCarrito['rowid']]) }}"
                                            class="btn btn-sm btn-outline-danger"><i class="fa fa-times"
                                                aria-hidden="true"></i></a>
                                    </div>
                                </div>

                            </div>
                            <hr class=" d-sm-block d-md-block d-xl-none d-lg-none">
                        @endforeach
                    @else
                        <div class="row mb-3">
                            <div class="col col-12 text-center mt-4">
                                <i style="font-size: 100px;color: #fff000" class="fa fa-shopping-cart"></i>
                                <h5 class="py-3">Tu carrito está vacío</h5>
                                <a href="{{ url('/carta') }}" class="comprar-button">IR A COMPRAR</a>
                            </div>
                        </div>
                    @endif




                </div>
            </div>


        </div>
        <div class="col-12 col-sm-12 col-md-12 col-xl-5 col-lg-5">

            <div class="row">
                <div class="col">
                    <div class="row mb-3">
                        <div class="col">
                            <h3 class="text-center ">Resumen de Orden</h3>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h5>Subtotal:</h5>

                        </div>
                        <div class="col">
                            <h5>S/ {{ number_format($subtotal, 2, '.', '') }}</h5>

                        </div>
                    </div>
                    @if ($_SESSION['solo_gift_cards'] == 'false')
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Método de envío: </h5>

                            </div>
                            <div class="col">

                                <div id="orderTypeDescription"></div>
                                <a style="cursor: pointer" class="text-info"
                                    onclick="openAddressSelectorModal()">Cambiar dirección<i
                                        class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            </div>

                        </div>
                    @endif
                    <div class="row mb-3 mt-1">
                        <div class="col">
                            <hr>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5>TOTAL A PAGAR:</h5>

                        </div>
                        <div class="col">
                            <h5 class="font-weight-bolder">S/. {{ $total }}</h5>

                        </div>
                    </div>
                    <div class="row mt-4">

                        <div class="col">
                            <h5 class="font-weight-bolder text-success">Con esta compra
                                acumulas {{ $puntosAacumular }} puntos</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6" style="margin-top: 15px;margin-bottom: 15px">
                            <a onclick="mostrarLoading();" class="btn btn-dark btn-lg btn-block"
                                href="{{ route('script.cartaction.delete', ['action' => 'destroyCart']) }}">Limpiar
                                Carrito</a>
                        </div>



                        <div class="col-md-6 col-lg-6 col-xl-6 col-sm-6" style="margin-top: 15px;margin-bottom: 15px">
                            <a class="btn btn-info btn-lg btn-block" href="{{ url('/carta') }}">Volver a la carta
                            </a>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col">


                            @if ($subtotal > 0)


                                @if (session('estado_cliente') == 'true')

                                    @if ($subtotal < 18 && session('envio') != 'recojo')
                                        <a onclick="pedidoMinimoAdvertencio()"
                                            class="btn btn-danger btn-lg btn-block">
                                            Continuar
                                        </a>
                                    @else
                                        <a onclick="goToCheckout()" class="btn btn-danger btn-lg btn-block">
                                            Continuar
                                        </a>
                                    @endif
                                @else
                                    <a class="btn btn-danger btn-lg btn-block" href="" data-toggle="modal"
                                        data-target="#login-modal">
                                        Continuar
                                    </a>
                                @endif

                            @endif


                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>





</div>










<!-- <table class="table">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
    </tr>
    @foreach ($cartItems as $itemCarrito)
<tr>
            <td>{{ $itemCarrito['name'] }}</td>

        </tr>
@endforeach

</table> -->


@endsection

@section('scripts')

<script src="{!! asset('assets/vendor/js/owl.carousel.min.js') !!}"></script>

@endsection
