@extends('layout.layout.layout')

@section('titulo', 'Recuperar Sesion')

@section('contenido')

    <p>Recuperar Sesion</p>

    <p>Valor de Sesion: {{ session('key') }}</p>

    @include('test.sesiones.enlaces')

@stop
