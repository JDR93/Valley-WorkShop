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
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td style="text-align: center; padding: 0;"><a name="" id="" class="btn btn-info btn-select" href="#" role="button">Seleccionar</a></td>
                        </tr>
                        
                    </tbody>
                </table>
                


            </div>

        </div>

        <div class="row my-4">
            <div class="col-9" style="margin: auto;">
                <select name="servicio" class="w-100" required>
                    <option value="id">Mecanico nombres y apellidos numero de identificacion</option>
                    <option value="id">Mecanico nombres y apellidos numero de identificacion</option>
                </select>
            </div>
            <div class="col-3">
                <button type="button" class="w-100 btn btn-warning agregar-service" data-toggle="modal" data-target="#exampleModalCenter">
                    Asignar mecanico
                </button>
            </div>
        </div>


    </div>

</main>
<!-- page-content" -->


<?php footerAdmin($data); ?>