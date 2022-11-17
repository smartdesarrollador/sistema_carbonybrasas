@extends('layout.layout.layout')
 
@section('titulo', 'Gift Carts')
 
@section('sidebar')
    @parent
 
    <p>Sidebar</p>
@endsection
 
@section('contenido')
@if (isset($lista_email))
<p>Gift Carts {{ $lista_email->nombre }}</p>
@else
<p>Gift Carts</p>
@endif
    
@endsection