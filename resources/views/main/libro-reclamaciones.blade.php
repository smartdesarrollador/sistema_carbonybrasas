@extends('layout.layout.layout')

@section('titulo', 'Libro reclamaciones')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/css/contacto.css') }}">
@endsection
@section('scripts_head')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@show



@section('contenido')

    <section class="content-info py-5">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mt-n5 mb-3 mb-sm-5" style="font-family: 'Franklin Gothic Medium', sans-serif;">
                    Libro de Reclamaciones</h3>

                <p class="mt-n4"> Le recordamos que este medio es exclusivo para Reclamos y Quejas.
                    No seran atendidos otros requerimientos que no cumplan con esta
                    naturaleza.Para consultas, sugerencias y solicitudes puede comunicarse <i class="fas fa-phone"></i>(01)
                    693 - 7012
                </p>

                <div class="title-desc text-center px-lg-5">

                    <!-- <p><i class="fas fa-map-marker-alt"></i> AV. CORONEL JOSE LEAL NRO. 649 URB. RISSO</p> -->
                    <p><i class="fas fa-map-marker-alt"></i> AV. CORONEL JOSE LEAL NRO. 649 URB. RISSO</p>
                    <!--  <p><i class="fas fa-map-marker-alt"></i> Avenida Ignacio Merino 2331</p> -->
                    <p>Lince, Lima - Perú</p>
                </div>
            </div>
            <div class="contact-w3pvt-form mt-5">
                <form action="script/sendMail.php" class="w3layouts-contact-fm" method="post">
                    <div class="row">
                        <div class="col-lg-6" style="">
                            <div class="form-group">
                                <label>Nombres</label>
                                <input class="form-control" type="text" name="nombres" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input class="form-control" type="text" name="apellidos" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Documento de identidad</label>
                                <input class="form-control" type="text" name="apellidos" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Domicilio</label>
                                <input class="form-control" type="text" name="apellidos" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input style="text-transform: none !important;" class="form-control" type="email"
                                    name="correo" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Número de Contacto</label>
                                <input style="text-transform: none !important;" class="form-control soloNumeros"
                                    type="text" name="celular" placeholder="" required="" min="1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Escribe tu Reclamo</label>
                                <textarea class="form-control" name="mensaje" placeholder="" required=""></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <div style="display: inline-block" data-theme="dark" class="g-recaptcha"
                                data-sitekey="6Ld-sMcUAAAAAEgCFmhMra757oUJfa6oKLVBijr_"></div>
                            <div class="form-group ">
                                <button name="submit" style="color: white" type="submit"
                                    class="btn submit">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

@section('libro_reclamaciones')
    <script>
        jQuery('.soloNumeros').keypress(function(tecla) {
            if (tecla.charCode < 48 || tecla.charCode > 57) {
                return false;
            }

        });
    </script>
@endsection
