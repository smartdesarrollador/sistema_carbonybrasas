@extends('layout.layout.layout')

@section('titulo', 'Payment Success')



@section('contenido')
    <div class="container main-container animated fadeIn slow mb-5">
        <div class="row mb-3 justify-content-center">
            <div class="col-6 col-sm-6 col-md-4 col-xl-3 col-lg-3 text-center">
                <img class="img-fluid" src="{{ asset('assets/img/success.png') }}" alt="">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col font-weight-bolder">
                <h2 class="text-success text-center">¡Tu pedido ha sido realizado con éxito!</h2>
                <h5 class="text-success text-center">Los pedidos con recojo en tienda se atienden dentro de 30 a 40 minutos
                    de haber realizado tu compra.</h5>

            </div>
        </div>
        <div class="row mb-3 justify-content-center">
            <div class="col-11 col-sm-11 col-md-6 col-xl-4 col-lg-4">
                <table class="table">
                    <tbody>
                        <tr>


                            <td>Codigo: </td>
                            <td>{{ $id_Pedido }}</td>

                        </tr>
                        <tr>


                            <td>Dirección de entrega:</td>
                            <td>{{ $pedido->direccionPedido }}</td>
                        </tr>
                        <tr>
                            <td>Fijo / Celular:</td>
                            <td>{{ $pedido->pedidoTelefono }}</td>
                        </tr>
                        <tr>
                            <td>Pedido:</td>
                            <td>
                                @foreach ($pedidoItems as $item)
                                    <ul>
                                        <li><small>{{ $item->nombreProducto }}(x {{ $item->cantidad }})</small></li>
                                    </ul>
                                @endforeach

                            </td>
                        </tr>
                        <tr>
                            <td>Precio Total:</td>
                            <td><strong>S/. {{ $pedido->precioTotal }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col text-center">
                <a href="{{ route('carta') }}" class="btn btn-secondary">Volver a la carta</a>
            </div>
        </div>

    </div>

@endsection
