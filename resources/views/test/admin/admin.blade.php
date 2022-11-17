@extends('layout.layout.layout')

@section('titulo', 'Admin')

@section('contenido')

 <h1>Contenido</h1>

 @foreach ($admin as $adm)
    <p>This is user {{ $adm->nombre }}</p>
@endforeach
  
@stop