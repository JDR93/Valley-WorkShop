
$(document).ready(function () {

    window.addEventListener("resize", function (event) {
        if (document.body.clientWidth < 1150) {
            $("#close-sidebar").click();
        }
    })

    edit = false;

    ////////////////////////////////////////////////////
    // VALIDACION DE DATOS
    ////////////////////////////////////////////////////
    $("#Formulario").validate({
        rules: {
            codigo: {
                digits: true,
                required: true,

            },
            precio: {
                digits: true,
                required: true,
            },
            nombre: {
                required: true,
                rangelength: [1, 255]
            }

        },
        messages: {
            codigo: {
                digits: "Campo no valido",
                required: "Campo requerido",
            },
            precio: {
                digits: "Campo no valido",
                required: "Campo requerido",
            },
            nombre: {
                required: "Campo requerido",
                rangelength: "Cadena de texto vacía"
            }
        }


    });

    $("#Formulario").on('submit', function (event) {

        if (edit == false) {
            ElUrl = 'http://localhost/valleyworkshop/registrar_servicios/insertar';
        } else if (edit == true) {
            ElUrl = "http://localhost/valleyworkshop/registrar_servicios/editar";
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
                    $("#registrado-msj").css('background','#00B894')
                    $("#registrado-msj h5").html('<i class="fas fa-check-circle"></i>' + resultado.mensaje);

                    $('#registrado-msj').slideDown('slow');
                    setTimeout(function () {
                        $('#registrado-msj').slideUp('slow');
                    }, 5000);

                    document.getElementById("Formulario").reset();

                }

                if (resultado.exito_editado) {
                    $("#codigo").focus();
                    $("#registrado-msj").css('background','#E0A800')
                    $("#registrado-msj h5").html('<i class="fas fa-check-circle"></i>' + resultado.mensaje);

                    $('#registrado-msj').slideDown('slow');
                    setTimeout(function () {
                        $('#registrado-msj').slideUp('slow');
                    }, 5000);
                    
                    document.getElementById("Formulario").reset();

                }

                if (resultado.error) {
                    $("#error-duplicate-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>' + resultado.mensaje);

                    $('#error-duplicate-msj').slideDown('slow');
                    setTimeout(function () {
                        $('#error-duplicate-msj').slideUp('slow');
                    }, 4000);

                    if (resultado.mensaje.includes('nombre')) {
                        $("#nombre").focus();

                    } else if (resultado.mensaje.includes('codigo')) {
                        $("#codigo").focus();
                    }
                }

                /*
                                if (value == 'editado') {
                                    $('#editado-msj').slideDown('slow');
                                    setTimeout(function () {
                                        $('#editado-msj').slideUp('slow');
                                    }, 3000);
                                    $("#div_cancelar_edicion").attr('style', 'display: none;');
                                             }
                */


            }).always(function () {
                edit = false;
                listarServicios();

                $("#registrar").html('Registrar Servicio');
                $("#div_cancelar_edicion").attr('style', 'display: none;');


            });
            event.preventDefault();
        }
    });


    listarServicios();
    $("#input-buscar").keyup(function () {

        if ($(this).val() == '') {
            listarServicios();
        }

        if ($(this).val()) {
            let valor = $(this).val();

            $.ajax({
                url: "http://localhost/valleyworkshop/registrar_servicios/buscar",
                type: "POST",
                data: { valor },
                success: function (respuesta) {
                    let servicios = JSON.parse(respuesta);
                    let template = '';

                    servicios.forEach(servicio => {

                        if ((servicio.imagen) == 'imagen.png') {
                            src = "Assets/img/imagen.png";
                        } else {
                            src = "Assets/img/images.services/" + servicio.imagen;
                        }

                        template += `<tr serviceCode="${servicio.codigo}" > ` +
                            `<td> ${servicio.codigo} </td>` +
                            `<td> ${servicio.nombre} </td>` +
                            `<td> ${servicio.costo} </td>` +
                            `<td style="padding: 0;"><img style="width: 100%; padding: .5em;" src="${src}"></td>` +
                            `<td> ${servicio.descripcion}</td>` +
                            `<td><button id="btn-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contenido-modal"><i class="far fa-trash-alt"></i></button>` +
                            `<button id="btn-edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                    });

                    $("#resultado").html(template);
                }


            });
        }

    })

    function listarServicios() {
        $.ajax({
            url: 'http://localhost/valleyworkshop/registrar_servicios/listar',
            type: 'GET',
            success: function (respuesta) {
                let services = JSON.parse(respuesta);
                let template = '';

                //console.log(respuesta);

                services.forEach(servicio => {

                    if ((servicio.imagen) == 'imagen.png') {
                        src = "Assets/img/imagen.png";
                    } else {
                        src = "Assets/img/images.services/" + servicio.imagen;
                    }

                    template += `<tr serviceCode="${servicio.codigo}" > ` +
                        `<td> ${servicio.codigo} </td>` +
                        `<td> ${servicio.nombre} </td>` +
                        `<td> ${servicio.costo} </td>` +
                        `<td style="padding: 0;"><img style="width: 100%; padding: .5em;" src="${src}"></td>` +
                        `<td> ${servicio.descripcion}</td>` +
                        `<td><button id="btn-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contenido-modal"><i class="far fa-trash-alt"></i></button>` +
                        `<button id="btn-edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                });

                $("#resultado").html(template);
            }
        });
    }



    $("#cancelar_edicion").click(function () {
        $("#div_cancelar_edicion").attr('style', 'display: none;');
        $("#registrar").replaceWith('<button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar servicio</button>');
        document.getElementById("Formulario").reset();
    })


    $(document).on('click', "#btn-delete", function () {

        let element = $(this)[0].parentElement.parentElement;
        let code = $(element).attr('serviceCode');


        document.getElementById("aceptar").addEventListener('click', function () {

            $.post('http://localhost/valleyworkshop/registrar_servicios/eliminar', { code }, function (respuesta) {
                listarServicios();
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






