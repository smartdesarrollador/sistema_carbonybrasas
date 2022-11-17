@extends('layout.layout.layout')

@section('titulo', 'Validar Sesion')

@section('contenido')

    <p>Validar Sesion</p>

    <p>{{ $estado_sesion }}</p>

    @include('test.sesiones.enlaces')
@stop
