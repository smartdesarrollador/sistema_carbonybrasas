@extends('layout.layout_admin.layout')

@section('titulo_admin', 'Productos')


@section('links_admin')

@endsection

@section('scripts_head_admin')
    <script type="text/javascript" src="{{ asset('admin_assets/library/js/intersection-observer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_assets/library/js/lazyload.min.js') }}"></script>
@endsection

@section('styles_admin')
    <style>
        p {
            margin: 4px;
        }

        .row {
            padding: 20px;
        }
    </style>
@endsection



@section('contenido_admin')
    <div class="fixed-action-btn">
        <button class="btn-floating btn-large red waves-effect waves-light">
            <i class="large material-icons">mode_edit</i>
        </button>
        <ul>
            <li><a class="btn-floating red waves-effect waves-light" href="addProduct" title="Añadir Productos"><i
                        class="material-icons">add</i></a></li>
            <li><a class="btn-floating blue waves-effect waves-light" href="productos_archivados"
                    title="Ver Productos Archivados"><i class="material-icons">delete</i></a></li>

        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col l4 push-l4 pull-l4 s12 center-align animated fadeIn"
                style="border-radius:5px;border: 2px solid black">
                <div class="row">
                    <h6>Buscar por Nombre</h6>
                    <div class="input-field col s12">
                        <input id="caja_busqueda" type="text" class="validate">
                        <label for="caja_busqueda"><i class="material-icons">search</i></label>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="container">
        <div id="datos"></div>

    </div>
@stop

@section('scripts_admin')

    <script>
        var lazyLoadInstance = new LazyLoad({
            elements_selector: " .lazy "
            // ... más configuraciones personalizadas?
        });

        //BUSQUEDA
        $(buscar_datos());

        function buscar_datos(consulta) {


            $.ajax({
                    url: "{{ route('admin.ajax.buscar_productos') }}",
                    /* headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, */
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        consulta: consulta,
                        "_token": "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $("#datos").html(
                            "\n" +
                            " <div class='row center-align' style='margin-top: 22%'>" +
                            "  <div class=\"preloader-wrapper center-align big active\">\n" +
                            "    <div class=\"spinner-layer spinner-blue-only\">\n" +
                            "      <div class=\"circle-clipper left\">\n" +
                            "        <div class=\"circle\"></div>\n" +
                            "      </div><div class=\"gap-patch\">\n" +
                            "        <div class=\"circle\"></div>\n" +
                            "      </div><div class=\"circle-clipper right\">\n" +
                            "        <div class=\"circle\"></div>\n" +
                            "      </div>\n" +
                            "    </div>\n" +
                            "  </div></div>");
                    },
                })
                .done(function(respuesta) {
                    $("#datos").html(respuesta);
                })
                .fail(function() {
                    console.log("error");
                });


        }

        $(document).on('keyup', '#caja_busqueda', function() {

            var valor = $(this).val();
            if (valor != "") {
                buscar_datos(valor);
            } else {
                buscar_datos();
            }

        });

        $(document).ready(function() {
            $('.fixed-action-btn').floatingActionButton();
        });
    </script>

    <script>
        lazyLoadInstance.update();


        $(".chkStock").on("click", function(e) {
            var checkbox = $(this);
            var url = "ajax/changeStockStatus.php";
            var id = $(this).attr("data-idProducto");


            if (checkbox.is(":checked")) {

                var stock = "YES";
                var datos = {
                    id: id,
                    stock: stock
                };
                $.post(url, datos, function(data) {
                    console.log(data);
                }).fail(function() {
                    alert("Se produjo un error, Verifica tu conexión a internet");
                    location.reload();
                });
            } else {
                var stock = "NOT";
                var datos = {
                    id: id,
                    stock: stock
                };
                $.post(url, datos, function(data) {
                    console.log(data);
                }).fail(function() {
                    alert("Se produjo un error, Verifica tu conexión a internet");
                    location.reload();
                });
            }
        });

        /*$('.chkStock').change(function() {
            console.log("cambio");
          let valor = $(this).attr("data-idProducto");


          alert(valor);

        });*/
    </script>
@endsection {{-- /section - scripts_admin --}}
