<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content" id="comienzo-pag">
    <div class="container" id="registrar_servicios-container">
        <div class="row" id="row-header">

            <div class="col-6">
                <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
            </div>

            <div class="col-6 ml-0 ">
                <form class="form-inline my-2 my-lg-0 justify-content-end ">
                    <input id="input-buscar" class="form-control mr-sm-2" type="text" placeholder="Buscar servicio">
                    <button id="buscar" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>

        </div>
        <hr>

        <!-- ROW FORM START -->
        <div class="row">
            <!-- COL FORM START -->
            <div class="col">
                <!-- CARD FORM START -->
                <div class="card">
                    <div class="card-body">

                        <!-- FORM START -->
                        <form id="Formulario" method="POST" enctype="multipart/form-data">

                            <div class="row">

                                <input name="idService" type="hidden" id="idService">

                                <div class="col-6 col-md-2">
                                    <div class="form-group">
                                        <label for="codigo">Codigo:</label>
                                        <input type="text" class="form-control" name="codigo" id="codigo" autocomplete="off" placeholder="codigo del servicio">
                                    </div>
                                </div>

                                <div class="col-6 col-md-2">
                                    <div class="form-group">
                                        <label for="precio">Precio:</label>
                                        <input type="text" class="form-control" name="precio" id="precio" autocomplete="off" aria-describedby="helpId" placeholder="precio del servicio">
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" aria-describedby="helpId" placeholder="nombre del servicio">
                                    </div>
                                </div>

                                <!-- COMPONENTE INPUT-FILE START -->
                                <div class="col-6 col-md-4">
                                    <div class="input-group input-file" style="margin-top: .4em;">

                                        <span class="input-group-btn">
                                            <button id="button-image" style="font-size: .9em;" class="btn btn-default btn-choose" type="button">Imagen</button>
                                        </span>

                                        <input id="imagen-input" name="imagen" style=" font-size: .9em;" type="text" class="form-control input-choose" placeholder='Subir imagen...' />

                                        <span class="input-group-btn">
                                            <button style="font-size: .9em;" class="btn btn-warning btn-reset" type="button">Restaurar</button>
                                        </span>
                                    </div>
                                </div><!-- COMPONENTE INPUT-FILE END -->

                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción:</label>
                                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="descripción del servicio"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar servicio</button>
                                </div>
                                <div class="col "style="display: none;" id="div_cancelar_edicion">
                                    <button style="font-size: 0.8em; font-weight: 600; font-family: 'Roboto', sans-serif; " type="submit" name="cancelar_edicion" id="cancelar_edicion" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                                </div>
                            </div>

                        </form><!-- FORM END -->

                    </div><!-- CARD BODY END -->

                    <div id="registrado-msj" style="display: none; background-color: #00D440; text-align: center; height: auto;">
                        <h5 style="color: #fff; font-family: 'Bebas Neue', cursive; padding: .5em; margin: 0;">Servicio registrado satisfactoriamente.</h5>
                    </div>
                    <div id="error-duplicate-msj" style="display: none; background-color: #35528C; text-align: center">
                        <h5 style="color: #fff; font-family: 'Bebas Neue', cursive; padding: .5em; margin: 0;"><i style="color:#fff" class="fas fa-exclamation-triangle mr-2"></i>El servicio ya se encunetra registrado.</h5>
                    </div>

                    <div id="editado-msj" style="display: none; background-color: #00B8B8; text-align: center">
                        <h5 style="color: #fff; font-family: 'Bebas Neue', cursive; padding: .5em; margin: 0;"><i style="color: #fff;" class="fas fa-check-circle mr-2"></i>El servicio fue editado correctamente.</h5>
                    </div>

                </div><!-- CARD FORM END -->

            </div> <!-- COL FORM START -->

        </div><!-- ROW FORM START -->

        <!-- ROW TABLE START -->
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 4%;">Codigo</th>
                                    <th style="width: 8%;">Nombre</th>
                                    <th style="width: 4%;">Precio</th>
                                    <th style="width: 4%;">Imagen</th>
                                    <th style="width: 25%;">Descripcion</th>
                                    <th style="width: 6%;">Acción</th>
                                </tr>
                            </thead>
                            <tbody id="resultado">
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- ROW TABLE END -->

        <button style="display: none;" class="btn btn-primary" data-toggle="modal" data-target="#contenido-modal-registro">
            modal registro
        </button>

    </div>
</main><!-- page-content" -->



<!-- MODAL START -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="contenido-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Servicio</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
                ¿Deseas eliminar el servicio seleccionado?
            </div>
            <div class="modal-footer">
                <button id="cerrar" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button id="aceptar" class="btn btn-warning">Aceptar</button>
            </div>
        </div>
    </div>
</div>
<!-- MODAL END -->


<!-- Modal -->
<div class="modal fade" id="contenido-modal-registro" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 200px;">
        <div class="modal-content" style="border-radius: 100%;">
            <div class="modal-body" style="padding: 0;">

                <img src="./Assets/img/check.gif" width="200px" style="border-radius: 100%;">

            </div>

        </div>
    </div>
</div>
<!-- MODAL END -->

<?php footerAdmin($data); ?>