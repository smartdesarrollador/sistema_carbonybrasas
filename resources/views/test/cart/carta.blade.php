@extends('layout.layout.layout')

@section('titulo', 'Test Carta')

@section('contenido')

 <h1>Test Carta</h1>

 <a href="{{ url('test/cart_action/1') }}">Agregar Carrito</a>
  
@stop