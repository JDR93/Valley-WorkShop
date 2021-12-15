<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
        <hr>

        <div class="container container-principal">
            <div class="card" style="overflow: hidden">
                <div class="card-header">
                    Vehiculos sin mecanico asignado
                </div>
                <div class="card-body container-mants-tarjetas ">

                    <div class="container-buttons container-service" style="height: 80px;">

                        <?php
                        require_once "Models/Taller.php";
                        $taller = new Taller();
                        $mantenimientos = $taller->getMantenimientosSinMecanico();

                        foreach ($mantenimientos as $m) {

                            $vehiculo = $taller->getVehiculoID($m->id_vehiculo);
                            $serviciosMants = $taller->getServiciosMant($m->id);

                        ?>
                            <button id="<?php echo $vehiculo->placa;?>" type="button" class="btn btn-warning mx-4 btnPlaca btnPlaca placa"><?php echo strtoupper($vehiculo->placa); ?></button>
                        <?php }  ?>
                    </div>

                </div>
            </div>

            <div class="row my-1">

                <div class="col-12">

                    <div class="card my-4">
                        <div class="card-header">
                            Mecanicos Disponibles
                        </div>
                        <div class="card-body" style="margin: 0 auto; max-width: 1000px;">
                            <div class="container-service" id="container-service">
                                <ul id="listar-servicios">



                                    <?php
                                    require_once "Models/Taller.php";
                                    $taller = new Taller();
                                    $mecanicos = $taller->getMecanicosDisponibles();



                                    foreach ($mecanicos as $m) { ?>



                                        <div class="mr-3">
                                            <div class="card" id="tarjeta-perfil" style="width: 250px;">
                                                <img class="card-img-top" src="Assets/img/images.perfiles_mecanicos/<?php echo $m->imagen ?>" alt="Default image">

                                                <div class="card-body py-0">

                                                    <div class="header-card row">
                                                        <div class="col-8">
                                                            <span id="txtNombre" class="card-title my-0"><?php echo $m->nombres ?></span>
                                                            <span id="txtApellido" class=""><?php echo $m->apellidos ?></span>
                                                        </div>

                                                        <div class="col-4 px-0">
                                                            <span id="txtCodigo"><?php echo $m->codigo ?></span>
                                                        </div>

                                                    </div>

                                                    <div class="body-card">
                                                        <ul style="list-style: none; padding: 0;">

                                                            <div class="card" style="border: none; padding-bottom:  1em; width: 100%;">

                                                                <div>
                                                                    <h6>CC: <span><?php echo $m->nuid ?></span></h6>
                                                                </div>

                                                                <div>
                                                                    <h6>Genero: <span><?php echo $m->genero ?></span></h6>
                                                                </div>

                                                                <div>
                                                                    <h6>Telefono: <span><?php echo $m->telefono ?></span></h6>
                                                                </div>
                                                                <div>
                                                                    <h6>Correo: <span><?php echo $m->correo ?></span></h6>
                                                                </div>

                                                                <div>
                                                                    <button type="button" name="" id="btn_seleccionar" class="btnSeleccionar btn w-100 btn-lg btn-block">Seleccionar</button>
                                                                </div>
                                                            </div>



                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>


                                    <?php }  ?>







                                </ul>
                            </div>
                        </div>

                    </div>




                </div>
            </div>


        </div>


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