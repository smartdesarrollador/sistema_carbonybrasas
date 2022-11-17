@extends('layout.layout.layout')

@section('titulo', 'Contacto')

@section('scripts_head')
    <link rel="stylesheet" href="{{ asset('assets/css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/contacto.css') }}">
@endsection

@section('contenido')

    <section class="content-info py-5">
        <div class="container py-md-5">
            <div class="text-center px-lg-5">
                <h3 class="heading text-center mb-3 mb-sm-5 satisfy">Contáctanos</h3>

                <div class="title-desc text-center px-lg-5">

                    <p>reservaciones@carbonybrasas.pe</p>
                    <p><i class="fas fa-phone"></i> 950293079
                    </p>
                    <p></p>
                    <!-- <p>
                                        <i class="fas fa-map-marker-alt"></i> AV. CORONEL JOSE LEAL NRO. 649 URB. RISSO
                                    </p> -->
                    <p>
                        <i class="fas fa-map-marker-alt"></i> AV. CORONEL JOSE LEAL NRO. 649 URB. RISSO
                    </p>
                    <!--    <p>
                                        <i class="fas fa-map-marker-alt"></i> Avenida Ignacio Merino 2331
                                    </p> -->
                    <p>Lince, Lima - Perú</p>

                </div>
            </div>
            <div class="contact-w3pvt-form mt-5">
                <form action="script/sendMail.php" class="w3layouts-contact-fm" method="post">
                    <div class="row">
                        <div class="col-lg-6" style="">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="nombres" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Apellido</label>
                                <input class="form-control" type="text" name="apellidos" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input style="text-transform: none !important;" class="form-control" type="email"
                                    name="correo" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Numero de Contacto</label>
                                <input style="text-transform: none !important;" class="form-control soloNumeros"
                                    type="text" name="celular" placeholder="" required="" min="1">

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Escribe tu Mensaje</label>
                                <textarea class="form-control" name="mensaje" placeholder="" required=""></textarea>


                            </div>
                        </div>

                        <div class="col-lg-12 text-center">
                            <div style="display: inline-block" data-theme="dark" class="g-recaptcha "
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

    <div class="container">
        <div class="row mb-3">
            <div class="col">

                <iframe src="https://www.google.com/maps/d/embed?mid=1URZaous2RvEiNhfJci9AeYMtn9dwO58&ehbc=2E312F"
                    width="100%" height="480"></iframe>
            </div>
        </div>
    </div>

@endsection

@section('script_contacto')
    <script>
        jQuery('.soloNumeros').keypress(function(tecla) {
            if (tecla.charCode < 48 || tecla.charCode > 57) {
                return false;
            }

        });
    </script>
@endsection
