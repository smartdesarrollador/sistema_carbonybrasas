@extends('layout.layout_admin.layout')

@section('titulo_admin', 'Tienda')


@section('links_admin')

@endsection

@section('scripts_head_admin')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdGyAKPkMU2XaUc_qPuoHANn39EMyaV_4&libraries=places">
    </script>
@endsection

@section('styles_admin')
    <style>
        .switch label {
            font-weight: 900;
        }

        .width-100 {
            width: 100%;
        }

        .d-node {
            display: none;
        }
    </style>
@endsection



@section('contenido_admin')
    <div class="container">
        <div class="row">
            <div class="col l6 s12 m6 xl6" style="">

                <div class="z-depth-5" style="border-radius: 5px; border: 3px solid black;margin-top: 30px;">
                    <h5 class="center-align">Estado de la Tienda</h5>

                    <!-- Switch -->
                    @if ($estado == 'CERRADO')
                        <div class="switch center-align " style="margin-top: 100px;margin-bottom: 100px">
                            <label>
                                CERRADO
                                <input onclick="return confirm('Estas Seguro?');" id="chkTiendaStatus" type="checkbox"
                                    class="">
                                <span class="lever"></span>
                                ABIERTO
                            </label>
                        </div>
                    @endif


                    @if ($estado == 'ABIERTO')
                        <div class="switch center-align " style="margin-top: 100px;margin-bottom: 100px">
                            <label>
                                CERRADO
                                <input onclick="return confirm('Estas Seguro?');" checked id="chkTiendaStatus"
                                    type="checkbox" class="">
                                <span class="lever"></span>
                                ABIERTO
                            </label>
                        </div>
                    @endif


                    @foreach ($item_tienda as $item)
                        <div class="switch center-align " style="margin-top: 100px;margin-bottom: 100px">
                            @if ($item->idTienda === '1')
                                <h5>Tienda Lince</h5>
                            @endif
                            @if ($item->idTienda === '2')
                                <h5>Tienda Surco</h5>
                            @endif
                            <label>
                                CERRADO
                                <input @php
$item->acepta_pedidos == 'TRUE' ? 'checked' : '' @endphp
                                    onclick="actualizarDisponibilidad('{{ $item->acepta_pedidos }}','{{ $item->idTienda }}')"
                                    id="chkTiendaStatus" type="checkbox" class="">
                                <span class="lever"></span>
                                ABIERTO
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col l6 s12 m6 xl6   " style="">
                <div class="z-depth-5" style="border-radius: 5px; border: 3px solid black;margin-top: 30px;padding:15px">
                    <h5 class="center-align">Costos de Delivery</h5>

                    @foreach ($listaDistritosConCosto as $item)
                        <form onsubmit="actualizarCostoDeEnvio(event)">
                            @csrf
                            <input type="hidden" class="idDelivery" value="{{ $item->id }}">
                            <div class="d-node coords">{{ $item->coords }}</div>
                            <div class="row">
                                <div class="col s6">
                                    <h6>
                                        @php
                                            $item->idTienda == '1' ? $item->name : $item->name;
                                        @endphp




                                    </h6>
                                </div>
                                <div class="col s6">
                                    <div class="input-field col s12 ">
                                        <input type="text" class="validate browser-default precioDistrito width-100"
                                            value="{{ $item->price }}">

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 center-align">
                                    <a onclick="previewMapsModal(this)"
                                        class="btn btn-flat btn-small grey waves-effect waves-green white-text ">
                                        <i class="material-icons">
                                            remove_red_eye
                                        </i>
                                    </a>

                                    <button type="submit"
                                        class="btn btn-flat btn-small teal waves-effect waves-green white-text ">
                                        Guardar
                                        <i class="material-icons right">
                                            save
                                        </i>
                                    </button>
                                    <br>
                                    <hr>

                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>

            </div>


        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modalPreviewMaps" class="modal">
        <div class="modal-content">
            <h4>Zona de reparto</h4>
            <div id="mapContainer" style="height: 400px;width: 100%">

            </div>
        </div>
        <div class="modal-footer">
            <a id="previewMapClose" href="#!"
                class="modal-close waves-effect waves-green btn-flat red white-text">Cerrar</a>
        </div>
    </div>
