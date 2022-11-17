<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>@yield('titulo_admin')</title>
    @include('layout.layout_admin.metas')
    <meta name="title" content="@yield('meta_title')">
    @include('layout.layout_admin.links')
    @section('links_admin')
    @show
    @include('layout.layout_admin.scripts_head')

    @section('scripts_head_admin')
    @show

    @section('styles_admin')
    @show

</head>

<body>

    @include('layout.layout_admin.menu')

    @yield('contenido_admin')
    @section('scripts_dashboard_admin')
    @show
    @include('layout.layout_admin.footer')

    @include('layout.layout_admin.scripts')
    @section('scripts_admin')
    @show



</body>

</html>
