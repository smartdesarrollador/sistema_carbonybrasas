@extends('layout.layout.layout')

@section('titulo', 'Crud Test')

@section('contenido')

 <h1>Crud</h1>

 <form action="{{ route("crud.store") }}" method="POST">
    @csrf
    <input type="text" name="nombre" value="">
    <input type="text" name="imageUrl" value="">
    <button type="submit">Send</button>

 </form>
  
@stop