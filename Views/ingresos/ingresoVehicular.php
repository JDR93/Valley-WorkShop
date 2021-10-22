<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content">

    <div class="container ">
        <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
        <hr>

        <form>
            <div class="row">
                <div class="col-6">

                    <div class="card">
                        <div class="card-header">
                            Datos del vehículo
                        </div>
                        <div class="card-body">
                            <label>
                                Placa
                                <input type="text" name="txtPlaca" required>
                            </label>
                            <label>
                                Marca
                                <input type="text" name="txtMarca" required>
                            </label>
                            <label>
                                Línea
                                <input type="text" name="txtLinea" required>
                            </label>
                            <label>
                                Modelo
                                <input type="text" name="txtModelo" required>
                            </label>
                            <label>
                                Tipo
                                <select name="tipo" required>
                                    <option value="A">Automovil</option>
                                    <option value="M">Motocicleta</option>
                                </select>
                            </label>
                        </div>

                    </div>
                </div>

                <div class="col-6">

                    <div class="card">
                        <div class="card-header">
                            Datos del propietario
                        </div>
                        <div class="card-body">
                            <label>
                                Identificación
                                <input type="text" name="txtIdentificacion" required>
                            </label>
                            <label>
                                Nombres
                                <input type="text" name="txtNombres" required>
                            </label>
                            <label>
                                Apellidos
                                <input type="text" name="txtApellidos" required>
                            </label>
                            <label>
                                Genero
                                <select name="Genero" required>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </select>
                            </label>
                            <label>
                                Teléfono
                                <input type="text" name="txtTelefono" required>
                            </label>
                            <label>
                                Correo
                                <input type="text" name="txtCorreo" required>
                            </label>
                            <label>
                                Dirección
                                <input type="text" name="txtDireccion" required>
                            </label>
                        </div>
                    </div>





                </div>
            </div>

            <div class="row my-4">

                <div class="col-12">

                    <div class="row">
                        <div class="col-9 ">
                            <select name="servicio" class="w-100" required>
                                <option value="id">Revision del funcionamiento del sistema electrico - $12800</option>
                                <option value="id">Revision del funcionamiento del sistema electrico - $12800</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <button type="button" class="w-100 btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                                Agregar servicio
                            </button>
                        </div>
                    </div>

                    <div class="card my-4">
                        <div class="card-header">
                            Servicios agregados
                        </div>
                        <div class="card-body">
                            <div class="container-service">
                                <ul>
                                    <!-- Square card -->
                                    <div class="mdl-card mdl-shadow--2dp demo-card-square">
                                        <div class="mdl-card__title mdl-card--expand">
                                            <h2 class="mdl-card__title-text">Titulo</h2>
                                        </div>
                                        <div class="mdl-card__supporting-text">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenan convallis.
                                        </div>
                                        <div class="mdl-card__actions mdl-card--border">
                                            <a class="btn btn-danger" style="color: #fff;">
                                                Remover
                                            </a>
                                            <span style="font-size: 1em; font-weight: bold; margin: .8em;" class="mdl-card__supporting-text">$56.500</span>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

            <div class="row">
                <button type="submit" class="btn btn-primary ingresar_vehiculo p-4 my-2 w-100" style=" box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);">
                    Ingresar vehiculo
                </button>
            </div>
        </form>

    </div>

</main>
<!-- page-content" -->


<?php footerAdmin($data); ?>