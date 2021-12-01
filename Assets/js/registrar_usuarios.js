$(document).ready(function (event) {

    $("#registrarMecanico").click(function () {
        $(".container-mecanico").css("display", "block");
        $(".container-ingresoss").css("display", "none");
        $(".container-inventario").css("display", "none");
        $(".container-adminstrador").css("display", "none");
    })

    $("#registrarUIngresos").click(function () {
        $(".container-ingresoss").css("display", "block");
        $(".container-mecanico").css("display", "none");
        $(".container-inventario").css("display", "none");
        $(".container-adminstrador").css("display", "none");
    })

    $("#registrarUInventario").click(function () {
        $(".container-inventario").css("display", "block");
        $(".container-ingresoss").css("display", "none");
        $(".container-mecanico").css("display", "none");
        $(".container-adminstrador").css("display", "none");
    })

    $("#registrarAdministrador").click(function () {
        $(".container-adminstrador").css("display", "block");
        $(".container-ingresoss").css("display", "none");
        $(".container-inventario").css("display", "none");
        $(".container-mecanico").css("display", "none");
    })



    window.addEventListener("resize", function (event) {
        if (document.body.clientWidth < 1150) {
            $("#close-sidebar").click();
        }
    })


    edit = false;

    ////////////////////////////////////////////////////
    // VALIDACION DE DATOS
    ////////////////////////////////////////////////////
    /*
    $(".container-mecanico #Formulario").validate({
        rules: {
            codigo: {
                digits: true,
                required: true
            },
            nuid: {
                digits: true,
                required: true
            },
            nombres: {
                required: true
            },
            apellidos: {
                required: true
            },
            genero: {
                required: true
            },
            telefono: {
                required: true
            },
            correo: {
                required: true,
                email: true
            }


        },
        messages: {

            codigo: {
                digits: "Campo no valido",
                required: "Campo requerido"
            },
            nuid: {
                digits: "Campo no valido",
                required: "Campo requerido"               
            },
            nombres: {
                required: "Campo requerido"
            },
            apellidos: {
                required: "Campo requerido"
            },
            genero: {
                required: "Campo requerido"
            },
            telefono: {
                required: "Campo requerido"
            },
            correo: {
                required: "Campo requerido",
                email: "Correo no valido"
            }
        }


    });
    */

    $("#Formulario").on('submit', function (event) {

        if (edit == false) {
            ElUrl = 'http://localhost/valleyworkshop/registrar_usuarios/insertar_mecanico';
        } else if (edit == true) {
            ElUrl = "http://localhost/valleyworkshop/registrar_usuarios/editar_mecanico";
        }

        var validator = $("#Formulario").validate();
        if (validator.form()) {
            $.ajax({
                type: 'POST',
                url: ElUrl,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,

                beforeSend: function () {
                    $("#registrar").html('Enviando...');
                }

            }).done(function (respuesta) {

                let resultado = JSON.parse(respuesta);
                console.log(resultado);

                if (resultado.exito) {
                    $("#codigo").focus();
                    Swal.fire({
                        title: '¡Mecanico registrado correctamente!',
                        icon: 'success',
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutRight animate__fast'
                        }
                    })

                    document.getElementById("Formulario").reset();

                }

                if (resultado.exito_editado) {
                    $("#codigo").focus();
                    $("#registrado-msj").css('background', '#E0A800')
                    $("#registrado-msj h5").html('<i class="fas fa-check-circle"></i>' + resultado.mensaje);

                    $('#registrado-msj').slideDown('slow');
                    setTimeout(function () {
                        $('#registrado-msj').slideUp('slow');
                    }, 5000);

                    document.getElementById("Formulario").reset();

                }

                if (resultado.error) {
                    $("#codigo").focus();
                    Swal.fire({
                        title: '¡El mecanico no pudo ser registrado!',
                        icon: 'error',
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutRight animate__fast'
                        }
                    })
                }

            }).always(function () {
                edit = false;
                listarMecanico();

                $("#registrar").html('Registrar Servicio');
                $("#div_cancelar_edicion").attr('style', 'display: none;');


            });
            event.preventDefault();
        }
    });

    listarMecanico();
    $("#input-buscar").keyup(function () {

        if ($(this).val() == '') {
            listarMecanico();
        }

        if ($(this).val()) {
            let valor = $(this).val();

            $.ajax({
                url: "http://localhost/valleyworkshop/registrar_usuarios/buscar_mecanico",
                type: "POST",
                data: { valor },
                success: function (respuesta) {
                    let mecanicos = JSON.parse(respuesta);
                    let template = '';

                    mecanicos.forEach(mecanico => {

                        if ((mecanico.imagen) == 'imagen.png') {
                            src = "Assets/img/imagen.png";
                        } else {
                            src = "Assets/img/images.mecanicos/" + mecanico.imagen;
                        }

                        template += `<tr MecanicoID="${mecanico.id}" > ` +
                            `<td> ${mecanico.codigo} </td>` +
                            `<td> ${mecanico.nuid} </td>` +
                            `<td> ${mecanico.nombre} </td>` +
                            `<td> ${mecanico.telefono}</td>` +
                            `<td> ${mecanico.correo}</td>` +
                            `<td><button id="btn-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contenido-modal"><i class="far fa-trash-alt"></i></button>` +
                            `<button id="btn-edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                    });

                    $("#resultado").html(template);
                }


            });
        }

    })

    $("#buscar").click(function () {

        event.preventDefault;

        if ($("#input-buscar").val()) {
            let valor = $("#input-buscar").val();

            $.ajax({
                url: "http://localhost/valleyworkshop/registrar_usuarios/buscar_mecanicoTarjeta",
                type: "POST",
                data: { valor },
                success: function (respuesta) {
                    let mecanicos = JSON.parse(respuesta);
                    let templateTarjeta = '';

                    console.log(mecanicos);

                    mecanicos.forEach(mecanico => {

                        if ((mecanico.imagen) == 'imagen.png') {
                            src = "Assets/img/imagen.png";
                        } else {
                            src = "Assets/img/images.mecanicos/" + mecanico.imagen;
                        }

                        templateTarjeta += `<img class="card-img-top" src="Assets/img/images.perfiles_mecanicos/${mecanico.imagen}" alt="Card image cap">

                            <div class="card-body py-0">
    
                                <div class="header-card row">
                                    <div class="col-8">
                                        <span id="txtNombre" class="card-title my-0">${mecanico.nombre}</span>
                                        <span id="txtApellido" class="">${mecanico.apellido}</span>
                                    </div>

                                    <div class="col-4 px-0"><span id="txtCodigo">${mecanico.codigo}</span></div>
    
                                </div>
    
                                <div class="body-card">
                                    <ul style="list-style: none; padding: 0;">
                                        <li><h6>CC: <span>${mecanico.nuid}</span></h6></li>
                                        <li><h6>Genero: <span>${mecanico.genero}</span></h6></li>
                                        <li><h6>Telefono: <span>${mecanico.telefono}</span></h6></li>
                                        <li><h6>Correo: <span>${mecanico.correo}</span></h6></li>
                                    </ul>
                                </div>
                            </div>`
                    });

                    $("#tarjeta-perfil").html(templateTarjeta);
                }


            });
        }

    })

    function listarMecanico() {

        $.ajax({
            url: 'http://localhost/valleyworkshop/registrar_usuarios/listar_mecanicos',
            type: 'GET',
            success: function (respuesta) {
                let mecanicos = JSON.parse(respuesta);
                let template = '';

                mecanicos.forEach(mecanico => {

                    if ((mecanico.imagen) == 'imagen.png') {
                        src = "Assets/img/imagen.png";
                    } else {
                        src = "Assets/img/images.mecanicos/" + mecanico.imagen;
                    }

                    console.log(respuesta);

                    template += `<tr MecanicoID="${mecanico.id}" > ` +
                        `<td> ${mecanico.codigo}</td>` +
                        `<td> ${mecanico.nuid} </td>` +
                        `<td> ${mecanico.nombre} </td>` +
                        `<td> ${mecanico.telefono}</td>` +
                        `<td> ${mecanico.correo}</td>` +
                        `<td><button id="btn-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contenido-modal"><i class="far fa-trash-alt"></i></button>` +
                        `<button id="btn-edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                });

                $("#resultado").html(template);
            }




        });
    }

    $("#cancelar_edicion").click(function () {
        $("#div_cancelar_edicion").attr('style', 'display: none;');
        $("#registrar").replaceWith('<button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar mecanico</button>');
        document.getElementById("Formulario").reset();
    })

    $(document).on('click', "#btn-delete", function () {

        let element = $(this)[0].parentElement.parentElement;
        let code = $(element).attr('serviceCode');


        document.getElementById("aceptar").addEventListener('click', function () {

            $.post('http://localhost/valleyworkshop/registrar_servicios/eliminar', { code }, function (respuesta) {
                listarMecanico();
                $("#cerrar").click()
            });
        });

        document.getElementById("cerrar").addEventListener('click', function () {
            element = null;
            code = null;
        });

    });

    $(document).on('click', "#btn-edit", function () {

        window.scroll(0, 0);

        $("#div_cancelar_edicion").attr('style', 'display: block;').attr('class', 'col-3');

        let element = $(this)[0].parentElement.parentElement;
        let code = $(element).attr('serviceCode');

        console.log(element);



        $.post('http://localhost/valleyworkshop/registrar_servicios/obtener', { code }, function (respuesta) {
            const service = JSON.parse(respuesta);

            $('#idService').val(service.id);
            $('#codigo').val(service.codigo);
            $('#precio').val(service.costo);
            $('#nombre').val(service.nombre);
            $('#descripcion').val(service.descripcion);
            $('#imagen-input').val(service.imagen);
            edit = true;
            $("#registrar").replaceWith('<button style="color:#fff;" type="submit" name="registrar" id="registrar" class="btn btn-success btn-lg btn-block animate__animated animate__wobble">Editar servicio</button>')
        })



    })


})