@extends('layout.layout.layout')

@section('titulo', 'Producto')

@section('scripts_head')
    <link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/seleccion_multiple.css') }}">
@endsection

@section('styles')
    <style>
        del {

            text-decoration: none;
            position: relative;
        }

        del:before {
            content: " ";
            display: block;
            width: 100%;
            border-top: 3px solid rgba(255, 0, 0, 0.8);
            height: 16px;
            position: absolute;
            bottom: 0;
            left: 0;
            transform: rotate(-16deg);
        }

        .tituloProducto {
            text-transform: lowercase;
        }

        .tituloProducto:first-letter {
            text-transform: uppercase;
        }

        .not-active {
            pointer-events: none;
            cursor: default;
        }
    </style>
@endsection

@section('contenido')

    <div class="container  animated fadeIn slow mb-5 mt-5">
        <div class="row mb-3">
            <div class="col">
                <h2 class="titulo">CARTA</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="separador"></div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 justify-content-center" id="productsDataContainer">

        </div>


    </div>

@stop


@section('scripts')
    <script src="{{ asset('assets/js/carta.js') }}"></script>

    <script>
        const data = @json($lista);
        let dataContainer = document.getElementById('productsDataContainer');
        var estadoTienda = "{{ $estadoTienda }}";

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
            let card = '<div class="col-md-6 mb-5 animated fadeIn"><div class="card  card-products"><div class="row">' +
                '<div class="col-md-6"><img src="{{ $url_img_produc }}/' + product.imagenProducto +
                '" class="card-img-top" style="height:240px" alt="..."></div>\n' +
                '                    <div class="col-md-6 pb-3"><div class="card-body p-2"><br>';
            if (product.esNuevo === 'TRUE') {
                card += '<h5 class="text-richard mt-2">\n' +
                    '                                !NUEVO PRODUCTO!\n' +
                    '                            </h5>'
            }
            card += '<h5 class="card-title">' + product.nombreProducto + '</h5>\n' +
                '                        <p class="card-text">' + isNull(product.descripcionProducto) + '</p>\n' +
                '                       <!-- <p class="card-points-description">';
            if (product.acumulaNPuntos * 1 > 0) {
                card += 'Acumula  ' + product.acumulaNPuntos + ' puntos';
            }
            card += '</p> -->'
            if (product.precioDescuento * 1 > 0) {
                card += '<h5 class="card-price">\n' +
                    '                                <del>S/. ' + product.precioDescuento + '</del>\n' +
                    '                            </h5>'
            }
            card += '<p class="card-price">S/ ' + Number.parseFloat(product.precioProducto).toFixed(2) + '</p>';


            if (product.stock === 'YES') {

                if (product.productoObservaciones === 'MULTI_BOWL') {
                    card += '<a onclick="buyProductAndValidate(event)"\n' + 'href="shawerma-bowl.php?id=' + product
                        .idProducto + '"\n' +
                        'class="comprar-button w-100 align-self-end mt-auto">Arma tu Bowl</a>'
                } else if (product.productoObservaciones === 'MULTI_SHAWERMA') {
                    card += ' <a onclick="buyProductAndValidate(event)"\n' + ' data-whatever="' + product.idProducto +
                        '"\n' +
                        '                             href="shawerma-premium.php?id=' + product.idProducto + '"\n' +
                        '                           class="comprar-button w-100 align-self-end mt-auto">Arma tu Shawerma</a>'
                } else if (product.productoObservaciones === 'MULTI_FALAFEL') {
                    card += '<a onclick="buyProductAndValidate(event)"\n' +
                        '                                            href="falafel-premium.php?id=' + product.idProducto +
                        '"\n' +
                        '                                            class="comprar-button w-100 align-self-end mt-auto">Arma tu Falafel</a>'
                } else if (product.productoObservaciones === 'MULTI_COMBO_AL_PESO1') {
                    card += ' <a onclick="buyProductAndValidate(event)" href="combo-al-peso-pollo.php?id=' + product
                        .idProducto + '" class="comprar-button w-100 align-self-end mt-auto">' +
                        'Arma tu Combo</a>'
                } else if (product.productoObservaciones === 'MULTI_COMBO_AL_PESO2') {
                    card += '<a onclick="buyProductAndValidate(event)" href="combo-al-peso-mixto.php?id=' + product
                        .idProducto + '"\n' +
                        '                                       class="comprar-button w-100 align-self-end mt-auto">Arma tu Combo</a>'
                } else if (estadoTienda === 'CERRADO') {

                    card += '<a onclick="buyProductAndValidate(event)"\n' +
                        '                                       href="script/cartAction.php?action=addToCart&id=' + product
                        .idProducto + '&cantidad=1"\n' +
                        '                                    class="comprar-button w-100 align-self-end mt-auto not-active">Fuera de horario</a>'
                } else {

                    card += '<a onclick="buyProductAndValidate(event)"\n' +
                        '                                       href="' + url_detalle + '"\n' +
                        '                                    class="comprar-button w-100 align-self-end mt-auto">Comprar</a>'
                }

            } else {

                card += '<button type="button" class="comprar-button w-100 align-self-end mt-auto">AGOTADO\n' +
                    '                                </button>'

            }

            card += '</div></div>\n' +
                '                </div>\n' +
                '            </div></div>';
            return card;
        }
    </script>
@endsection
