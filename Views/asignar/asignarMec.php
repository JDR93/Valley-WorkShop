<?php headerAdmin($data); ?>


<!-- sidebar-wrapper  -->
<main class="page-content">
    <div class="container">
        <h2 class="page_title" style="font-family: 'Bebas Neue'; color: #707070"><?php echo $data['page_title'] ?></h2>
        <hr>

        <div class="card">
            <div class="card-header">
                Mantenimientos sin mecanico asignado
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="row my-4">
            <div class="col-9 ">
                <select name="servicio" class="w-100" required>
                    <option value="id">Mecanico nombres y apellidos numero de identificacion</option>
                    <option value="id">Mecanico nombres y apellidos numero de identificacion</option>
                </select>
            </div>
            <div class="col-3">
                <button type="button" class="w-100 btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                    Agregar mecanico
                </button>
            </div>
        </div>


    </div>

</main>
<!-- page-content" -->


<?php footerAdmin($data); ?>