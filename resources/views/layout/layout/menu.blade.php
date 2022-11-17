<nav class="navbar  navbar-expand-lg pt-0 pb-0"
    style="background:#D01317;border-bottom:3px solid #ffffff; position:sticky;top:0px;z-index:100;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/images/logoMain.png') }}"
                style="width:100px"></a>

        <!-- <button class="btn d-block d-sm-block  d-lg-none" type="button">
             <span><i class="fas fa-phone-volume " style="color:#ffffff;font-size:1.5rem"></i>
            <br><label style="color:#ffffff;font-size:0.8rem">01-5970536</label></span>
        </button> -->

        <a href="pago.php" class="btn d-block d-sm-block  d-lg-none">
            <span><i class="fa fa-shopping-cart " style="color:#ffffff;font-size:2rem" aria-hidden="true"></i></span>


        </a>

        <button class="btn d-block d-sm-block  d-lg-none" type="button" data-toggle="collapse"
            data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span><i class="fas fa-bars" style="color:#ffffff;font-size:35px;"></i></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class=" nav-link" href="{{ url('/promociones') }}"
                        style="color:aliceblue;font-size:20px;">
                        Promociones</a></li>

                <li class="nav-item"><a class="nav-link" href="{{ url('/carta') }}"
                        style="color:aliceblue;font-size:20px;">
                        Carta</a>
                </li>

            </ul>

            <ul class="navbar-inline my-2 my-lg-0">

                <a href="{{ url('/carrito') }}" class="text-white d-inline  my-2 my-sm-0 px-1"
                    style="font-size:1rem;font-weight: bold;" type="submit"><i class="fas fa-shopping-cart mr-1"></i>Mi
                    orden</a>
                <div class="d-inline">



                    @if (session('estado_cliente') == 'true')
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle myAccount d-inline"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <h6 class="dropdown-header">Hola {{ session('current_customer_nombre') }} </h6>

                                <div class="dropdown-divider"></div>

                                <button onclick="location.href = '{{ route('login.mi-cuenta') }}';"
                                    class="dropdown-item" type="button">
                                    Mi cuenta
                                </button>

                                <button onclick="location.href = '{{ route('login.logout') }}'" class="dropdown-item"
                                    type="button">
                                    Cerrar Sesión
                                </button>

                            </div>
                        </div>
                    @else
                        <a class="btn btn-light my-2 pr-5 pl-5 my-sm-0" role="button" data-target="#login-modal"
                            data-toggle="modal" href="#"
                            style="font-size:1rem;font-weight:bold;border-radius:10px;"><i class="fas fa-user mr-1"></i>
                            Ingresar</a>
                    @endif




                </div>


            </ul>
        </div>
    </div>
</nav>

<!--modal de login-->
<div class="modal fade " id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <img class="img-circle" id="img_logo" src="assets/images/logoMain.png" alt="Logo Carbon y Brasas">
                <button type="button" class=" btn btn-dark" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Begin # DIV Form -->
            <div id="div-forms">

                <!-- Begin # Login Form -->
                <form id="login-form" method="post" action="{{ route('login.verificar') }}">
                    @csrf
                    <div class="modal-body">
                        <div id="div-login-msg" class="text-center">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <h5 id="text-login-msg">Ingresa tu Correo y Contraseña</h5>
                        </div>
                        <input style="text-transform: lowercase" name="correo" id="login_username"
                            class="form-control" type="email" placeholder="Correo" required>
                        <input name="contrasena" id="login_password" class="form-control" type="password"
                            placeholder="Contraseña" required>

                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-danger btn-lg btn-block">Iniciar</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Olvidaste tu contraseña?
                            </button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Registrarse</button>
                        </div>
                    </div>
                    <hr>

                    <div class="row mb-3 ">
                        <div class="col text-center px-5 py-2">

                            <div id="gSignInWrapper">
                                <div id="customBtn" class="customGPlusSignIn">
                                    <span class="icon"></span>
                                    <span class="buttonText">Ingresar con Google</span>
                                </div>
                            </div>
                            <div id="name"></div>
                            <script>
                                startApp();
                            </script>
                        </div>
                    </div>

                </form>
                <!-- End # Login Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;" action="script/passwordRecovery.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-12 col-sm-12 text-center">
                                <div id="div-lost-msg" class="text-center" style="margin-bottom: 20px">
                                    <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                                    <h5 id="text-lost-msg">Ingresa tu Correo para recuperar tu contraseña</h5>
                                </div>
                            </div>
                        </div>

                        <input style="text-transform: lowercase" id="lost_email" class="form-control" type="email"
                            name="lostEmail" placeholder="Correo" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-dark btn-lg btn-block">Enviar</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Iniciar</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Registrarse</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->

                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;" method="post"
                    action="{{ route('login.register') }}">
                    @csrf
                    <div class="modal-body">
                        <div id="div-register-msg" class="text-center">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right text-center"></div>
                            <h4 class="mb-2" id="text-register-msg">Regístrate</h4>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="register_username">Nombres</label>
                                <input id="register_username" class="form-control m-0" type="text"
                                    aria-describedby="nombreHelper" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+"
                                    name="nombre" required>
                                <small id="nombreHelper" class="form-text text-muted">
                                    Ingresa tu nombre
                                </small>

                            </div>
                            <div class="col">

                                <label for="register_lastName">Apellidos</label>
                                <input id="register_lastName" class="form-control m-0" type="text"
                                    aria-describedby="apellidoHelper" pattern="[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]+"
                                    name="apellido" required>
                                <small id="apellidoHelper" class="form-text text-muted">
                                    Ingresa tus apellidos
                                </small>

                            </div>


                        </div>

                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <label for="register_email">Correo Electrónico</label>
                            <input onkeyup="toLowerCase(this)" id="register_email" name="correo"
                                class="form-control m-0" aria-describedby="correoHelper" type="email" required>
                            <small id="correoHelper" class="form-text text-muted">
                                Ingresa tu correo electrónico
                            </small>

                        </div>
                        <div class="form-group">
                            <label for="register_phoneNumber">Numero de Celular</label>
                            <input name="celular" id="register_phoneNumber" class="form-control m-0" type="text"
                                onkeypress="return solonumeros(event);" maxlength="15"
                                aria-describedby="phoneNumberHelper" required>
                            <small id="phoneNumberHelper" class="form-text text-muted">
                                Ingresa tu Numero de Celular
                            </small>

                        </div>
                        <div class="form-group">
                            <label for="register_password">Contraseña</label>
                            <input name="password" id="register_password" class="form-control m-0" type="password"
                                aria-describedby="passwordHelper" required>
                            <small id="passwordHelper" class="form-text text-muted">
                                Ingresa tu correo Contraseña
                            </small>

                        </div>
                        <div class="form-group">
                            <label for="register_password2">Repite tu contraseña</label>
                            <input id="register_password2" class="form-control m-0" type="password"
                                placeholder="Repite tu contraseña" aria-describedby="password2Helper" required>
                            <small id="password2Helper" class="form-text text-muted">
                                Repite tu Contraseña
                            </small>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-dark btn-lg btn-block">Registrarse</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Iniciar</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Olvidaste tu
                                contraseña?
                            </button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->

            </div>
            <!-- End # DIV Form -->

        </div>
    </div>

</div>
