@extends('layout.layout_admin.layout')

@section('titulo_admin', 'Dashboard')


@section('links_admin')
    <link rel="stylesheet" href="{{ asset('admin_assets/css/dashboard.css') }}">
@endsection

@section('scripts_head_admin')
    <script src="{{ asset('admin_assets/js/dashboardHead.js') }}"></script>
@endsection

@section('styles_admin')
    <style>
        .material-icons.md-18 {
            font-size: 18px;
        }

        .material-icons.md-24 {
            font-size: 24px;
        }

        .material-icons.md-36 {
            font-size: 36px;
        }

        .material-icons.md-48 {
            font-size: 48px;
        }
    </style>
@endsection



@section('contenido_admin')

    <div class="container animated fadeIn fast">
        <div class="row" style="padding: 0 0 0 0 !important;">
            <div class="col l12 xl12 s12 s12 m12 center-align">
                <img width="20px" src="{{ asset('admin_assets/img/loading.gif') }}" alt="">
            </div>

        </div>
        <div class="row" style="padding: 0 20px 20px 20px !important;">
            <div class="col l4 push-l4 pull-l4 s12 center-align z-depth-4"
                style="border-radius:5px;border: 2px solid black">

                @if ($valor == 'date')
                    <h6 style="font-weight: 900"><u>{{ $selectedDate }}</u></h6>
                @elseif ($valor == 'limit50')
                    <h6 style="font-weight: 900"><u>Ultimos 50 pedidos</u></h6>
                @else
                    <h6 id="" style="font-weight: 900"><u id="fechaActual"></u></h6>
                    <script>
                        dia()
                    </script>
                @endif


                <label><strong>FILTRAR</strong></label>
                <select class="browser-default" onchange="filtrar(this.value)">
                    <option value="" disabled selected>Elige un Opción</option>
                    <option value="1">POR FECHA</option>
                    <option value="2">ULTIMOS 50 PEDIDOS</option>
                    <option value="3">HOY</option>

                </select>
                <input type="text" id="fecha" class="datepicker">

            </div>
        </div>

    </div>

    <div class="container">
        @if (count($pedidos) > 0)
            <div style="display: flex;justify-content: space-around">
                <strong class=''>Total de ventas = S/. {{ $totalVentas }}</strong>
                <strong class=''># de pedidos en esta lista = {{ $numeroDepedidosEnLista }}</strong>
            </div>

            @foreach ($pedidos as $pedido)
                <div class="row z-depth-2 "
                    style="border: 2px solid rgb(197, 148, 62);border-radius: 8px;margin-bottom: 15px">
                    <div class="col l4 m4 s12  xl4 l4">

                        <p>
                            Hora: <strong>{{ $pedido->horaPedido }}</strong>( {{ $pedido->fechaPedido }}
                            )
                        </p>
                        <p>
                            Nombre: <strong style="text-transform: capitalize">{{ $pedido->nombre }}</strong>
                        </p>
                        <p>
                            Apellidos: <strong style="text-transform: capitalize">{{ $pedido->apellido }}</strong>
                        </p>
                        <p>
                            Direccion: <strong>{{ $pedido->direccionPedido }}</strong>
                        </p>

                        @if ($pedido->documento == 'factura')
                            <p>
                                RUC: <strong>{{ $pedido->ruc }}</strong>
                            </p>
                            <p>
                                Dirección fiscal: <strong>{{ $pedido->direccionFiscal }}</strong>
                            </p>
                            <p>
                                Razón social: <strong>{{ $pedido->razonSocial }}</strong>
                            </p>
                        @else
                            <p>
                                DNI: <strong>{{ $pedido->DNI }}</strong>
                            </p>
                        @endif
                        <p>
                            Fecha de Nac: <strong>{{ $pedido->fechaNacimiento }}</strong>
                        </p>
                        <p>
                            Tarjeta: <strong>{{ $pedido->brand }} - {{ $pedido->last_four }}</strong>
                        </p>
                        <p>
                            Email: <strong>{{ $pedido->email }}</strong>
                        </p>
                        <p>
                            Teléfono: <strong>{{ $pedido->pedidoTelefono }}</strong>
                        </p>
                        @if ($pedido->pedidoObservaciones === 'TRUE')
                            <p class="teal-text">
                                <strong>Envio programado <i class="material-icons right">
                                        query_builder
                                    </i></strong>
                            </p>
                            <p class="teal-text">
                                Fecha de envío: <strong>{{ $pedido->fechaEnvio }}</strong>
                            </p>
                        @endif
                    </div>




                    <div class="col l4 m4 s12  xl4 l4">
                        <p><strong><u>Observaciones:</u></strong></p>
                        <p>{{ $pedido->pedidoObservaciones }}</p>
                        <p><strong><u>Contenido del Pedido:</u></strong></p>
                        <ul class="collection"
                            style="margin-bottom:  0;margin-top:0;margin-left: 5px;list-style-type: disc">

                            @foreach ($objPedido->getPedidosItemsByidPedido($pedido->idPedido) as $items)
                                <li class="collection-item" style="text-transform: capitalize;padding: 5px">
                                    {{ strtolower($items->nombreProducto) }} ( X {{ $items->cantidad }}
                                    )
                            @endforeach
                            </li>
                        </ul>
                        @if ($pedido->producto_gratis == 'true')
                            <p>1/4 de pollo - Gratis por los 10 puntos de los stickers</p>
                        @endif

                        <div class="row">
                            <div class="col s12">

                                <div class="row">
                                    <div class="col s12 l12 m12 xl12 center-align">
                                        <a class="btn btn-small btn-flat grey black-text" target="_blank"
                                            href="{{ url('/admin/utils/printreceipt') }}/{{ $pedido->idPedido }}">
                                            <i class="material-icons right">print</i>Imprimir</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col l4 m4 s12  xl4 l4">
                        <p class="center-align"><strong>TOTAL: S/ {{ $pedido->precioTotal }}</strong></p>
                        <p class="center-align"><small>Envío: S/ {{ $pedido->costoEnvioPagado }}</small></p>
                        <div class="row">
                            <div class="input-field col s12">
                                <select onchange="changeStatus(this.value,{{ $pedido->idPedido }})"
                                    class="browser-default 
