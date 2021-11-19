<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content">

    <div class="container container-ingresos ">
        <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
        <hr>


        <form method="POST" id="Formulario">
            <div class="row elform">
                <div class="col-6">

                    <div class="card">

                        <div class="card-header">
                            Datos del Vehículo
                        </div>

                        <div class="card-body">

                            <div class="col-12">
                                <input name="" type="hidden" id="">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label " for="placa">Placa:</label>
                                    <div class="col-sm-9">

                                        <div class="row">
                                            <div class="col-10">
                                                <input type="text" class="form-control-plaintext px-2 d-inline-block" name="placa" id="placa" autocomplete="off" placeholder="Placa del vehiculo">
                                            </div>

                                            <div class="col-2">
                                                <a id="buscar_vehiculo" name="" id="" class="" role="button"><i class="fas fa-search"></i></a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="marca">Marca:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2" name="marca" id="marca" autocomplete="off" placeholder="Marca del vehiculo">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="linea">Linea:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2" name="linea" id="linea" autocomplete="off" placeholder="Linea del vehiculo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="modelo">Modelo:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2" name="modelo" id="modelo" autocomplete="off" placeholder="Modelo del vehiculo">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="tipo">Tipo:</label>
                                    <div class="col-sm-9">
                                        <select id="tipo" name="tipo" disabled class="form-control-plaintext px-2" >
                                            <option value="">Seleccione</option>
                                            <option value="A">Automovil</option>
                                            <option value="M">Motocicleta</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div id="success-msj" style="display: none; background-color: #8CC63E; text-align: center">
                        <h5 style="color: #fff; font-family: 'Bebas Neue', cursive; padding: .5em; margin: 0;"><i style="color:#fff" class="fas fa-exclamation-triangle mr-2"></i></h5>
                    </div>

                    <div id="error-msj" style="display: none; background-color: #35528C; text-align: center">
                        <h5 style="color: #fff; font-family: 'Bebas Neue', cursive; padding: .5em; margin: 0;"><i style="color:#fff" class="fas fa-exclamation-triangle mr-2"></i></h5>
                    </div>

                    <button disabled type="submit" name="registrar" id="registrarVehiculo" class="btn btn-success btn-lg btn-block my-4">Registrar Vehiculo</button>

                </div>

                <div class="col-6">

                    <div class="card">

                        <div class="card-header">
                            Datos del Propietario
                        </div>


                        <div class="card-body">

                            <div class="col-12">
                                <!-- <input name="idService" type="hidden" id="idService"> -->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="identificacion">Identificacion:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2" name="identificacion" id="identificacion" autocomplete="off" placeholder="Identificacion del propietario">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="nombres">Nombres:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2" name="nombres" id="nombres" autocomplete="off" placeholder="Nombres del propietario">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="apellidos">Apellidos:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2" name="apellidos" id="apellidos" autocomplete="off" placeholder="Apellidos del propietario">
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="genero">Genero:</label>
                                    <div class="col-sm-9">
                                        <select name="genero" id="genero" disabled class="form-control-plaintext px-2">
                                            <option value="">Seleccione</option>
                                            <option value="M">Masculino</option>
                                            <option value="F">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="telefono">Telefono:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2 contacto-group" name="telefono" id="telefono" autocomplete="off" placeholder="Telefono del propietario">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="correo">Correo:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2 contacto-group" name="correo" id="correo" autocomplete="off" placeholder="Correo del propietario">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="direccion">Direccion:</label>
                                    <div class="col-sm-9">
                                        <input disabled type="text" class="form-control-plaintext px-2 contacto-group" name="direccion" id="direccion" autocomplete="off" placeholder="Direccion del propietario">
                                    </div>
                                </div>
                            </div>


                        </div>





                    </div>

                </div>
            </div>

            <div class="row my-4">

                <div class="col-12">
                    <div class="form-group row">

                        <div class="col-sm-9">
                            <select id="servicio" name="servicio" class="form-control-plaintext px-2 py-3">

                                <?php
                  
                                require_once "Config/conection.php";

                                $conection = BD::instanciar();
                                $result = $conection->query("SELECT * FROM servicio");
                                $array = $result->fetchAll(PDO::FETCH_BOTH);

                                foreach ($array as $row) { ?>
                                    <option value="<?php echo $row[1]; ?>"><?php echo $row[1] . " - " . $row[2] . " - " . $row[4]; ?></option>
                                <?php } 
                                
                                ?>

                            </select>
                        </div>




                        <div class="col-3">
                            <button type="submit" name="registrar" id="agregarServicio" class="btn btn-warning btn-lg btn-block agregar-service">Agregar Servicio</button>
                        </div>

                    </div>



                    <div class="card my-4">
                        <div class="card-header">
                            Servicios agregados
                        </div>
                        <div class="card-body">
                            <div class="container-service" id="container-service">
                                <ul id="listar-servicios">
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div id="error-services-null" style="display: none; background-color: #35528C; text-align: center">
                        <h5 style="color: #fff; font-family: 'Bebas Neue', cursive; padding: .5em; margin: 0;"><i style="color:#fff" class="fas fa-exclamation-triangle mr-2"></i>El servicio ya se encunetra registrado.</h5>
                    </div>


                </div>
            </div>

            <div class="row">
                <button type="submit" style="color: #fff;" name="ingresarVehiculo" id="ingresarVehiculo" class="btn btn-primary btn-lg btn-block agregar-service">Ingresar Vehículo</button>
            </div>
        </form>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="contenido-modal" tabindex="-1" style="text-align: center; font-family: 'Bebas Neue';">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-size: 1.5em; color: #555;" class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body" style=" font-family: 'Roboto', sans-serif;">

                </div>
                <div class="modal-footer">
                    <button id="aceptar" class="btn btn-success px-4">Sí</button>
                    <button id="cerrar" class="btn btn-danger px-4" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL END -->

</main>
<!-- page-content" -->


<?php footerAdmin($data); ?>