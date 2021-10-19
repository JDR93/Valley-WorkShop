<?php

session_start();

if (empty($_SESSION['user'])) {
    header("Location: http://localhost/valleyworkshop");
}
?>

<?php headerAdmin($data); ?>



<div class="container col-6 conteiner-principal card">

    <div class="card title-prinicpal">
        <p>INGRESO DE VEHICULO</p>
    </div>

    <div class="conteiner-ingreso">
        <form class="row" method="POST" enctype="multipart/form-data" method="<?php echo base_url() ?>/Views/ingresos/insertar.php">
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
                        Datos del Propietario
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="nuid" placeholder="Identificación del propietario" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="nombre" placeholder="Nombre del propietario" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="apellido" placeholder="Apellido del propietario" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="genero" placeholder="Genero del propietario" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="telefono" placeholder="Telefono del propietario">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="correo" placeholder="Correo del propietario">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-12">
                                    <input type="text" class="form-control" id="txtID" name="direccion" placeholder="Dirección del propietario">
                                </div>
                            </div>
                        </div>




                        <button name="registrar_vehiculo" type="submit" class="col-12 btn btn-success registrar_vehiculo">Registrar Vehiculo</button>


                    </div>
                </div>

            </div>

        </form>
    </div>

    <div class="conteiner-servicios col-12">


        <div class="image-container">
            <div class="scroll-horizontal">
                <div class="image-group">
                    <div class="image-placeholer">
                    </div>
                    <!--
                    <div class="image-placeholer">
                        <button name="agregar_servicio" type="submit" class="agregar_servicio fas fa-plus-circle"></button>
                    </div>
                    -->

                </div>
            </div>
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


<?php footerAdmin($data); ?>