@extends('layout.layout_admin.layout_login_admin.layout')

@section('titulo_login_admin', 'Login Admin')

@section('contenido_login_admin')

    <div class="login-page">
        <div class="form" style="background-color: #D01317;">
            <h5> <img width="70%" src="{{ asset('admin_assets/img/logoMain.png') }}"> </h5>
            <form class="login-form" method="post" action="{{ route('admin.script.validar_sesion') }}">
                @csrf
                <input style="text-transform: lowercase" required type="text" name="email" placeholder="email"
                    autocomplete="on" />
                <input required type="password" name="password" placeholder="password" autocomplete="on" />
                <input type="hidden" name="code" value="{{ session()->getId() }}" />
                <button name="submit" type="submit">login</button>

            </form>
        </div>
    </div>


@stop