@php
switch ($pedido->idEstado) {
                                                                                                                                            case '0':
                                                                                                                                                echo "red white-text";
                                                                                                                                                break;
                                                                                                                                            case '1':
                                                                                                                                                echo "orange white-text";
                                                                                                                                                break;
                                                                                                                                            case '2':
                                                                                                                                                echo "green white-text";
                                                                                                                                                break;
                                                                                                                                            default:
                                                                                                                                                echo "black white-text";
                                                                                                                                        } @endphp

">

                                    <option value="" disabled selected>Elije una Opcion</option>


                                    @foreach ($listaEstadosPedido as $estado)
                                        <option
                                            @php
if ($pedido->idEstado == $estado->idEstado) {
                                               echo 'selected';
                                              } @endphp
                                            value="{{ $estado->idEstado }}">

                                            {{ $estado->nombreEstado }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="row">
                                <div class="col s12 center-align">
@if ($pedido->delivery == 'false')
<i class="material-icons md-48">
    store_mall_directory
</i><br>
<strong>Recojo en tienda</strong>
@else
<i class="material-icons md-48">
    two_wheeler
</i><br>
<strong>Delivery</strong>
@if (strlen($pedido->latitud) > 4)
<div style="margin-top: 10px">
    <a class=" btn-flat red-text" target="_blank" href="https://www.google.com/maps/search/?api=1&query={{ $pedido->latitud }},{{ $pedido->longitud }}"><i class="material-icons md-48">directions</i></a>
</div>
@endif
@endif

                                </div> 
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        @else
        <div class="row z-depth-4 hoverable animated fadeIn slow" style="border: 2px solid rgb(197, 148, 62);border-radius: 8px;margin-bottom: 10px">
            <div class="col l12 m12 s12  xl12 l12 center-align">
                <h5>No hay pedidos para esta fecha </h5>
                <p>Click en la fecha mostrada arriba para ver pedidos de días anteriores.</p>
            </div>
        </div>
        @endif
    </div>

    <div id="vista">

    </div>


@stop

@section('scripts_dashboard_admin')
    <script>
        function filtrar(value) {
            if (value == 1) {
                $('.datepicker').datepicker('open');
            }
            if (value == 2) {
                window.location = `{{ route('admin.dashboard', ['valor' => 'limit50']) }}`
            }
            if (value == 3) {
                window.location = `{{ route('admin.dashboard') }}`

            }


        }

        var hoy = new Date();
        var dd = hoy.getDate();

        $(document).ready(function() {
            $('.datepicker').hide();

            $('.datepicker').datepicker({
                formatSubmit: 'yyyymmdd',
                onSelect: function(date) {

                    var mes = date.getMonth() + 1; //obteniendo mes
                    var dia = date.getDate(); //obteniendo dia
                    var ano = date.getFullYear(); //obteniendo año
                    if (dia < 10)
                        dia = '0' + dia; //agrega cero si el menor de 10
                    if (mes < 10)
                        mes = '0' + mes //agrega cero si el menor de 10

                    var fechaActual = ano + "-" + mes + "-" + dia;

                    console.log(fechaActual);
                    window.location = `{{ url('/admin/dashboard') }}/${fechaActual}`

                },
                format: 'yyyymmdd',
                i18n: {
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                    ],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                        'Nov', 'Dic'
                    ],
                    weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                    clear: 'Limpiar',
                    done: 'Ok',
                    cancel: 'Cancelar'
                },
                max: true
            });

        });
    </script>
@endsection
