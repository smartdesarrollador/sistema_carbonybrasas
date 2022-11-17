@extends('layout.layout.layout')

@section('titulo', 'Alert test')

@section('contenido')

    <div class="container mx auto">
        <x-alert color="danger" mensaje="No existe el usuario" />
        <br>
        <x-alert />
    </div>
@endsection
