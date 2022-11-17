@extends('layout.layout.layout')

@section('titulo', 'Mi Cuenta')



@section('contenido')

    <div class="container  animated fadeIn slow mb-5">

        @if ($datos_actualizados == 'true')
            <div class="alert alert-success  alert-dismissible fade show animated tada slow text-center" role="alert">
                <strong>Correcto!</strong> datos personales actualizados correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-12 col-sm-12 col-md-3 col-xl-3 col-lg-3 p-2 p-sm-2 p-md-1 p-xl-4 p-lg-4">
                <div class="card card-richard" style="width: 100%;">
                    <div class="card-body text-center">
                        <img src="assets/img/icons/usuario.png" alt="" style="width: 100px">
                        <h6 class="font-weight-lighter mt-1">{{ $clienteActual->nombre }} {{ $clienteActual->apellido }}
                        </h6>
                        <h5>Bienvenido a Carbon y Brasas</h5>
                    </div>
                </div>
                <div class="card card-richard mt-2 mt-sm-2 mt-md-3 mt-xl-4 mt-lg-4" style="width: 100%;">
                    <div class="card-body text-center">


                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#home"
                                role="tab" aria-controls="home" aria-selected="true">Billetera Virtual</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Perfil</a>
                            <!--<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#messages" role="tab"
                                       aria-controls="messages" aria-selected="false">Mis Pedidos</a>-->
                            <a href="script/logout.php" class="nav-link">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