@stop

@section('scripts_admin')
    <script>
        $('#chkTiendaStatus').change(function() {
            setTimeout(cambiarEstado, 300);

        });

        function cambiarEstado() {
            window.location = "{{ route('admin.script.changestorestatus') }}";
        }

        function solonumeros(e) {
            var keynum = window.event ? window.event.keyCode : e.which;
            if ((keynum == 8) || (keynum == 46))
                return true;

            return /\d/.test(String.fromCharCode(keynum));
        }

        /*
            $(".chkStock").on("click", function (e) {
                var checkbox = $(this);
                var url = "ajax/changeStockStatusIngrediente.php";
                var id = $(this).attr("data-idProducto");


                if (checkbox.is(":checked")) {

                    var stock = "ACTIVO";
                    var datos = {id: id, stock: stock};
                    $.post(url, datos, function (data) {
                        console.log(data);
                    }).fail(function () {
                        alert("Se produjo un error, Verifica tu conexión a internet");
                        location.reload();
                    });
                } else {
                    var stock = "INACTIVO";
                    var datos = {id: id, stock: stock};
                    $.post(url, datos, function (data) {
                        console.log(data);
                    }).fail(function () {
                        alert("Se produjo un error, Verifica tu conexión a internet");
                        location.reload();
                    });
                }
            });
        */
        function actualizarCostoDeEnvio($event) {
            $event.preventDefault();
            let idDelivery = $event.target.querySelector(".idDelivery").value;
            let precioDelivery = $event.target.querySelector(".precioDistrito").value;
            const data = new FormData();
            data.append('idDelivery', idDelivery);
            data.append('precioDelivery', precioDelivery);
            fetch("{{ route('admin.script.cambiarPrecioDelivery') }}", {
                method: 'POST',
                body: data
            }).then(value => {
                if (value.ok) {
                    return value.text();
                }
            }).then(value => {
                console.log(value);
                window.location.reload();
            })

        }

        function actualizarDisponibilidad(status, id) {
            console.log(status);
            console.log(id);
            let data = new FormData();

            if (status === 'TRUE') {
                data.append('status', 'FALSE')
            }
            if (status === 'FALSE') {
                data.append('status', 'TRUE')
            }
            data.append('id', id);

            fetch('utils/cambiarDisponibilidad.php', {
                body: data,
                method: 'POST'
            }).then(value => {
                if (value.ok) {
                    return value.text();
                }
            }).then(value => {
                window.location.reload();
            })

        }
    </script>


    {{--     @if (isset($_GET['code']))
        @if ($_GET['code'] == 'success')
            <script>
                M.toast({
                    html: 'Correcto! Se ha Actualizado la Tienda!'
                })
            </script>
        @endif
    @endif --}}

    <script>
        const mapContainer = document.getElementById('mapContainer');
        const previewMapClose = document.getElementById('previewMapClose');
        let map;

        previewMapClose.addEventListener('click', function() {
            map = null;

        })

        function previewMapsModal(element) {
            const coords = JSON.parse(element.parentElement.parentElement.parentElement.querySelector('.coords').innerText);
            $('#modalPreviewMaps').modal({
                dismissible: false
            });
            $('#modalPreviewMaps').modal('open');

            initMap();
            const bermudaTriangle = new google.maps.Polygon({
                paths: coords,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
            });
            bermudaTriangle.setMap(map);

        }

        function initMap() {
            let mapsOptions = {
                zoom: 12,
                streetViewControl: false,
                center: new google.maps.LatLng(-12.1102611, -76.9786420),
                mapTypeControl: false
            };
            map = new google.maps.Map(mapContainer, mapsOptions);
        }
    </script>
@endsection {{-- /section - scripts_admin --}}
