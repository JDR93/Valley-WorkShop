<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container ">
        <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
        <hr>

        <form>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            Vehiculo
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label>Placa</label>
                                    <input type="text" name="txtPlaca" required>
                                </div>

                                <div class="col-3">
                                    <label>Marca</label>
                                    <input class="w-100" type="text" name="txtMarca" required>

                                </div>

                                <div class="col-3">
                                    <label>Tipo</label>
                                    <input class="w-100" type="text" name="txtTipo" required>

                                </div>

                                <div class="col-3">
                                    <label>Línea</label>
                                    <input class="w-100" type="text" name="txtLinea" required>

                                </div>
                            </div>
                        </div>
                    </div>
        </form>

        <div class="row my-4">
            <div class="col-12">
                <label class="pl-3">
                    Mecancio asignado:
                    <input type="text" name="txtMecanico" required>
                </label>
            </div>
        </div>

        <div class="card my-4">
            <div class="card-header">
                Servicios registrados
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

            <div class="card-header">
                Productos a registrar
            </div>

            <div class="card-body">
                <article class="my-3">




                    <table class="meta">


                        <tr style="display: none;">
                            <th><span contenteditable>Monto adeudado</span></th>
                            <td><span id="prefix" contenteditable>$</span><span>
                                    <!-- Mano de obra--> 600.00
                                </span></td>
                        </tr>
                    </table>
                    <table class="inventory">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Unidad</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a class="cut" style="font-weight: bolder; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 1em; border-radius: .3em; margin: .2em 0 0 -2em; padding:.6em 1em; color: #fff; background-color: red; ">X</a><span contenteditable></span></td>
                                <td><span></span></td>
                                <td><span data-prefix>$</span><span>0</span></td>
                                <td><span contenteditable>1</span></td>
                                <td><span data-prefix>$</span><span>600.00</span></td>
                            </tr>
                        </tbody>
                    </table>

                    <a class="btn btn-primary add ">Agregar</a>
                    <table class="balance">
                        <tr>
                            <th><span>Total</span></th>
                            <td><span data-prefix>$</span><span>600.00</span></td>
                        </tr>
                        <tr style="display: none;">
                            <th><span contenteditable>Amount Paid</span></th>
                            <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
                        </tr>
                        <tr style="display: none;">
                            <th><span contenteditable>Balance Due</span></th>
                            <td><span data-prefix>$</span><span>600.00</span></td>
                        </tr>
                    </table>

                </article>
            </div>
        </div>



        <div class="row my-4">
            <button type="submit" class="btn btn-primary ingresar_vehiculo p-4 my-2 w-100" style=" box-shadow: 0 8px 10px 1px rgba(0, 0, 0, .14), 0 3px 14px 2px rgba(0, 0, 0, .12), 0 5px 5px -3px rgba(0, 0, 0, .2);">
                Registrar
            </button>
        </div>


    </div>

</main>
<!-- page-content" -->


<?php footerAdmin($data); ?>