<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container ">
        <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
        <hr>

        <!-- ROW FORM START -->
        <div class="row">
            <!-- COL FORM START -->
            <div class="col">
                <!-- CARD FORM START -->
                <div class="card">

                    <div class="card-body">

                        <!-- FORM START -->


                        <div class="row">

                            <input name="idService" type="hidden" id="idService">

                            <div class="col-6 col-md-2" style="height: 90px;">
                                <div class="form-group">
                                    <label for="placa">Placa:</label>
                                    <input type="text" class="form-control" name="placa" id="placa" autocomplete="off" placeholder="Placa del vehiculo">
                                </div>
                            </div>

                            <div class="col-6 col-md-1" style="height: 90px;">
                                <div class="form-group">
                                    <button style="position: relative; top: 29px; right: 18px; padding: 5px 10px;" id="buscar_vehiculo" class="btn btn-outline-primary my-2 my-sm-0" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>

                            <div class="col-6 col-md-2" style="height: 90px;">
                                <div class="form-group">
                                    <label for="marca">Marca:</label>
                                    <input disabled type="text" class="form-control" name="marca" id="marca" autocomplete="off" aria-describedby="helpId" placeholder="Marca del vehiculo">
                                </div>
                            </div>

                            <div class="col-6 col-md-2" style="height: 90px;">
                                <div class="form-group">
                                    <label for="linea">Linea:</label>
                                    <input disabled type="text" class="form-control" name="linea" id="linea" autocomplete="off" aria-describedby="helpId" placeholder="Linea del vehiculo">
                                </div>
                            </div>

                            <div class="col-6 col-md-2" style="height: 90px;">
                                <div class="form-group">
                                    <label for="modelo">Modelo:</label>
                                    <input disabled type="text" class="form-control" name="modelo" id="modelo" autocomplete="off" aria-describedby="helpId" placeholder="Modelo del vehiculo">
                                </div>
                            </div>

                            

                            <div class="col-3" style="height: 90px;">
                                <div class="card" id="tarjeta-perfil" style="top: 30px;">
                                    <img class="card-img-top" src="Assets/img/images.perfiles_mecanicos/perfil_default.jpg" alt="Default image">

                                    <div class="card-body py-0">

                                        <div class="header-card row">
                                            <div class="col-8">
                                                <span id="txtNombre" class="card-title my-0">Nombre Mec.</span>
                                                <span id="txtApellido" class="">Apellido</span>
                                            </div>

                                            <div class="col-4 px-0">
                                                <span id="txtCodigo">CODIGO</span>
                                            </div>

                                        </div>

                                        <div class="body-card">
                                            <ul style="list-style: none; padding: 0;">
                                                <li>
                                                    <h6>CC: <span>IDENTIFICACION</span></h6>
                                                </li>
                                                <li>
                                                    <h6>Genero: <span>Genero</span></h6>
                                                </li>
                                                <li>
                                                    <h6>Telefono: <span>######</span></h6>
                                                </li>
                                                <li>
                                                    <h6>Correo: <span>ejemplo@email.com</span></h6>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>


                            </div>

                            <div class="col-9" style="height: 300px;">
                                <div class="card">
                                    <div class="card-header">
                                        Servicios solicitados
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 8%">Codigo</th>
                                                    <th style="width: 30%">Nombre</th>
                                                    <th style="width: 10%">Costo</th>
                                                    <th style="width: 5%">Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="servicios_registrados">
                                                

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card">
                            <div class="card-header">
                                Producto a Registrar
                            </div>
                            <div class="card-body pb-0">
                                <div class="row">

                                    <input name="idService" type="hidden" id="idService">

                                    <div class="col-6 col-md-2" style="height: 90px;">
                                        <div class="form-group">
                                            <label for="codigo">Codigo:</label>
                                            <input type="text" class="form-control" name="codigo" id="codigo" autocomplete="off" aria-describedby="helpId" placeholder="Codigo del pdto.">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-1" style="height: 90px;">
                                        <div class="form-group">
                                            <button style="position: relative; top: 29px; right: 15px; padding: 5px 10px;" id="buscar_producto" class="btn btn-outline-warning my-2 my-sm-0" type="button"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-5" style="height: 90px;">
                                        <div class="form-group">
                                            <label for="nombre">Nombre:</label>
                                            <input disabled type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" aria-describedby="helpId" placeholder="Nombre del producto">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2" style="height: 90px;">
                                        <div class="form-group">
                                            <label for="costo">Costo:</label>
                                            <input disabled type="text" class="form-control" name="costo" id="costo" autocomplete="off" aria-describedby="helpId" placeholder="Costo del pdto.">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label for="cantidad">Cantidad</label>
                                        <input type="number" value="1" min="1" max="100" step="1" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" placeholder="Cantidad">
                                    </div>



                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                <button type="submit" name="registrar" id="registrarVehiculo" class="btn btn-warning btn-lg btn-block py-2">Agregar consumo <i style="font-size: 1.5em;" class="fas fa-cart-arrow-down"></i></button>

                            </div>
                        </div>

                        <div class="card my-4">
                            <div class="card-header">
                                Consumos Registrados
                            </div>
                            <div class="card-body pb-0">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%">Codigo</th>
                                            <th style="width: 30%">Nombre</th>
                                            <th style="width: 10%">Costo</th>
                                            <th style="width: 5%">Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-muted">
                                <div class="form-group col-5 mb-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="submit" name="registrar" id="registrarVehiculo" class="btn btn-danger btn-lg btn-block py-2">Remover consumo <i style="font-size: 1.5em;" class="far fa-trash-alt"></i></button>

                                        </div>

                                        <div class="col-6">
                                            <button type="submit" name="registrar" id="registrarVehiculo" class="btn btn-success btn-lg btn-block py-2">Actualizar <i style="font-size: 1.5em;" class="fas fa-pencil-alt"></i></button>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>





                    </div><!-- CARD BODY END -->


                </div><!-- CARD FORM END -->

            </div> <!-- COL FORM START -->

        </div><!-- ROW FORM START -->









    </div>

</main>
<!-- page-content" -->


<?php footerAdmin($data); ?>