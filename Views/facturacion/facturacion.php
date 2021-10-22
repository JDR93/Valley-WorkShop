<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
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
                </div>
            </div>
        </form>

    </div>


</main>
<!-- page-content" -->


<?php footerAdmin($data); ?>