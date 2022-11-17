@extends('layout.layout.layout')
 
@section('titulo', 'Cliente Test')
 
@section('contenido')
<form method="POST" action="{{ route('Test.Main.clienteTest') }}">
    @csrf
 
    <input id="title"
    type="text"
    class="@error('title') is-invalid @enderror">

    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</form>
    
@endsection