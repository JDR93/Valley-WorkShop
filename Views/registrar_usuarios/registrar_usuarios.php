<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content" id="comienzo-pag">

    <div class="container pt-1">

        <div class="row" id="row-header">
            <div class="col-6">
                <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
            </div>

            <div class="form-group my-0">
                <button id="registrarMecanico" class="btn btn-warning">
                    Mecanico
                </button>
                <button id="registrarUIngresos" class="btn btn-primary" style="background-color: #1C5EA5;">
                    Ingresos
                </button>
                <button id="registrarUInventario" class="btn btn-success">
                    Inventario
                </button>
                <button id="registrarAdministrador" class="btn btn-secondary">
                    Administrador
                </button>
            </div>
        </div>
        <hr class="my-1">

        <div style="display: none;" class="container container-mecanico animate__animated animate__bounceInLeft" id="registrar_mecanicos-container">
            <!-- ROW FORM START -->
            <div class="row py-2">
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
                                            <input type="text" class="form-control" name="codigo" id="codigo" autocomplete="off" placeholder="Codigo del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2">
                                        <div class="form-group">
                                            <label for="nuid">CC:</label>
                                            <input type="text" class="form-control" name="nuid" id="nuid" autocomplete="off" aria-describedby="helpId" placeholder="Nuid del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="nombres">Nombres:</label>
                                            <input type="text" class="form-control" name="nombres" id="nombres" autocomplete="off" aria-describedby="helpId" placeholder="Nombres del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos:</label>
                                            <input type="text" class="form-control" name="apellidos" id="apellidos" autocomplete="off" aria-describedby="helpId" placeholder="Apellidos del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2">
                                        <div class="form-group">
                                            <label for="genero">Genero:</label>
                                            <select name="genero" id="genero" class="form-control-plaintext px-2">
                                                <option value="">Seleccione</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2">
                                        <div class="form-group">
                                            <label for="correo">Telefono:</label>
                                            <input type="text" class="form-control" name="telefono" id="telefono" autocomplete="off" aria-describedby="helpId" placeholder="Telefono del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="correo">Correo:</label>
                                            <input type="text" class="form-control" name="correo" id="correo" autocomplete="off" aria-describedby="helpId" placeholder="Correo del mecanico">
                                        </div>
                                    </div>

                                    <!-- COMPONENTE INPUT-FILE START -->
                                    <div class="col-6 col-md-4">
                                        <div class="input-group input-file" style="margin-top: .4em;">

                                            <span class="input-group-btn">
                                                <button id="button-image" style="font-size: .9em;" class="btn btn-default btn-choose" type="button">Imagen de perfil</button>
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
                                        <button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar mecanico</button>
                                    </div>
                                    <div class="col " style="display: none;" id="div_cancelar_edicion">
                                        <button style="font-size: 0.8em; font-weight: 600; font-family: 'Roboto', sans-serif; " type="button" name="cancelar_edicion" id="cancelar_edicion" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                                    </div>
                                </div>

                            </form><!-- FORM END -->

                        </div><!-- CARD BODY END -->
                    </div><!-- CARD FORM END -->

                </div> <!-- COL FORM START -->

            </div><!-- ROW FORM START -->

            <div class="row">

                <div class="col-3">
                    <div class="card" id="tarjeta-perfil">
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

                    <div class=" ml-0 ">
                        <div class="form-inline my-2" id="Form_search">
                            <input style="width: 78%;" id="input-buscar" class="form-control mr-sm-2" type="text" placeholder="Buscar servicio">
                            <button id="buscar" class="btn btn-outline-success my-2 my-sm-0" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                </div>

                <div class="col-9"><!-- TABLE START -->
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">Codigo</th>
                                                <th style="width: 14%;">Nuid</th>
                                                <th style="width: 20%;">Nombre</th>
                                                <th style="width: 10%;">Telefono</th>
                                                <th style="width: 25%;">Correo</th>
                                                <th style="width: 15%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultado">


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- TABLE END -->
            </div>
        </div>

        <div style="display: none;" class="container container-ingresos animate__animated animate__bounceInLeft" id="registrar_Uingresos-container">
            <!-- ROW FORM START -->
            <div class="row py-2">
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
                                            <input type="text" class="form-control" name="codigo" id="codigo" autocomplete="off" placeholder="Codigo del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2">
                                        <div class="form-group">
                                            <label for="nuid">CC:</label>
                                            <input type="text" class="form-control" name="nuid" id="nuid" autocomplete="off" aria-describedby="helpId" placeholder="Nuid del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="nombres">Nombres:</label>
                                            <input type="text" class="form-control" name="nombres" id="nombres" autocomplete="off" aria-describedby="helpId" placeholder="Nombres del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="apellidos">Apellidos:</label>
                                            <input type="text" class="form-control" name="apellidos" id="apellidos" autocomplete="off" aria-describedby="helpId" placeholder="Apellidos del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2">
                                        <div class="form-group">
                                            <label for="genero">Genero:</label>
                                            <select name="genero" id="genero" class="form-control-plaintext px-2">
                                                <option value="">Seleccione</option>
                                                <option value="M">Masculino</option>
                                                <option value="F">Femenino</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-2">
                                        <div class="form-group">
                                            <label for="correo">Telefono:</label>
                                            <input type="text" class="form-control" name="telefono" id="telefono" autocomplete="off" aria-describedby="helpId" placeholder="Telefono del mecanico">
                                        </div>
                                    </div>

                                    <div class="col-6 col-md-4">
                                        <div class="form-group">
                                            <label for="correo">Correo:</label>
                                            <input type="text" class="form-control" name="correo" id="correo" autocomplete="off" aria-describedby="helpId" placeholder="Correo del mecanico">
                                        </div>
                                    </div>

                                    <!-- COMPONENTE INPUT-FILE START -->
                                    <div class="col-6 col-md-4">
                                        <div class="input-group input-file" style="margin-top: .4em;">

                                            <span class="input-group-btn">
                                                <button id="button-image" style="font-size: .9em;" class="btn btn-default btn-choose" type="button">Imagen de perfil</button>
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
                                        <button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar mecanico</button>
                                    </div>
                                    <div class="col " style="display: none;" id="div_cancelar_edicion">
                                        <button style="font-size: 0.8em; font-weight: 600; font-family: 'Roboto', sans-serif; " type="button" name="cancelar_edicion" id="cancelar_edicion" class="btn btn-danger btn-lg btn-block">Cancelar</button>
                                    </div>
                                </div>

                            </form><!-- FORM END -->

                        </div><!-- CARD BODY END -->
                    </div><!-- CARD FORM END -->

                </div> <!-- COL FORM START -->

            </div><!-- ROW FORM START -->

            <div class="row">

                <div class="col-3">
                    <div class="card" id="tarjeta-perfil">
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

                    <div class=" ml-0 ">
                        <div class="form-inline my-2" id="Form_search">
                            <input style="width: 78%;" id="input-buscar" class="form-control mr-sm-2" type="text" placeholder="Buscar servicio">
                            <button id="buscar" class="btn btn-outline-success my-2 my-sm-0" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                </div>

                <div class="col-9"><!-- TABLE START -->
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%;">Codigo</th>
                                                <th style="width: 14%;">Nuid</th>
                                                <th style="width: 20%;">Nombre</th>
                                                <th style="width: 10%;">Telefono</th>
                                                <th style="width: 25%;">Correo</th>
                                                <th style="width: 15%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="resultado">


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- TABLE END -->
            </div>
        </div>
    </div>



</main><!-- page-content" -->




<!-- Modal -->
<div class="modal fade" id="contenido-modal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Eliminar Servicio</b></h5>
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


<?php footerAdmin($data); ?>