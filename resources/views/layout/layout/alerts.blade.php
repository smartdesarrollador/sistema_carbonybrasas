@if(isset($code))

        @if($code == "emailExiste")
        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
        <div class="alert alert-danger emailExiste alert-dismissible fade show text-center animated tada slow" role="alert">
            <strong>Error!</strong> El correo ya esta registrado.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>


        </div>
        </div>
        @endif
        @if($code == "incorrectPass")
        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
        <div class="alert alert-danger emailExiste alert-dismissible fade show text-center animated tada slow" role="alert">
            <strong>Error!</strong> Tu contraseña es incorrecta, intentalo de nuevo.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
        @endif
        @if($code == "notExistUser")
        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  text-center animated tada slow">
        <div class="alert alert-danger emailExiste alert-dismissible fade show" role="alert">
            <strong>Error!</strong> El Correo no existe,por favor regístrate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
        @endif
        @if($code == "sendResetMail")
        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
        <div class="alert alert-success  alert-dismissible fade show animated tada slow" role="alert">
            <strong>Correcto!</strong> Se ha enviado un link de recuperación a tu correo.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>  
        @endif
        @if($code == "passChanged")
        <div style="position: fixed;z-index: 999;margin-top: 20px " class="container alertaCorreo  ">
        <div class="alert alert-success  alert-dismissible fade show animated tada slow" role="alert">
            <strong>Correcto!</strong> Se ha cambiado la contraseña correctamente.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
        @endif


@else


@endif
