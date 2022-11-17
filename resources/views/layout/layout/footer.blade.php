<section id="footer">
    <div class="container">
        <div class="row  text-sm-left text-md-left mt-5 pt-5">
            <!-- inicio -->
            <div class="col-md-3 mt-md-0">
                <h5 class="text-white">Carbon y Brasas</h5>
                <a href="index.php"><img src="{{ asset('assets/img/index/logo.png') }}" style="width:100px"></a>
                <div class="text-center text-md-left text-white">
                    <h5>Siguenos en:</h5>
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/polleriacarbonybrasas/" target="_blank"
                                class="btn-floating btn-sm rgba-white-slight " style="font-size:30px">
                                <i class="fab fa-facebook" style="color:#ffffff;font-size:2.5rem"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://instagram.com/" target="_blank"
                                class="btn-floating btn-sm rgba-white-slight mx-1" style="font-size:30px">
                                <i class="fab fa-instagram" style="color:#ffffff;font-size:2.5rem"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 mb-md-0 mb-3 text-white">
                <h5 class="text-uppercase">Sobre Nosotros</h5>
                <ul class="list-unstyled ">
                    <!-- <li><a class="text-white text-decoration-none" href="#">Nuestra Historia</a></li> -->
                    <li><a class="text-white text-decoration-none" href="{{ url('/carta') }}">Nuestra Carta</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ url('/contacto') }}">Contactanos</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ url('/') }}">Inicio</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-md-0 mb-3 text-white">
                <h5 class="text-uppercase">Atención al Usuario</h5>
                <ul class="list-unstyled">
                    <li><a class="text-white text-decoration-none" href="{{ url('/libro-reclamaciones') }}">Libro de
                            Reclamaciones</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ url('/terminos') }}">Términos y Condiciones
                            Online</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ url('/politica-privacidad') }}">Políticas de
                            Privacidad</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-md-0 mb-3 text-white">
                <h5 class="text-uppercase">CONTACTO</h5>
                <ul class="list-unstyled">
                    <li><a class="text-white text-decoration-none" href="#!"><i class="fas fa-map-marker-alt mr-2"
                                style="font-size:20px"></i>AV. CORONEL JOSE LEAL NRO. 649 URB. RISSO - LINCE</a></li>
                    <li><a class="text-white text-decoration-none" href="#!"><i class="fas fa-envelope mr-2"
                                style="font-size:20px"></i>reservaciones@carbonybrasas.pe</a></li>
                    <!--  <li><a class="text-white text-decoration-none" href="#!"><i class="fas fa-phone mr-2" style="font-size:20px"></i>01-000000</a></li> -->
                    <li><a class="text-white text-decoration-none"
                            href="https://api.whatsapp.com/send?phone=51950293079&text=Hola%20quiero%20hacer%20un%20pedido"
                            target="_blank"><i class="fab fa-whatsapp mr-2" style="font-size:25px"></i>950293079</a>
                    </li>
                </ul>
            </div>
            <!-- fin -->


        </div>
        <div class="row">
            <div class="d-none d-sm-none d-md-block col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
                <ul class=" list-unstyled list-inline social ">
                    <li class="list-inline-item"><a href="https://www.facebook.com/polleriacarbonybrasas/"
                            target="_blank"><i class="fab fa-facebook-square"></i></a></li>


                    <li class="list-inline-item"><a href="mailto:reservaciones@carbonybrasas.pe" target="_blank"><i
                                class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <br>
                <p class="h6"><a class="text-green ml-2" href="https://enfocussoluciones.com"
                        target="_blank"><strong>&copy; Carbon y Brasas | Desarrollado por Enfocus
                            Soluciones</strong></a>
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="modalStoreSelector">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="text-center m-auto">CAMBIAR DIRECCIÓN <img class="mb-2" src="assets/img/egypt.png"
                        alt="" style="width: 35px"></h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="col" id="formStoreSelector">

                        <input type="hidden" id="hiddenLatInput">
                        <input type="hidden" id="hiddenLngInput">
                        <div class="row justify-content-center">
                            <div class="col-12">




                                <div class="row">
                                    <div class="col">
                                        <h5>Tu lugar de despacho es:</h5>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <ul>
                                            <li>
                                                <h5>
                                                    <!-- Definir variable tiendaFooter -->
                                                </h5>
                                            </li>
                                        </ul>

                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col">
                                        <h5>Tipo de pedido</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <input onclick="selectShippinMethodClick(this)" value="DELIVERY"
                                            name="tipoReparto" checked class="d-none" type="radio"
                                            id="storeSelectorDelivery">
                                        <label for="storeSelectorDelivery"
                                            class="ingrediente-button w-100 align-self-end mt-auto text-center">Delivery
                                        </label>
                                    </div>
                                    <div class="col">
                                        <input onclick="selectShippinMethodClick(this)" value="RECOJO"
                                            name="tipoReparto" class="d-none" type="radio"
                                            id="storeSelectorRecojo">
                                        <label for="storeSelectorRecojo"
                                            class="ingrediente-button w-100 align-self-end mt-auto text-center">Recojo
                                            en tienda
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row justify-content-center d-none" id="deliveryInputContainer">
                            <div class="col-12">
                                <h5>Tu dirección</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control text-center" id="storeSelectorInput">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center d-none" id="recojoInputContainer">
                            <div class="text-center col-12">
                                <!-- <h5>Selecciona un Local</h5>
                                <div class="form-group">
                                    <select name="selectStoreSelector" id="selectStoreSelector"
                                            class="form-control text-center">
                                        <option disabled selected>Selecciona un Local</option>
                                        <option value="1">Julio Cesar Tello 872 - Lince</option>
                                        <option value="2">Av. El Polo 121 - Surco</option>
                                    </select>
                                </div> -->

                                <label class="" for="">Local de recojo: Brigadier Pumacahua 2321</label>
                                <input type="hidden" value="1" name="selectStoreSelector"
                                    id="selectStoreSelector">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 id="map-titleStore" class="d-none">Precisa tu ubicación</h5>
                                <div id="mapStoreSelector"></div>
                            </div>
                        </div>


                        <div class="text-center mt-5">
                            <button id="saveAddressInformationBtn" type="submit"
                                class="btn btn-primary btn-block btn-lg">Guardar
                            </button>
                            <a id="btnCloseAddressSelectorModal" data-dismiss="modal"
                                class="btn btn-outline-primary btn-block btn-lg">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!--Spinner de carga-->
<div style="display: none" id="loading" class="loading">Loading&#8230;</div>
