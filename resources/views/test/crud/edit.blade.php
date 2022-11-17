@extends('layout.layout.layout')

@section('titulo', 'Edit Crud Test')

@section('contenido')

 <h1>Edit Test</h1>

 <form action="{{ route("crud.update", $categoria->idTipoProducto) }}" method="POST">
   @csrf
   @method('put')
   <input type="text" name="nombre" value="{{ $categoria->nombre }}">
   <input type="text" name="imageUrl" value="{{ $categoria->imageUrl }}">
    <button type="submit">Send</button>
    
 </form>
  
@stop