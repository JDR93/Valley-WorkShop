<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content" id="comienzo-pag">
    <div class="container">
        <div class="row">

            <div class="col-8">
                <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
            </div>

            <div class="col-4 ml-0">
                <form class="form-inline my-2 my-lg-0">
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

                                <input type="hidden" id="idService">

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="codigo">Codigo:</label>
                                        <input type="text" class="form-control" name="codigo" id="codigo" autocomplete="off" aria-describedby="helpId" placeholder="codigo del servicio">
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="precio">Precio:</label>
                                        <input type="text" class="form-control" name="precio" id="precio" autocomplete="off" aria-describedby="helpId" placeholder="precio del servicio">
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" aria-describedby="helpId" placeholder="nombre del servicio">
                                    </div>
                                </div>

                                <!-- COMPONENTE INPUT-FILE START -->
                                <div class="col-4">
                                    <div class="input-group input-file" name="nombre" style="margin-top: -.5em;">

                                        <span class="input-group-btn">
                                            <button style="font-size: .9em;" class="btn btn-default btn-choose" type="button">Imagen</button>
                                        </span>

                                        <input name="nombre" style=" font-size: .9em;" type="text" class="form-control input-choose" placeholder='Subir imagen...' />

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
                            </div>

                        </form><!-- FORM END -->

                    </div><!-- CARD BODY END -->
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
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Acción</th>
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

        <button class="btn btn-primary" data-toggle="modal" data-target="#contenido-modal-registro">
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