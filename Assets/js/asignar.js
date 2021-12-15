$(document).ready(function (event) {

    let placa;
    let mecanico;

    $(document).on('blur', ".btnPlaca", function (event) {

        $(this).css('border', 'none');

    });

    $(document).on('click', ".btnPlaca", function (event) {
        $(this).css('border', 'solid #03A9F4 5px');
        placa = this.firstChild.nodeValue;

    });


    $(document).on('click', ".btnSeleccionar", function (event) {

        if (placa == undefined) {
            Swal.fire({
                title: '¡Por favor seleccione primero un vehiculo!',
                icon: 'error',
                hideClass: {
                    popup: 'animate__animated animate__fadeOutRight animate__fast'
                },
                timer: 3000
            })
        } else {

            mecanico = this.parentElement.parentElement.children[0].firstElementChild.firstElementChild.innerHTML;

            $("#contenido-modal .modal-title").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>Asignación de mecanico');
            $("#contenido-modal .modal-body").html(`Asignar el mecanico con numero de cedula
                            <span style="font-weight: bolder; color: orange;">${mecanico}</span>
                            al vehiculo con placa <span style="font-weight: bolder; color: orange;">${placa}</span>.<br>
                            <b>¿Desea asignar el mecanico?</b>`);

            $("#contenido-modal").modal();

        }


    });

    document.getElementById("aceptar").addEventListener('click', function () {
        $.post('http://localhost/valleyworkshop/asignar/asignacion', { placa, mecanico }, function (respuesta) {

            resultado = JSON.parse(respuesta);
            valornulo = resultado.resultado;

            if (valornulo == "null") {

                if (resultado.error == false) {

                    document.getElementById("cerrar").click();

                    Swal.fire({
                        title: 'Asignado correctamente',
                        text: 'Mecanico asiganado a mantenimiento pendiente',
                        icon: 'success',
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutRight animate__fast'
                        },
                        timer: 3000
                    })

                    template = '';
                    otrotemplate = '';

                    $('.container-buttons').html(template);
                    $('#listar-servicios').html(otrotemplate);
                }

            } else if (valornulo == "notnull") {

                placas = resultado.vehiculos_placas;
                mecanicosDisponibles = resultado.mecanicos_disponibles;

                if (resultado.error == false) {
                    document.getElementById("cerrar").click();

                    Swal.fire({
                        title: 'Asignado correctamente',
                        text: 'Mecanico asiganado a mantenimiento pendiente',
                        icon: 'success',
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutRight animate__fast'
                        },
                        timer: 3000
                    })

                    template = '';
                    otrotemplate = '';

                    placas.forEach(p => {

                        template +=
                            `<button type="button" class="btn btn-warning mx-4 btnPlaca btnPlaca placa" style="border: medium none;">${p}</button>`

                    });



                    mecanicosDisponibles.forEach(mec => {

                        otrotemplate +=
                            `<div class="mr-3">
                        <div class="card" id="tarjeta-perfil" style="width: 250px;">
                            <img class="card-img-top" src="Assets/img/images.perfiles_mecanicos/${mec.imagen}" alt="Default image">

                            <div class="card-body py-0">

                                <div class="header-card row">
                                    <div class="col-8">
                                        <span id="txtNombre" class="card-title my-0">${mec.nombre}</span>
                                        <span id="txtApellido" class="">${mec.apellido}</span>
                                    </div>

                                    <div class="col-4 px-0">
                                        <span id="txtCodigo">${mec.codigo}</span>
                                    </div>

                                </div>

                                <div class="body-card">
                                    <ul style="list-style: none; padding: 0;">

                                        <div class="card" style="border: none; padding-bottom:  1em; width: 100%;">

                                            <div>
                                                <h6>CC: <span>${mec.nuid}</span></h6>
                                            </div>

                                            <div>
                                                <h6>Genero: <span>${mec.genero}</span></h6>
                                            </div>

                                            <div>
                                                <h6>Telefono: <span>${mec.telefono}</span></h6>
                                            </div>
                                            <div>
                                                <h6>Correo: <span>${mec.correo}</span></h6>
                                            </div>

                                            <div>
                                                <button type="button" name="" id="btn_seleccionar" class="btnSeleccionar btn w-100 btn-lg btn-block">Seleccionar</button>
                                            </div>
                                        </div>



                                    </ul>
                                </div>

                            </div>
                        </div>

                    </div>`

                    });

                    console.log(valornulo);

                    $('.container-buttons').html(template);
                    $('#listar-servicios').html(otrotemplate);
                }




            }

        });
    });

})