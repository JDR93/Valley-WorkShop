$(document).ready(function (event) {

    $("#codigo").focus();


    //COMPRIMIENDO MENU BAR LATERAL SI ES INFERIOR AL VALOR DADO.
    window.addEventListener("resize", function (event) {
        if (document.body.clientWidth < 1150) {
            $("#close-sidebar").click();
        }
    })

    $("#registrarMecanico").click(function () {
        $(".container-mecanico").css("display", "block");
        $(".container-ingresos").css("display", "none");
        $(".container-inventario").css("display", "none");
        $(".container-adminstrador").css("display", "none");
    })

    $("#registrarUIngresos").click(function () {
        $(".container-ingresos").css("display", "block");
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

                    edit = false;
                    $("#registrar").html('Registrar Mecanico');
                    $("#div_cancelar_edicion").attr('style', 'display: none;');

                    Swal.fire({
                        title: '¡Registrado!',
                        text: resultado.mensaje,
                        icon: 'success',
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutRight animate__fast'
                        }
                    })
                    document.getElementById("Formulario").reset();
                }

                if (resultado.error) {

                    if (resultado.mensaje.includes("codigo")) {
                        $("#codigo").focus();
                        Swal.fire({
                            title: '¡El mecanico no pudo ser registrado!',
                            html: 'Mecanico con codigo <b style="color:orange;">' + $("#codigo").val() + '</b> ya se encuentra registrado',
                            icon: 'error',
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                            }
                        })
                    } else if (resultado.mensaje.includes("nuid")) {

                        $("#nuid").focus();
                        Swal.fire({
                            title: '¡El mecanico no pudo ser registrado!',
                            html: 'Mecanico con identificación <b style="color: orange;">' + $("#nuid").val() + '</b> ya se encuentra registrado',
                            icon: 'error',
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                            }
                        })

                    } else {

                        $("#codigo").focus();
                        Swal.fire({
                            title: '¡El Mecanico no pudo ser registrado!',
                            text: resultado.mensaje,
                            icon: 'error',
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                            }
                        })
                    }
                }

            }).always(function () {
                if (edit == true) {
                    $("#registrar").html('Editar Mecanico');
                } else if (edit == false) {
                    $("#registrar").html('Registrar Mecanico');
                }
                listarMecanico();
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

                    console.log(respuesta);

                    mecanicos.forEach(mecanico => {

                        if ((mecanico.imagen) == 'imagen.png') {
                            src = "Assets/img/imagen.png";
                        } else {
                            src = "Assets/img/images.mecanicos/" + mecanico.imagen;
                        }

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

    })

    let encontradoTarjeta = false;

    function buscarMecanicoTarjeta() {
        if ($("#input-buscar").val()) {
            let valor = $("#input-buscar").val();

            $.ajax({
                url: "http://localhost/valleyworkshop/registrar_usuarios/buscar_mecanicoTarjeta",
                type: "POST",
                data: { valor },
                success: function (respuesta) {
                    let mecanicos = JSON.parse(respuesta);
                    let templateTarjeta = '';

                    console.log(mecanicos.encontrado);

                    if (mecanicos.encontrado == false) {
                        templateTarjeta += `
                        <div class="card animate__animated animate__wobble" id="tarjeta-perfil">
                            <img class="card-img-top" src="Assets/img/images.perfiles_mecanicos/perfil_default.jpg" alt="Card image cap">

                            <div class="card-body py-0">

                                <div class="header-card row">
                                    <div class="col-8">
                                        <span id="txtNombre" class="card-title my-0">Nombre Mec.</span>
                                        <span id="txtApellido" class="">Apellido Mec.</span>
                                    </div>

                                    <div class="col-4 px-0"><span id="txtCodigo">CODIGO</span></div>

                                </div>

                                <div class="body-card">
                                    <ul style="list-style: none; padding: 0;">
                                        <li><h6>CC: <span>IDENTIFICACION</span></h6></li>
                                        <li><h6>Genero: <span>Genero</span></h6></li>
                                        <li><h6>Telefono: <span>######</span></h6></li>
                                        <li><h6>Correo: <span>ejemplo@email.com</span></h6></li>
                                    </ul>
                                </div>
                            </div>
                        </div>`

                    } else {

                        mecanicos.forEach(mecanico => {

                            if ((mecanico.imagen) == 'imagen.png') {
                                src = "Assets/img/imagen.png";
                            } else {
                                src = "Assets/img/images.mecanicos/" + mecanico.imagen;
                            }

                            templateTarjeta += `
                            <div class="card animate__animated animate__wobble" id="tarjeta-perfil">
                                <img class="card-img-top" src="Assets/img/images.perfiles_mecanicos/${mecanico.imagen}" alt="Card image cap">
    
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
                                </div>
                            </div>`


                        });


                    }

                    $("#tarjeta-perfil").replaceWith(templateTarjeta);


                }




            });
        }

    }

    $("#input-buscar").keypress(function (e) {
        if (e.which == 13) {
            buscarMecanicoTarjeta();
        }
    });

    $("#buscar").click(function () {
        event.preventDefault;
        buscarMecanicoTarjeta();
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

                    //console.log(respuesta);

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

        edit = false;
        $("#div_cancelar_edicion").attr('style', 'display: none;');
        $("#registrar").replaceWith('<button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar mecanico</button>');
        document.getElementById("Formulario").reset();
    })

    $(document).on('click', "#btn-delete", function () {

        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('mecanicoid');


        document.getElementById("aceptar").addEventListener('click', function () {

            $.post('http://localhost/valleyworkshop/registrar_usuarios/eliminar_mecanico', { id }, function (respuesta) {
                listarMecanico();
                $("#cerrar").click()

                Swal.fire({
                    title: '¡Eliminado correctamente!',
                    icon: 'success',
                    timer: 2000,
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutRight animate__fast'
                    }
                })
            });
        });



        document.getElementById("cerrar").addEventListener('click', function () {
            element = null;
            id = null;
        });

    });


    $(document).on('click', "#btn-edit", function () {

        window.scroll(0, 0);

        $("#div_cancelar_edicion").attr('style', 'display: block;').attr('class', 'col-3');

        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('MecanicoID');

        console.log(element);

        $.post('http://localhost/valleyworkshop/registrar_usuarios/obtener_mecanico', { id }, function (respuesta) {

            const mecanico = JSON.parse(respuesta);
            $('#idService').val(mecanico.id);

            $('#codigo').val(mecanico.codigo);
            $('#nuid').val(mecanico.nuid);
            $('#nombres').val(mecanico.nombres);
            $('#apellidos').val(mecanico.apellidos);
            $('#genero').val(mecanico.genero);
            $('#telefono').val(mecanico.telefono);
            $('#correo').val(mecanico.correo);
            $('#imagen').val(mecanico.iamgen);
            edit = true;
            $("#registrar").replaceWith('<button style="color:#fff;" type="submit" name="registrar" id="registrar" class="btn btn-success btn-lg btn-block animate__animated animate__wobble">Editar servicio</button>')

        })
    })




})