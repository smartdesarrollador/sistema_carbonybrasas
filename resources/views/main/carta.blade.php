@extends('layout.layout.layout')

@section('titulo', 'Carta')



@section('contenido')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-5 pb-3" style="background-color: #000;">

                <h3 class="text-center text-white mt-3">CATEGORÍAS</h3>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-12 col-xl-12 col-lg-12 col-sm-12">

                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3 mr-auto ml-auto" id="searchTrigger">
                            <input readonly type="text" class="form-control" placeholder="Buscar por nombre">
                            <div class=" input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                        class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        <div class="row">
            @foreach ($lista as $campo)
                @if (($campo->nombre != null && $campo->idTipoProducto == 1) ||
                    $campo->idTipoProducto == 2 ||
                    $campo->idTipoProducto == 3)
                    <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 col-xl-6 mt-4">
                        <div class="card p-2 mb-4 tarjeta">


                            <img class="card-img-top" style="border-radius:10px"
                                onclick="window.location='{{ route('productos', ['tipo' => $campo->idTipoProducto]) }}'"
                                style="-webkit-filter: brightness(70%);filter: brightness(70%);" loading="lazy"
                                onerror="this.onerror = null; this.src = '{{ asset('assets/images/carta/categorias/default.jpg') }}'"
                                src="{{ asset('assets/images/carta/categorias/') }}/{{ $campo->imageUrl }}"
                                alt='{{ $campo->nombre }}' />

                        </div>
                    </div>
                @endif
            @endforeach

        </div>




    </div>

    <!-- SEARCH MODAL -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">

                    <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">

                        <label for="buscadorInput"><small>nombre del plato:</small></label><input type="text"
                            class="form-control" placeholder="Ingresa el nombre del plato" id="buscadorInput">

                    </div>

                    <div class="row">
                        <div class="col" id="searchResultContainer">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let allProducts = @json($allProductos);

        /* console.log(allProducts); */


        const d = document;
        const searchTrigger = d.getElementById('searchTrigger');
        const buscadorInput = d.getElementById('buscadorInput');
        const searchResultContainer = d.getElementById('searchResultContainer');

        const debounce = (func, wait, immediate) => {

            let timeout;

            return function executedFunction() {
                let context = this;
                let args = arguments;

                let later = function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                };

                let callNow = immediate && !timeout;

                clearTimeout(timeout);

                timeout = setTimeout(later, wait);

                if (callNow) func.apply(context, args);
            };
        };


        $('#searchModal').modal({
            show: false
        });


        $('#searchModal').on('shown.bs.modal', function() {
            $('#buscadorInput').focus();
        });

        searchTrigger.addEventListener('click', () => {
            $('#searchModal').modal('show');
        });

        buscadorInput.addEventListener('keyup', debounce(filtrarProductos, 1000));

        function filtrarProductos() {
            const resultados = buscarEnArreglo(buscadorInput.value, allProducts, allProducts);
            if (resultados.length > 0) {
                let htmlContent = '';
                resultados.forEach(item => {
                    let imgUrl = '';
                    let button = '';
                    if (item.imagenProducto === null) {
                        imgUrl = 'assets/images/carta/categorias/default.jpg';
                    } else {
                        imgUrl = 'assets/images/carta/platos/' + item.imagenProducto;
                    }

                    if (item.stock === 'YES') {
                        button = '<button class="btn btn-warning btn-sm">Comprar</button>';
                    } else {
                        button =
                            '<button disabled class="btn btn-warning btn-sm">Comprar</button><small class="d-block text-danger">Agotado</small>';
                    }


                    htmlContent += `<div class="card defaul-card mb-3 w-100">
                        <div class="row no-gutters">
                            <div class="col-4">
                                <img src="${imgUrl}"
                                     class="card-img" alt="...">
                            </div>
                            <div class="col-8">
                                <div class="card-body p-1">
                                    <small class="d-block mb-2 text-center"><strong class="tituloProducto">${item.nombreProducto}</strong></small>
                                        <div class="text-center">

                                            <strong class="tituloProducto badge badge-dark">S/. ${item.precioProducto}</strong>
                                        </div>


                                    <form action="script/cartAction.php">
                                        <input type="hidden" name="action" value="addToCart">
                                        <input type="hidden" name="id" value="${item.idProducto}">

                                        <div class="input-group mb-3">

                                            <div class="input-group-prepend input-group-append mr-auto ml-auto">
                                                <button onclick="changeQty(this,'minus')"
                                                        class="btn btn-sm"
                                                        type="button"><i
                                                            class="fas fa-minus"></i></button>
                                                <input name="cantidad" required onkeypress="return solonumeros(event);" type="number"
                                                       minlength="1"
                                                       class="form-control text-center" min="1" style="width: 50px"
                                                       value="1">
                                                <button onclick="changeQty(this,'add')" type="button"
                                                        class="btn btn-sm"><i
                                                            class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="text-center">${button}</div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>`
                });

                searchResultContainer.innerHTML = htmlContent;
            } else {

            }


        }

        function buscarEnArreglo(param, myArray) {
            if (param.length <= 0) {
                return [];
            }
            const parametro = param.toLowerCase();
            return myArray.filter(e => e.nombreProducto.toLowerCase().indexOf(parametro) >= 0);
        }
    </script>
@endsection
