@extends('layout.layout.layout')

@section('titulo', 'Pagar')

@section('scripts_pagar')
    <!-- 2 izipay -->
    <!-- Javascript library. Should be loaded in head section -->
    <script src="<?php echo $client->getClientEndpoint(); ?>/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
        kr-public-key="<?php echo $client->getPublicKey(); ?>" kr-post-url-success="{{ route('script.checkout') }}"></script>

    <!-- theme and plugins. should be loaded after the javascript library -->
    <!-- not mandatory but helps to have a nice payment form out of the box -->
    <link rel="stylesheet" href="<?php echo $client->getClientEndpoint(); ?>/static/js/krypton-client/V4.0/ext/classic-reset.css">
    <script src="<?php echo $client->getClientEndpoint(); ?>/static/js/krypton-client/V4.0/ext/classic.js"></script>
    <!-- /2 izipay -->
@endsection


@section('contenido')

    <div class="container  animated fadeIn slow">
    </div>

    @if (session('current_customer_puntos') < 10)
    @else
    @endif

    <h1>Pagar</h1>

    <div class="container mb-5">
        <div class="row mb-3">
            <div class="col">
                <h3 class="text-center">TU PEDIDO</h3>
            </div>
        </div>

        <div class="row ">
            <div class="col">
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if (session('envio') == 'recojo' || session('solo_gift_cards') == 'true')
                    <input type="hidden" value="-" class="form-control" id="direccion" name="name">
                    <input type="hidden" value="{{ $cliente_distrito }}" class="form-control" id="distrito"
                        name="name"> <input type="hidden" value="-" class="form-control" id="referencia"
                        name="name">
                    <input type="hidden" id="longitud" value="">
                    <input type="hidden" id="latitud" value="">
                @else
                    <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-6">
                            <h5>Dirección De Entrega:</h5>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group mx-sm-3 mb-2 ">
                                <label for="direccion" class="sr-only">Dirección De Entrega</label>
                                <input readonly type="text" class="form-control m-0" id="direccion"
                                    placeholder="Dirección De Entrega">
                                <small></small><a href="{{ route('carrito') }}">Cambiar dirección</a></small>
                                <!--
                                                                                                                                                                                                <small><a href="javascript:;" onclick="openAddressSelectorModal()">Cambiar
                                                                                                                                                                                                        dirección</a></small>
                                                                                                                                                                                                <input type="hidden" id="longitud" value="">
                                                                                                                                                                                                <input type="hidden" id="latitud" value=""> -->
                            </div>
                        </div>
                    </div>
                    <div id="map-title" class="d-none">
                        <small>
                            <strong>
                                Si es necesario, precisa tu ubicación en el mapa.
                            </strong>
                        </small>
                    </div>
                    <div id="map"></div>
                    <div class="row mt-4">
                        <div class="col">
                            <h5>Distrito:</h5>
                        </div>
                        <div class="col">
                            <div class="form-group mx-sm-3 mb-2  removeArrows">
                                <label for="distrito" class="sr-only">Distrito</label>
                                <input value="{{ $cliente->distrito }}" type="text" class="form-control m-0"
                                    id="distrito" placeholder="distrito">
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row mt-4">
                    <div class="col">
                        <h5>Teléfono / celular:</h5>
                    </div>
                    <div class="col">
                        <div class="form-group mx-sm-3 mb-2  removeArrows">
                            <label for="telefono" class="sr-only">Teléfono</label>
                            <input onkeypress="return isNumberKey(event)" value="{{ session('current_customer_telefono') }}"
                                type="number" class="form-control m-0" id="telefono" placeholder="Teléfono/celular">
                        </div>
                    </div>
                </div>



                @if (session('envio') == 'recojo' || session('solo_gift_cards') == 'false')
                    <div class="row mt-4">
                        <div class="col-12 col-sm-12 col-md-6">
                            <h5>Lugar de Recojo:</h5>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="form-group mx-sm-3 mb-2 ">
                                <label for="direccion" class="sr-only">Local de Entrega</label>
                                <input readonly type="text" value="{{ $deliveryZone->direccion_tienda }}"
                                    class="form-control m-0">
                                <small><a href="javascript:;" onclick="openAddressSelectorModal()">Cambiar
                                    </a></small>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="localId" value="{{ $deliveryZone->idTienda }}">
                @else
                    <input type="hidden" id="localId" value="1">
                @endif

                <div class="row mt-4 mb-4">
                    <div class="col-6">
                        <h4 class="text-richard">Observaciones / Programacion de pedido:</h4>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <textarea class="form-control mx-sm-3 mb-2 " id="mensaje" rows="3">{{ session('current_customer_mensaje') }}</textarea>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="row ">
            <div class="col">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input" required type="radio" name="documento" id="factura"
                        value="factura">
                    <label class="form-check-label" for="factura">
                        Deseo factura
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="documento" id="boleta" value="boleta">
                    <label class="form-check-label" for="boleta">
                        Deseo Boleta
                    </label>
                </div>
            </div>
        </div>
        <div id="facturaContainer" class="m-0 p-0 animated fadeIn">
            <div class="row mt-4">
                <div class="col">
                    <h5>RUC:</h5>
                </div>
                <div class="col">
                    <div class="form-group removeArrows">
                        <input value="" type="text" onkeypress="return isNumberKey(event);"
                            class="form-control mx-sm-3 mb-2 " id="rucInput" name="ruc"
                            placeholder="Ingresa tu RUC" minlength="11" required>
                    </div>
                    <div class="text-center" id="loaderRuc">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Razón Social:</h5>
                </div>
                <div class="col">
                    <div class="form-group">

                        <input value="" type="text" class="form-control mx-sm-3 mb-2 " id="razSocialInput"
                            name="razSocial" placeholder="Ingresa tu razón social" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h5>Dirección fiscal:</h5>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input value="" type="text" class="form-control mx-sm-3 mb-2 " id="dirFiscal"
                            name="dirFiscal" placeholder="Ingresa dirección fiscal" required>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col">
                <div id="boletaContainer" class="m-0 p-0 animated fadeIn">
                    <div class="row mt-4">
                        <div class="col">
                            <h5>DNI:</h5>
                        </div>
                        <div class="col">
                            <div class="form-group removeArrows">
                                <input onkeypress="return isNumberKey(event)"
                                    value="{{ session('current_customer_DNI') }}" id="dni" placeholder="Tu DNI"
                                    type="number" class="form-control mx-sm-3 mb-2 " aria-describedby="emailHelp">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <h5>Apellidos:</h5>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input value="{{ session('current_customer_apellido') }}" id="apellido" placeholder="Tus Apellidos" type="text"
                                class="form-control mx-sm-3 mb-2 " aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <h5>Fecha de Nacimiento:</h5>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <input value="{{ $valor_sesion_current_customer_fechaNacimiento }}"
                                placeholder="Tu Fecha de Nacimiento" type="date" class="form-control mx-sm-3 mb-2 "
                                id="fechaNacimiento" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>

                <div class="row mt-4 mb-4">
                    <div class="col text-center">
                        <a href="javascript:;" id="btnVerificar" class="btn  btn-block"
                            style="background:#0069D9;color:#ffffff">Verificar Datos</a>
                    </div>

                </div>


            </div>

        </div>

        <div class="row ">
            <div class="col">
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="row mt-4 mb-2">
                    <div class="col">
                        <h5>Saldo actual :</h5>
                    </div>
                    <div class="col">
                        <h5 class="text-info mx-sm-3 mb-2">
                            S/. <?php echo $saldoBilletera;
                            ?>
                        </h5>

                    </div>
                </div>


            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="row mt-4 mb-2">
                    <div class="col">
                        <h5>Saldo actual :</h5>
                    </div>
                    <div class="col">
                        <h5 class="text-info mx-sm-3 mb-2">
                            S/. {{ $saldoBilletera }}
                        </h5>

                    </div>
                </div>


            </div>

        </div>


        <div class="row">
            <div class="col">
                <div class="row mt-4 mb-2">
                    <div class="col">
                        <h5>SUBTOTAL :</h5>
                    </div>
                </div>

                <div class="col">
                    @php
                        $total = 0;
                        $total = $cartTotal - 0;
                    @endphp

                    @if ($descuento == 20)
                        <h5 class="mx-sm-3 mb-2">
                            @php
                                $total = $cartTotal - 0;
                            @endphp
                            <strong>S/. {{ $total }}</strong>
                        </h5>
                        <p class="text-success m-0">¡Tienes 1/4 de pollo gratis gracias a tus puntos!</p>
                    @else
                        <h5 class="mx-sm-3 mb-2">
                            @php
                                $total = $cartTotal;
                            @endphp
                            <strong>S/. {{ $total }}</strong>
                        </h5>
                    @endif

                    @if (session('solo_gift_cards') == 'true')
                        <small class="text-danger">(No puedes usar tu saldo para comprar giftcards)</small>
                        @php
                            $total = $cartTotal;
                        @endphp
                    @else
                        @if ($saldoBilletera < $total)
                            @php
                                $total = $total - $saldoBilletera;
                            @endphp
                        @elseif ($saldoBilletera >= $total)
                            @php
                                $total = 0;
                            @endphp
                        @endif
                    @endif

                </div>
            </div>

        </div>


        @if (session('envio') === 'recojo' && session('solo_gift_cards') === 'true')
        @else
            <div class="row">
                <div class="col">
                    <div class="row mt-4 mb-2">

                        <div class="col">
                            <h5 class="">Costo de envío:</h5>

                        </div>

                        <div class="col">
                            <h5 class="mx-sm-3 mb-2">
                                S/. {{ $costoEnvio }}
                            </h5>
                        </div>

                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="row mt-4 mb-2">

                    <div class="col">
                        <h5 class="">TOTAL:</h5>
                        <small class="m-0 p-0 text-info">Aplicando el saldo actual</small>
                    </div>

                    <div class="col">
                        <h5 class="mx-sm-3 mb-2">
                            @if ($total == '0')
                                S/. {{ $total }}
                            @else
                                S/. {{ $total + $costoEnvio }}
                            @endif

                        </h5>
                    </div>

                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col">
                <hr>
            </div>
        </div>

        <div class="row mt-4 " id="resultContainer" style="height: 200px">
            <div class="col text-center">


                <div id="vista"></div>


            </div>
        </div>

        <div class="row mb-5">
            <div class="col text-center">

            </div>
        </div>





    </div>

    <!-- 3 Izipay - Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <center>
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:300px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><img src="assets/img/navbar/logoMain.png"
                                style="width:50px"> Carbon y Brasas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- payment form -->
                        <div class="kr-embedded" kr-form-token="{{ $formToken }}">
                            @csrf
                            <!-- payment form fields -->
                            <div class="kr-pan"></div>
                            <div class="kr-expiry"></div>
                            <div class="kr-security-code"></div>

                            <!-- payment form submit button -->
                            <button class="kr-payment-button"></button>

                            <!-- error zone -->
                            <div class="kr-form-error"></div>
                        </div>
                    </div>
                    <!--  <div class="modal-footer">
                                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                                                </div> -->
                </div>
            </div>
        </center>
    </div>
    <!-- /3 Izipay - Modal -->

