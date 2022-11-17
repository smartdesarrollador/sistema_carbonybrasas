@extends('layout.layout.layout')

@section('titulo', 'Izipay')

@section('scripts_head')
    <!-- Javascript library. Should be loaded in head section -->
    <script src="{{ $client->getClientEndpoint() }}/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
        kr-public-key="{{ $client->getPublicKey() }}" kr-post-url-success="{{ $path }}paid.php"></script>

    <!-- theme and plugins. should be loaded after the javascript library -->
    <!-- not mandatory but helps to have a nice payment form out of the box -->
    <link rel="stylesheet" href="{{ $client->getClientEndpoint() }}/static/js/krypton-client/V4.0/ext/classic-reset.css">
    <script src="{{ $client->getClientEndpoint() }}/static/js/krypton-client/V4.0/ext/classic.js"></script>
@endsection

@section('contenido')

    <h1>Izipay</h1>

    <div class="kr-embedded" kr-form-token="{{ $formToken }}">

        <!-- payment form fields -->
        <div class="kr-pan"></div>
        <div class="kr-expiry"></div>
        <div class="kr-security-code"></div>

        <!-- payment form submit button -->
        <button class="kr-payment-button"></button>

        <!-- error zone -->
        <div class="kr-form-error"></div>
    </div>
@stop
