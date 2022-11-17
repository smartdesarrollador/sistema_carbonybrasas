<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    @include('layout.layout.metas')
    <meta name="title" content="@yield('meta_title')">
    @include('layout.layout.links')

    @section('links')
    @show

    @include('layout.layout.scripts_head')

    @section('librerias-inicio')
    @show

    @section('scripts_head')
    @show

    @section('scripts_pagar')
    @show

    @section('styles')
    @show


</head>

<body>
    @include('layout.layout.alerts')
    
    @include('layout.layout.menu')



    @yield('contenido')


    @include('layout.layout.footer')

    @section('script_contacto')
    @show

    @section('libro_reclamaciones')
    @show

    @include('layout.layout.scripts')
    @section('scripts')
    @show

    <script>
        function pedidoMinimoAdvertencio() {
            Swal.fire(
                ' El pedido mínimo es 18 soles', '', 'info')
        }

        function goToCheckout() {
            if (localStorage.getItem('addressIsSelected') === '1') {
                Promise.all([setMetodoDenvio(localStorage.getItem('shippingType')), setDeliveryZoneId(isNull(localStorage
                    .getItem('deliveryZoneId')))]).then(value => value.map(value1 => value1.text())).then(value2 => {
                    value2[1].then(value3 => {

                        const store = JSON.parse(value3);

                        if (store.ok === 'true') {
                            if (store.data.acepta_pedidos === 'TRUE') {
                                window.location = "{{ url('pagar') }}";
                            } else {
                                Swal.fire(
                                    'Lo sentimos',
                                    'En este momento, nuestras tiendas no están disponibles',
                                    'info'
                                )
                            }
                        } else {
                            openAddressSelectorModal();
                        }

                    })
                });
            } else {
                openAddressSelectorModal();
            }
        }

        function setShippingCost() {

        }
    </script>
    <script>
        window.CSRF_TOKEN = '{{ csrf_token() }}';
    </script>

    <script>
        function getCoordinates() {
            return fetch("{{ route('script.delivery.getdeliveryzones') }}").then(value => {
                return value.json();
            }).then(value => value.data);
        }

        function setDeliveryZoneId(id) {
            const data = new FormData();

            data.append('deliveryZone', id.toString());

            return fetch("{{ route('utils.setdeliveryzoneid') }}", {
                headers: {
                    'X-CSRF-TOKEN': window.CSRF_TOKEN // <--- aquí el token
                },
                method: 'POST',
                body: data
            })
        }

        function setMetodoDenvio(metodo) {
            const data = new FormData();
            if (metodo === 'RECOJO') {
                data.append('code', 'recojo')
            }
            if (metodo === 'DELIVERY') {
                data.append('code', 'reparto')
            }
            return fetch("{{ route('utils.cambiarmetododeenvio') }}", {
                headers: {
                    'X-CSRF-TOKEN': window.CSRF_TOKEN // <--- aquí el token
                },
                method: 'POST',
                body: data
            })
        }
    </script>
</body>

</html>
