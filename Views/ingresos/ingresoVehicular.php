<div class="container col-6 conteiner-principal card">
    <div class="card card-h4">
        <p class="title-prinicpal">INGRESO DE VEHICULO</p>

    </div>
    <div class="conteiner-ingreso">
        <form class="row" method="POST" enctype="multipart/form-data" method="http://localhost:3000/?controller=ingresos&method=insertar">
            <div class="col-6 conteiner-left">
                <div class="card">
                    <div class="card-header">
                        Datos del Vehiculo
                    </div>
                    <div class="card-body">
                        <!-- Formulario de agragar servicios -->
                        <!-- multipart :El formulario acepte la reseccion de imagenes o archivos -->


                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="placa" placeholder="Placa del vehiculo" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="marca" placeholder="Marca del vehiculo" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="linea" placeholder="Linea del vehiculo" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="modelo" placeholder="Modelo del vehiculo" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="tipo" placeholder="Tipo del vehiculo" required>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

            </div>

            <div class="col-6 conteiner-right">

                <div class="card">
                    <div class="card-header">
                        Datos del Mantenimiento
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="nuid" placeholder="Identificación del mantenimiento" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="nombre" placeholder="Nombre del mantenimiento" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="apellido" placeholder="Apellido del mantenimiento" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="genero" placeholder="Genero del mantenimiento" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="telefono" placeholder="Telefono del mantenimiento">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="correo" placeholder="Correo del mantenimiento">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="direccion" placeholder="Dirección del mantenimiento">
                                </div>
                            </div>
                        </div>




                        <button name="registrar_vehiculo" type="submit" class="col-12 btn btn-success registrar_vehiculo">Registrar Vehiculo</button>


                    </div>
                </div>

            </div>

        </form>
    </div>





    <div class="conteiner-servicios">
        <div class="row">

            <div class="col-8">
                <div class="form-group">
                    <select class="seleccionador form-control" name="" id="">

                        <?php

                        require_once "./models/Servicio.php";
                        $s = new Servicio();
                        $array = $s->mostrarServicios();


                        foreach ($array as $row) { ?>
                            <option> <?php echo " |".$row[0] . "| - |" . $row[1] . "| - |" . $row[2]."|"; ?> </option>
                        <?php }

                        ?>


                    </select>
                </div>
            </div>

            <div class="col-4">
                <button name="agregar_servicio" type="submit" class="col-12 btn btn-success agregar_servicio">Agregar Mantenimiento</button>
            </div>
        </div>
    </div>

    <div class="conteiner-list">
        <div class="col-12 form-group">
            <textarea class="form-control lista" name="" id="" rows="3"></textarea>
        </div>
    </div>

    <div class="conteiner-buttons">
        <div class="row">
            <div class="col-8">
                <button name="ingresar_vehiculo" type="submit" class="col-12 btn btn-success ingresar_vehiculo">Ingresar Vehiculo</button>
            </div>
            <div class="col-4">
                <button name="cancelar" type="submit" class="col-12 btn btn-success cancelar">Cancelar</button>

            </div>
        </div>




    </div>

</div>