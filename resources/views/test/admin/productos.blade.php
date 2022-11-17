@extends('layout.layout.layout')

@section('titulo', 'Productos')

@section('contenido')

 <h1>Contenido</h1>

 @foreach ($productos as $producto)
    <p>This is user {{ $producto->nombreProducto }}</p>
@endforeach
  
@stop