@endsection

@section('scripts')
    <script type="text/javascript">
        /*  $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        }); */
    </script>

    <script>
        let rucInput = document.getElementById('rucInput');
        let razSocialInput = document.getElementById('razSocialInput');
        let dirFiscal = document.getElementById('dirFiscal');


        $(document).ready(function() {
            $('#boletaContainer').hide();
            $('#facturaContainer').hide();
            $('#loaderRuc').hide();
        });

        let tipoDocumento = '';
        $("input[name=documento]").click(function() {
            let elemento = this;
            if (elemento.value === 'factura') {
                tipoDocumento = 'factura';

                $('#boletaContainer').hide();
                $('#facturaContainer').show();
            }
            if (elemento.value === 'boleta') {
                tipoDocumento = 'boleta';
                $('#boletaContainer').show();
                $('#facturaContainer').hide();
            }
        });


        $('#btnVerificar').on('click', function() {


            let documento = $('input:radio[name=documento]:checked').val();
            if (!documento) {

                Swal.fire(
                    'Error',
                    'Seleccione si desea boleta o factura',
                    'error'
                );

                return false;
            }


            direccion = $("#direccion").val();
            dni = $("#dni").val();
            fechaNacimiento = $("#fechaNacimiento").val();
            mensaje = $("#mensaje").val();
            telefono = $("#telefono").val();
            apellido = $("#apellido").val();
            total = "{{ $total }}";
            distrito = $("#distrito").val();

            @if ($total == 0)
                urlVerificarDatos = 'ajax/verificarDireccionPagarConSaldo.php';
            @else
                urlVerificarDatos = "{{ route('ajax.verificar_direccion') }}";
            @endif

            if (!$("#localId").val()) {
                Swal.fire(
                    'Error',
                    'Seleccione un local de recojo.',
                    'error'
                );

                return false;
            }


            let datos = {
                "direccion": direccion,
                "dni": dni,
                "fechaNacimiento": fechaNacimiento,
                'mensaje': mensaje,
                'telefono': telefono,
                'apellido': apellido,
                'total': total,
                'distrito': distrito,
                'tipoDocumento': tipoDocumento,
                'lat': $("#latitud").val(),
                'lng': $("#longitud").val(),
                'localId': $("#localId").val(),
                "_token": "{{ csrf_token() }}"
            };

            if (tipoDocumento === 'factura') {

                datos.ruc = rucInput.value;
                datos.razonSocial = razSocialInput.value;
                datos.direccionFiscal = dirFiscal.value;

                if (rucInput.value.length < 11 || razSocialInput.value.length === 0 || dirFiscal.value
                    .length ===
                    0) {
                    Swal.fire(
                        'Error',
                        'Rellena todos los campos de tu factura',
                        'error'
                    );
                    return false
                }
            }
            $.ajax({
                url: urlVerificarDatos,
                type: "post",
                data: datos,
                beforeSend: function() {
                    $("#vista").html("<div class=\"d-flex justify-content-center\">\n" +
                        "  <div style='width: 130px;height: 130px;margin-top: 60px' class=\"spinner-border\" role=\"status\">\n" +
                        "    <span class=\"sr-only\">Loading...</span>\n" +
                        "  </div>\n" +
                        "</div>");

                    $('#button').attr("disabled", true);

                },

                success: function(data) {
                    $("#vista").html(data);
                }
            });

            let elementPosition = $("#resultContainer").offset();
            window.scroll({
                top: elementPosition.top - 150,
                behavior: 'smooth'
            });
        });
    </script>

    <script>
        (function() {
            const latitudElement = document.getElementById('latitud');
            const longitudElement = document.getElementById('longitud');
            const direccionElement = document.getElementById('direccion');
            const localIdElement = document.getElementById('localId');

            let addressIsSelected = localStorage.getItem('addressIsSelected');


            if (!addressIsSelected) {
                localStorage.setItem('addressIsSelected', '0');
                openAddressSelectorModal();
            }
            if (addressIsSelected === '1') {
                direccionElement.value = localStorage.getItem('address');
                longitudElement.value = localStorage.getItem('lng');
                latitudElement.value = localStorage.getItem('lat');

                if (localStorage.getItem('shippingType') === 'DELIVERY') {
                    localIdElement.value = localStorage.getItem('store');
                }

            }
        })();
    </script>

@endsection
