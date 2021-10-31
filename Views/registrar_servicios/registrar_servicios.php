<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content" id="comienzo-pag">
    <div class="container">

        <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
        <hr>

        <a id="btn-up" href="#comienzo-pag">
            <i id="btn-prev" class="fas fa-angle-double-up"></i>
        </a>

        <a id="btn-down" href="#container-table">
            <i class="fas fa-angle-double-down"></i>
        </a>


        <div class="row">

            <div class="col-12">

                <div class="card">

                    <div class="card-body ">

                        <script>
                            $(document).ready(function(event) {
                                $("#form-registrar").on('submit', function(event) {
                                    event.preventDefault();

                                    $.ajax({
                                            type: 'POST',
                                            url: '<?php base_url() ?>Registrar_servicios/insertar',
                                            data: new FormData(this),
                                            dataType: 'json',
                                            contentType: false,
                                            cache: false,
                                            processData: false

                                        })
                                        .done(function(respuesta) {
                                            console.log(respuesta);

                                            document.getElementById("codigo").innerHTML = respuesta.codigo;
                                            document.getElementById("nombre").innerHTML = respuesta.nombre;
                                            document.getElementById("costo").innerHTML = respuesta.costo;
                                            document.getElementById("desc").innerHTML = respuesta.descripcion;
                                            document.getElementById("imagen").src = "./Assets/img/images.services/" + respuesta.imagen;

                                            document.getElementById("txtCodigo").value = "";
                                            document.getElementById("txtNombre").value = "";
                                            document.getElementById("txtCosto").value = "";
                                            document.getElementById("txtDesc").value = "";
                                            document.getElementById("txtImagen").value = "";

                                            function generateTableRow() {
                                                var emptyColumn = document.createElement('tr');

                                                emptyColumn.innerHTML =
                                                    '<td>' + respuesta.codigo + '</td>' +
                                                    '<td>' + respuesta.nombre + '</td>' +
                                                    '<td>' + respuesta.costo + '</td>' +
                                                    '<td>' + respuesta.descripcion + '</td>' +
                                                    '<td>' + respuesta.imagen + '</td>';
                                                '<td>' + respuesta.estado + '</td>';

                                                return emptyColumn;
                                            }

                                            document.querySelector('table.table_register tbody').appendChild(generateTableRow());


                                        })
                                        .fail(function(resp) {
                                            console.log(resp.responseText);
                                        })
                                        .always(function() {
                                            console.log("complete");

                                        });
                                });

                            });
                        </script>

                        <form method="POST" enctype="multipart/form-data" id="form-registrar" class="form-registrar_productos">
                            <div class="row form-group">
                                <div class="col-3">
                                    <input type="text" class="form-control" placeholder="Codigo" id="txtCodigo" name="txtCodigo">
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" placeholder="Nombre" id="txtNombre" name="txtNombre">
                                </div>
                            </div>

                            <div class="row form-group ">

                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Descripción" id="txtDesc" name="txtDesc">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="text" id="txtCosto" name="txtCosto" class="form-control" placeholder="Costo" aria-label="Amount (to the nearest dollar)">

                                    </div>
                                </div>

                                <div class="col-2 py-2 pl-0">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="txtEstado" name="txtEstado">
                                        <label style="padding-top: .1em;" class="form-check-label" for="exampleCheck1">Disponible</label>
                                    </div>
                                </div>

                                <div class="col-7">
                                    <div class="form-group">
                                        <input placeholder="Imagen del servicio" id="txtImagen" type="file" class="form-control-file" name="txtImagen">
                                    </div>
                                </div>


                            </div>



                        </form>

                    </div>

                    <div class="card-footer text-muted">
                        <div class="row py-4">
                            <div class="col-12">
                                <div class="container-tarjeta row">
                                    <div class="col-2 container-img px-0">
                                        <img style="width: 100%;" id="imagen" src="<?php base_url() ?>Assets/img/service_image.png" alt="Imagen null de servicio">
                                    </div>

                                    <div class="col-10 container-text card">
                                        <div class="title row">
                                            <h2 class="nombre" id="nombre">Nombre del servicio</h2>
                                            <h2 class="code" id="codigo">Codigo</h2>
                                        </div>
                                        <div class="descp row">
                                            <p id="desc" class="">(Descripción del servicio) Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quia ea accusantium.</p>
                                        </div>

                                        <div class="container-costo row">
                                            <span class="costo badge" id="costo">$1'390.900</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row py-3">
                            <div class="container-button w-100 ">

                                <input type="submit" id="btn-register" name="btn-register" class="w-100 btn btn-warning agregar-service" value="Registrar servicio">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="">

                <div class="card" id="container-table">
                    <div class="card-header">
                        Servicios registrados
                    </div>
                    <div class="card-body" style="height: 560px;">

                        <div class="col">
                            <table class="table_register">
                                <thead>
                                    <tr>
                                        <th style="width: 1.75em; ">Codigo</th>
                                        <th style="width: 5.4em;">Nombre</th>
                                        <th style="width: 12em;">Descripcion</th>
                                        <th style="width: 2.8em; ">Costo</th>
                                        <th style="width: 1.6em;">Imagen</th>
                                        <th style="width: 1.4em;">State</th>
                                        <th style="width: 1.4em;">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="table_services">

                                    <?php

                                    include "function.php";
                                    $arrayAssoc = LaPagina(1);

                                    $paginas = $arrayAssoc['paginas'];
                                    $registro = $arrayAssoc['resultados'];

                                    $i = 0;

                                    while ($i < count($registro)) {


                                    ?>

                                        <tr>
                                            <td style="padding-left: 1em; font-weight: bold;"><?php echo $registro[$i][1]; ?></td>
                                            <td><?php echo $registro[$i][2]; ?></td>
                                            <td><?php echo $registro[$i][3]; ?></td>
                                            <td style="padding-left: 1em; color: #E0A800; font-weight: bold;"><?php echo $registro[$i][4]; ?></td>
                                            <td><img id="imagen" style="width: 3.125rem;" src="<?php echo base_url() ?>Assets/img/images.services/<?php echo $registro[$i][5]; ?>" alt=""></td>
                                            <td><?php echo $registro[$i][6] ?></td>
                                            <td class="container-acciones">
                                                <a name="btn-editar" id="editar" class="btn btn-warning fas fa-pencil-alt" role="button" title="editar"></a>
                                                <a data-eliminar="<?php echo $registro[$i][0]; ?>" name="btn-eliminar" id="eliminar" class="btn btn-danger fas fa-trash" role="button" title="eliminar"></a>
                                            </td>
                                        </tr>

                                    <?php $i++;
                                    } ?>

                                </tbody>



                            </table>
                        </div>


                    </div>

                    <div class="card-footer text-muted pie-paginacion" style="margin: 0 auto;">
                        <nav aria-label="...">
                            <ul class="pagination">

                                <!--
                                <li class="page-item <?php // echo $_GET['pagine'] == 1 ? 'disabled' : ''; 
                                                        ?>">
                                    <a class="page-link" href="?pagine=<?php // echo $_GET['pagine'] - 1 
                                                                        ?>">Anterior</a>
                                </li>
                                -->


                                <?php

                                $i = 1;
                                while ($i <= $paginas) {
                                    $actual = $i == 1 ? "active" : ''; ?>

                                    <li id="pagina" class='page-item'>
                                        <a data-pagina="<?php echo $i ?>" id="indice_paginador" class="page-link <?php echo $actual; ?>"> <?php echo $i; ?></a>
                                    </li>


                                <?php $i++;
                                } ?>
                                <!--
                                <li class="page-item <?php // echo $_GET['pagine'] == $paginas ? 'disabled' : ''; 
                                                        ?>">
                                    <a class="page-link" href="?pagine=<?php // echo $_GET['pagine'] + 1 
                                                                        ?>">Siguiente</a>
                                </li>
                                -->
                            </ul>
                        </nav>

                    </div>
                </div>

            </div>
        </div>


        <!-- ////////////////////////////////////////////////////////////// -->
        <!--                   ELIMINAR REGISTRO DE TABLA                   -->
        <!-- ////////////////////////////////////////////////////////////// -->
        <script>
            const botonesEliminar = document.querySelectorAll('#eliminar');
            for (let i = 0; i < botonesEliminar.length; i++) {
                botonesEliminar[i].addEventListener('click', function(e) {

                    const id_eliminar = e.target.dataset.eliminar;
                    const fd = new FormData();
                    fd.append('eliminar', id_eliminar);


                    fetch('registrar_servicios/eliminar', {
                        method: 'post',
                        body: fd
                    }).then(function(a) {
                        return j.json();


                    }).then(function(s) {
                        console.log(s);
                    });

                    e.preventDefault();
                });
            }
        </script>

        <!-- ////////////////////////////////////////////////////////////// -->
        <!--                   TABLA E INDICE DE TABLA                       -->
        <!-- ////////////////////////////////////////////////////////////// -->


        <script>
            const botones = document.querySelectorAll('#indice_paginador');
            for (let i = 0; i < botones.length; i++) {
                botones[i].addEventListener('click', function(e) {

                    const anterior = document.querySelector('.active');
                    if (anterior) anterior.classList.remove('active');
                    e.target.classList.add('active');

                    const num = e.target.dataset.pagina;
                    const fd = new FormData();
                    fd.append('numero', num);

                    fetch('registrar_servicios/pagination', {
                            method: 'post',
                            body: fd
                        })
                        .then(function(j) {
                            return j.json();


                        })

                        .then(function(d) {


                            const resultados = document.getElementById('table_services');
                            const paginador = document.getElementById('indice_paginador');

                            resultados.innerHTML = "";
                            d.resultados.forEach(element => {
                                resultados.innerHTML += `
                                <tr>
                                    <td style="height: 50px; padding-left: 1em; font-weight: bold;">${ element.codigo }</td>
                                    <td style="height: 50px;">${ element.nombre }</td>
                                    <td style="height: 50px">${ element.descripcion }</td>
                                    <td style="height: 50px; padding-left: 1em; color: #E0A800; font-weight: bold;">${ element.costo }</td>
                                    <td style="height: 50px"><img id="imagen" style="width: 3.125rem;" src="Assets/img/images.services/${ element.imagen }" alt=""></td>
                                    <td style="height: 50px;">${ element.estado } </td>
                                    <td class="container-acciones">
                                            <a name="btn-editar" id="editar" class="btn btn-warning fas fa-pencil-alt" href="" role="button"></a>
                                            <a name="btn-eliminar" id="eliminar" class="btn btn-danger fas fa-trash" role="button"></a>
                                    </td>
                                </tr>`;
                            });
                        });
                    e.preventDefault();
                });

            }
        </script>






    </div>

</main>
<!-- page-content" -->



<?php footerAdmin($data); ?>