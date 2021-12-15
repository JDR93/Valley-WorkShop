
$(document).ready(function () {

    $("#codigo").focus();

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
            ElUrl = 'http://localhost/valleyworkshop/registrar_productos/insertar';
        } else if (edit == true) {
            ElUrl = "http://localhost/valleyworkshop/registrar_productos/editar";
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
                    $("#registrado-msj").css('background', '#00B894')
                    $("#registrado-msj h5").html('<i class="fas fa-check-circle"></i>' + resultado.mensaje);

                    $('#registrado-msj').slideDown('slow');
                    setTimeout(function () {
                        $('#registrado-msj').slideUp('slow');
                    }, 5000);

                    document.getElementById("Formulario").reset();

                }

                if (resultado.exito_editado) {

                    edit = false;
                    $("#registrar").html('Registrar producto');
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
                            title: '¡El producto no pudo ser registrado!',
                            html: 'producto con codigo <b style="color:orange;">' + $("#codigo").val() + '</b> ya se encuentra registrado',
                            icon: 'error',
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                            }
                        })
                    } else if (resultado.mensaje.includes("nombre")) {

                        $("#nombre").focus();
                        Swal.fire({
                            title: '¡El producto no pudo ser registrado!',
                            html: 'producto con nombre <b style="color: orange;">' + $("#nombre").val() + '</b> ya se encuentra registrado',
                            icon: 'error',
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                            }
                        })

                    }else{

                        $("#codigo").focus();
                        Swal.fire({
                            title: '¡El producto no pudo ser registrado!',
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
                    $("#registrar").html('Editar producto');
                } else if (edit == false) {
                    $("#registrar").html('Registrar producto');
                }
                listarproductos();
            });
            event.preventDefault();
        }
    });


    listarproductos();
    $("#input-buscar").keyup(function () {

        if ($(this).val() == '') {
            listarproductos();
        }

        if ($(this).val()) {
            let valor = $(this).val();

            $.ajax({
                url: "http://localhost/valleyworkshop/registrar_productos/buscar",
                type: "POST",
                data: { valor },
                success: function (respuesta) {
                    let productos = JSON.parse(respuesta);
                    let template = '';

                    productos.forEach(producto => {

                        if ((producto.imagen) == 'imagen.png') {
                            src = "Assets/img/imagen.png";
                        } else {
                            src = "Assets/img/images.products/" + producto.imagen;
                        }

                        template += `<tr productCode="${producto.codigo}" > ` +
                            `<td> ${producto.codigo} </td>` +
                            `<td> ${producto.nombre} </td>` +
                            `<td> ${producto.costo} </td>` +
                            `<td style="padding: 0;"><img style="width: 100%; padding: .5em;" src="${src}"></td>` +
                            `<td> ${producto.descripcion}</td>` +
                            `<td><button id="btn-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contenido-modal"><i class="far fa-trash-alt"></i></button>` +
                            `<button id="btn-edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                    });

                    $("#resultado").html(template);
                }


            });
        }

    })

    function listarproductos() {
        $.ajax({
            url: 'http://localhost/valleyworkshop/registrar_productos/listar',
            type: 'GET',
            success: function (respuesta) {
                let products = JSON.parse(respuesta);
                let template = '';

                //console.log(respuesta);

                products.forEach(producto => {

                    if ((producto.imagen) == 'imagen.png') {
                        src = "Assets/img/imagen.png";
                    } else {
                        src = "Assets/img/images.products/" + producto.imagen;
                    }

                    template += `<tr ProductCode="${producto.codigo}" > ` +
                        `<td> ${producto.codigo} </td>` +
                        `<td> ${producto.nombre} </td>` +
                        `<td> ${producto.costo} </td>` +
                        `<td style="padding: 0;"><img style="width: 100%; padding: .5em;" src="${src}"></td>` +
                        `<td> ${producto.descripcion}</td>` +
                        `<td><button id="btn-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contenido-modal"><i class="far fa-trash-alt"></i></button>` +
                        `<button id="btn-edit" type="button" class="btn btn-success"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                });

                $("#resultado").html(template);
            }
        });
    }

    $("#cancelar_edicion").click(function () {
        $("#div_cancelar_edicion").attr('style', 'display: none;');
        $("#registrar").replaceWith('<button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar producto</button>');
        document.getElementById("Formulario").reset();
    })


    $(document).on('click', "#btn-delete", function () {

        let element = $(this)[0].parentElement.parentElement;
        let code = $(element).attr('productCode');


        document.getElementById("aceptar").addEventListener('click', function () {

            $.post('http://localhost/valleyworkshop/registrar_productos/eliminar', { code }, function (respuesta) {
                listarproductos();
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
        let code = $(element).attr('productCode');

        console.log(element);

        $.post('http://localhost/valleyworkshop/registrar_productos/obtener', { code }, function (respuesta) {
            const product = JSON.parse(respuesta);

            $('#idProduct').val(product.id);
            $('#codigo').val(product.codigo);
            $('#precio').val(product.costo);
            $('#nombre').val(product.nombre);
            $('#descripcion').val(product.descripcion);
            $('#imagen-input').val(product.imagen);
            edit = true;
            $("#registrar").replaceWith('<button style="color:#fff;" type="submit" name="registrar" id="registrar" class="btn btn-success btn-lg btn-block animate__animated animate__wobble">Editar producto</button>')
        })



    })


})






