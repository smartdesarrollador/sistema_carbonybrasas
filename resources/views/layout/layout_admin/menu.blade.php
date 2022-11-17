<audio id="myAudio">
    <source src="{{ asset('admin_assets/sound/alarma-morning-mix.mp3') }}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
<div class="navbar-fixed black">
    <nav class="animated ">
        <div class="nav-wrapper" style="background-color:#D01317;">
            <div class="container">
                <a href="./" class="brand-logo deep-orange-text logoWSFPC center-align">
                    <img class="logoWSFPCImagen" src="{{ asset('admin_assets/img/logoMain.png') }}" alt="">
                </a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger white-text text-darken-2"><i
                        class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">


                    <li><a href="{{ url('/admin/dashboard') }}" title="Ver los pedidos" class=""><i
                                class="material-icons left">list_alt</i> Pedidos</a>
                    </li>
                    <li><a title="Cambiar Configuraciones de la tienda" href="{{ url('/admin/tienda') }}"
                            class=""><i class="material-icons left">store</i> Tienda</a></li>
                    <li><a href="{{ url('/admin/productos') }}" class=""><i class="material-icons left">restaurant
                            </i> Productos</a>
                    </li>

                    <li><a href="usuarios" class=""><i class="material-icons left">
                                supervisor_account
                            </i> Usuarios</a>
                    </li>
                    <li><a href="calidad" class=""><i class="material-icons left">security
                            </i> Calidad</a>
                    </li>
                    <li><a href="reportes" class=""><i class="material-icons left">insert_chart_outlined
                            </i> Reportes</a>
                    </li>


                    <li><a class=" white-text capitalize" href="#!"><strong>Hola, {{ session('current_fullName') }}
                            </strong></a></li>
                    <li><a title="Cerrar Sesión" onclick="return confirm('Estas Seguro?');"
                            class=" white-text capitalize" href="{{ route('admin.script.logout') }}"><strong><i class="material-icons">
                                    power_settings_new
                                </i></strong></a></li>


                </ul>
            </div>
        </div>

    </nav>
</div>

<ul class="sidenav " id="mobile-demo">
    <h2 class="deep-orange-text center-align"><img src="{{ asset('admin_assets/img/logoMain.png') }}" width="40%"
            alt=""></h2>

    <li class="divider"></li>
    <li class="center-align">
        <p href="#" class="capitalize">Hola, {{ session('current_fullName') }}</p>
    </li>


    <li class="divider"></li>

    <li class="center-align">
        <a href="./" class=""><i class="material-icons left">list_alt</i>Pedidos</a>
    </li>
    <li class="divider"></li>


    <li class="center-align">
        <a href="tienda" class=""><i class="material-icons left">store</i>Tienda</a>
    </li>
    <li class="divider"></li>
    <li class="center-align">
        <a href="productos" class=""><i class="material-icons">restaurant
            </i>Productos</a>
    </li>
    <li class="divider"></li>
    <li class="center-align">
        <a href="usuarios" class=""><i class="material-icons">supervisor_account
            </i>Usuarios</a>
    </li>
    <li class="divider"></li>
    <li class="center-align">
        <a href="calidad" class=""><i class="material-icons">security
            </i>Calidad</a>
    </li>
    <li class="divider"></li>
    <li class="center-align">
        <a href="reportes" class=""><i class="material-icons">insert_chart_outlined
            </i>reportes</a>
    </li>
    <li class="divider"></li>


    <li class="center-align"><a href="{{ route('admin.script.logout') }}"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
    <li class="divider"></li>

</ul>
