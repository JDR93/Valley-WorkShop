$(document).ready(function () {

    $("#placa").focus();


    $("body").css("overflow", "auto");


    let vehiculo = null;
    let propietario = null;
    let servicios = [];
    let mantenimiento = false;

    let template = '';

    const options2 = { style: 'currency', currency: 'COP', minimumFractionDigits: 0 };
    const numberFormat2 = new Intl.NumberFormat('es-CO', options2);

    validator = $("#Formulario").validate({
        rules: {
            other_camp: {
                required: true,
            },
            placa: {
                required: true,
            },
            marca: {
                required: true,
            },
            linea: {
                required: true,
            },
            modelo: {
                digits: true,
                required: true,
            },
            tipo: {
                required: true,
            },
            /*identificacion: {
                digits: true,
                required: true,
            }
            ,*/
            nombres: {
                required: true,
            }
            ,
            apellidos: {
                required: true,
            }
            ,
            genero: {
                required: true,
            },
            telefono: {
                required: true,
            }
            ,
            correo: {
                //email: true,
                required: true,
            }
            ,
            direccion: {
                required: true,
            }

        },
        messages: {

            placa: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            },
            marca: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            },
            linea: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            },
            tipo: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            },
            modelo: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>",
                digits: "Campo no valido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            }
            ,
            identificacion: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>",
                digits: "Campo no valido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            }
            ,
            nombres: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            }
            ,
            apellidos: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            }
            ,
            genero: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            },


            telefono: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            }
            ,
            correo: {
                //required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>",
                email: "Email no valido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>",

            }
            ,
            direccion: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            }
        }
    });

    $("#identificacion").keyup(function () {

        if ($(this).val()) {
            let valor = $(this).val();

            $.ajax({
                url: "http://localhost/valleyworkshop/ingresos/buscarPropietario",
                type: "POST",
                data: { valor },
                success: function (respuesta) {

                    let resultado = JSON.parse(respuesta);

                    if (resultado[0].encontrado == true) {

                        $("#identificacion").val(resultado[1].propietario.nuid);
                        $("#nombres").val(resultado[1].propietario.nombres);
                        $("#apellidos").val(resultado[1].propietario.apellidos);
                        $("#genero").val(resultado[1].propietario.genero).prop('readonly', false)
                        $("#telefono").val(resultado[1].propietario.telefono);
                        $("#correo  ").val(resultado[1].propietario.correo);
                        $("#direccion").val(resultado[1].propietario.direccion);

                        $("#nombres").attr('readonly', true);
                        $("#apellidos").prop('readonly', true);
                        $("#genero").css('pointer-events', 'none').addClass('desactivo');
                        $("#telefono").prop('readonly', true);
                        $("#correo  ").prop('readonly', true);
                        $("#direccion").prop('readonly', true);

                    } else {
                        $("#nombres").prop('readonly', false).val('');
                        $("#apellidos").prop('readonly', false).val('');
                        $("#genero").val('').css('pointer-events', 'auto').removeClass('desactivo');
                        $("#telefono").prop('readonly', false).val('');
                        $("#correo  ").prop('readonly', false).val('');
                        $("#direccion").prop('readonly', false).val('');
                    }
                }

            });
        }
    })

    function formularizar_formulario(event) {
        if (validator.form()) {

            event.preventDefault();
            var datos = new FormData($('#Formulario').get(0));

            $.ajax({
                url: "http://localhost/valleyworkshop/ingresos/insertar",
                type: 'POST',
                data: datos,
                dataType: 'json',
                processData: false,
                contentType: false,

                beforeSend: function () {
                    $("#registrarVehiculo").html('Enviando...');
                },

            }).done(function (res) {

                if (res.error == true) {
                    $("#success-msj").css('background', '#D52D2F')
                    $("#success-msj h5").html(`<i style="color:#fff" class="fas fa-exclamation-triangle mr-2"></i>${res.mensaje}`);

                    $('#success-msj').slideDown('slow');
                    setTimeout(function () {
                        $('#success-msj').slideUp('slow');
                    }, 4000);

                } else {
                    if (res.insertado == true) {

                        vehiculo = res.vehiculo;

                        $("#registrarVehiculo").prop('disabled', true);

                        $("#Formulario .elform.input").each(function () {
                            $(this).prop('disabled', true);
                        });
                        $("#Formulario .elform.select").each(function () {
                            $(this).prop('disabled', true);
                        });

                        $("#placa").prop('disabled', false);

                        $("#success-msj").css("background", "#8CC63E");
                        $("#success-msj h5").html('<i style="color:#fff" class="fas fa-check-circle mr-2"></i>'
                            + "Vehiculo registrado correctamente");

                        $('#success-msj').slideDown('slow');
                        setTimeout(function () {
                            $('#success-msj').slideUp('slow');
                        }, 4000);

                        $(".elform input").each(function () {
                            $(this).prop('disabled', true);
                        });

                        $(".elform select").each(function () {
                            $(this).prop('disabled', true);
                        });

                        $("#placa").prop('disabled', false);

                    }
                }


            }).always(function () {
                $("#registrarVehiculo").html('Registrar Vehículo');
            })

        }

    }


    $("#registrarVehiculo").click(formularizar_formulario);


    $(document).bind("click", function () {

        console.log("vehiculo:" + vehiculo);
        console.log("mantenimiento: " + mantenimiento);
        console.log("servicios: " + servicios);

    });

    $("#cerrar").click(function () {
        $("#placa").triggerHandler("focus");
    })

    function mostrarServicios() {

        if (servicios != '') {
            template = '';

            servicios.forEach(servicio => {

                servicio.forEach(s => {

                    template +=
                        `<li id="service-li" style="position: relative; left: 0px;   width: 300px; margin-right:2em;">
                            <!-- Square card -->
                            <div class="container container-card_service">
                                <div class="card">
                                    <span name="code" id="code-tarjeta" class="badge">${s.codigo}</span>
                                    <div class="tarjeta-title">
                                        <h4> ${s.nombre}</h4>
                                        <a id="deleteServicio" class="animacionClose"><i class="fas fa-times"></i></a>
                                    </div>
                                    <div class="card-header">
                                        <img style="width: 100%;" src="Assets/img/images.services/${s.imagen}" alt="">
                                    </div>
    
                                    <div class="card-body">
                                        <p class="card-text">${s.descripcion}</p>
                                    </div>
                
                
                                    <div class="card-footer text-muted">
                                        <span class="badge bg-secondary" style="width: 100%; color: #fff; padding: 1em 2em; background-color: #aaa !important; float: right; "> ${numberFormat2.format(s.costo)}</span>
                                    </div>
                
                                </div>
                            </div>
                        </li>`
                })
            });

            $('#listar-servicios').html(template);
        }



    }

    function BusquedaVehiculo() {
        let placa_vehiculo = $("#placa").val();
        if (placa_vehiculo == '') {

            $("#error-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                + "<span style='color: orange;'></span> Por favor digite la placa.");

            $('#error-msj').slideDown('slow');
            setTimeout(function () {
                $('#error-msj').slideUp('slow');
            }, 2000);

        } else {

            document.getElementById("Formulario").reset();
            $('#listar-servicios').html('');
            $("#placa").val(placa_vehiculo);
            $("#ingresarVehiculo").prop('disabled', false);

            vehiculo = null;
            propietario = null;
            servicios = [];
            mantenimiento = false;
            template = '';
            $("#mantSi").css('display', 'none');
            $("#mant-success").css('display', 'none');


            function accionAceptar() {
                document.getElementById("Formulario").reset();
                $("#placa").val(placa_vehiculo);

                $('#registrarVehiculo').removeClass('disabled');
                $('#contenido-modal').modal('hide');

                $("#Formulario input").each(function () {
                    $(this).removeAttr('disabled');
                });
                $("#Formulario select").each(function () {
                    $(this).removeAttr('disabled');
                });

                $("#registrarVehiculo").removeAttr('disabled');
                $("#marca").focus();
            }

            $("#contenido-modal #aceptar").click(function () {
                accionAceptar();
            });

            $("#contenido-modal #cerrar").click(function () {
                $("#placa").val("");
            });

            $("#contenido-modal").keypress(function (e) {
                if (e.which == 13) {
                    accionAceptar();
                }
            });


            $.ajax({
                url: "http://localhost/valleyworkshop/ingresos/buscar",
                type: "POST",
                data: { placa_vehiculo },
                success: function (respuesta) {

                    let resultado = JSON.parse(respuesta);

                    if (resultado.error) {

                        $("#contenido-modal .modal-title").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i> Vehículo no Encontrado');
                        $("#contenido-modal .modal-body").html(`El vehículo con placa
                            <span style="font-weight: bolder; color: orange;">${placa_vehiculo}</span>
                            no fue encontrado en los registros.<br>
                            <b>¿Desea registrarlo como nuevo vehiculo?</b>`);

                        $("#contenido-modal").modal();
                        $('#listar-servicios').html('');

                    } else {

                        $("#agregarServicio").prop('disabled', false);

                        vehiculo = resultado[0].vehiculo;
                        propietario = resultado[1].propietario;
                        mantenimiento = resultado[2].mantenimiento;

                        $("#registrarVehiculo").prop('disabled', true);

                        $(".elform input").each(function () {
                            $(this).prop('disabled', true);
                        });
                        $(".elform select").each(function () {
                            $(this).prop('disabled', true);
                        });

                        $("#placa").prop('disabled', false);


                        $("#placa").val(vehiculo.placa);
                        $("#marca").val(vehiculo.marca);
                        $("#linea").val(vehiculo.modelo);
                        $("#modelo").val(vehiculo.anio);
                        $("#tipo").val('A');

                        $("#identificacion").val(propietario.nuid);
                        $("#nombres").val(propietario.nombres);
                        $("#apellidos").val(propietario.apellidos);
                        $("#genero").val(propietario.genero);
                        $("#telefono").val(propietario.telefono);
                        $("#correo  ").val(propietario.correo);
                        $("#direccion").val(propietario.direccion);

                        if (mantenimiento != false) {

                            $("#mant-success-msj").css('background-color', '#2B8EF8');
                            $("#mant-success-msj h5").html("<span style='color: orange;'></span>El vehiculo se encuentra en un mantenimiento pendiente.");

                            $("#mantSi").css('display', 'block');

                            $('#mant-success-msj').slideDown('slow');
                            setTimeout(function () {
                                $('#mant-success-msj').slideUp('slow');
                            }, 2000);

                            //$("#mant-success").css('display', 'block');
                            setTimeout(function () {
                                $('#mant-success').slideDown('slow');
                            }, 2000);



                            $("#agregarServicio").prop('disabled', false);
                            servicios = resultado[3].servicios;
                            mostrarServicios();

                        }
                    }

                }

            });
        }
    }

    $("#buscar_vehiculo").click(BusquedaVehiculo);
    $("#placa").keypress(function (e) {
        if (e.which == 13) {
            BusquedaVehiculo();
        }
    });

    let code_service;
    let element_li;

    $(document).on('click', "#deleteServicio", function () {

        element_li = $(this)[0].parentElement.parentElement.parentElement.parentElement;
        code_service = $(this)[0].parentElement.parentElement.firstElementChild.lastChild.nodeValue;

        $("#contenido-modal-Service .modal-title").html(`<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i> Eliminar servicio <span style="color: orange">[${code_service}]</span>`);
        $("#contenido-modal-Service .modal-body").html(`
                    <b>¿Desea Eliminar el servicio selecionado?</b>`);
        $("#contenido-modal-Service").modal();
    });

    document.getElementById("aceptarS").addEventListener('click', function () {

        $("#contenido-modal-Service").modal("hide");
        $.post('http://localhost/valleyworkshop/ingresos/eliminarServicio', { code_service, mantenimiento, servicios }, function (respuesta) {

            let resultado = JSON.parse(respuesta);

            if (resultado.eliminado) {

                buttonsDelete = (document.querySelectorAll("#deleteServicio"));
                servicios = resultado.servicios;

                $("#container-service").animate({
                    //scrollLeft: "+=0px"
                }, 1000, function () {
                    $(this).animate({
                        scrollLeft: "-=320px"
                    }, 1000)

                });



                Swal.fire({
                    title: '¡Servicio eliminado correctamente!',
                    icon: 'success',
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutRight animate__fast'
                    },
                    timer: 3000
                })

                $(element_li).animate({
                    //marginLeft: "-=0px"
                }, 0, function () {

                    $(this).css("margin-top", "0px");
                    $(this).animate({
                        marginTop: "+=420px"
                    }, 1000);
                });

                for (i = 0; i < buttonsDelete.length; i++) {

                    if (buttonsDelete[i].parentElement.parentElement.parentElement.parentElement == element_li) {


                        element_li_next = buttonsDelete[i + 1].parentElement.parentElement.parentElement.parentElement;
                        $(element_li_next).animate({
                            marginLeft: "-=0px"
                        }, 0, function () {

                            $(this).css("margin-top", "0px");
                            $(this).animate({
                                marginLeft: "-=332px"
                            }, 1000);
                        });


                    }

                    setTimeout(function () {

                        mostrarServicios();
                        return false;

                    }, 2000);
                }

            }




        });



    });

    $("#agregarServicio").click(function (event) {
        event.preventDefault();

        if ($("#placa").val() == '') {

            $("#placa").focus();

            window.scroll(0, 0);

            console.log("paso algo");
            $("#error-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                + "<span style='color: orange;'></span> Por favor digite la placa.");

            $('#error-msj').slideDown('slow');
            setTimeout(function () {
                $('#error-msj').slideUp('slow');
            }, 2000);

        } else {

            if (vehiculo == null) {
                $("#error-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                    + "<span style='color: orange;'></span> Por favor registre el vehiculo.");

                $('#error-msj').slideDown('slow');
                setTimeout(function () {
                    $('#error-msj').slideUp('slow');
                }, 6000);
            } else {

                if (validator.form()) {

                    $("#ingresarVehiculo").prop('disabled', false);

                    try {
                        let code_service = $("#servicio").val();
                        $.ajax({
                            url: "http://localhost/valleyworkshop/ingresos/agregarServicio",
                            type: "POST",
                            data: { code_service, servicios },
                            success: function (respuesta) {
                                let resultado = JSON.parse(respuesta);
                                servicios = resultado.servicios;

                                //SI EL SERVICIO SE ENCUENTRA EN EL LISTADO DE LOS SERVICIOS AGREGADOS ARROJA ERROR DE DUPLICADO.
                                if (resultado.error == true) {

                                    $("#insertado").css("background", "#35528C");
                                    $("#insertado h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                                        + "El servicio con codigo <span style='color: orange;'>" + code_service + "</span> ya se encunetra registrado.");

                                    $('#insertado').slideDown('slow');
                                    setTimeout(function () {
                                        $('#insertado').slideUp('slow');
                                    }, 4000);

                                    throw new Error("El servicio ya se encuentra registrado.");
                                }

                                mostrarServicios();


                                $("#service-li:last-child").animate({
                                    marginLeft: "-=0px"
                                }, 0, function () {

                                    //$(this).delay("2000"); Funcion Espera un momento.
                                    $(this).css("margin-left", "1040px");
                                    $(this).animate({
                                        marginLeft: "-=1040px"
                                    }, 1000)
                                });

                                $("#container-service").animate({
                                    scrollLeft: "+=0px"
                                }, 1000, function () {
                                    $(this).animate({
                                        scrollLeft: "+=400px"
                                    }, 1000)

                                });

                            }

                        });

                    } catch (error) {
                        console.error(error);
                    }


                }

            }

        }


    });

    $("#ingresarVehiculo").click(function (event) {

        event.preventDefault();

        if ($("#placa").val() == '') {

            window.scroll(0, 0);
            $("#placa").focus();


            $("#error-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                + "<span style='color: orange;'></span> Por favor digite la placa.");

            $('#error-msj').slideDown('slow');
            setTimeout(function () {
                $('#error-msj').slideUp('slow');
            }, 2000);


        } else {

            if (vehiculo == null) {

                window.scroll(0, 0);


                $("#error-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                    + "<span style='color: orange;'></span> Por favor registre el vehiculo.");

                $('#error-msj').slideDown('slow');
                setTimeout(function () {
                    $('#error-msj').slideUp('slow');
                }, 6000);


            } else {

                if (validator.form()) {

                    if (servicios == []) {
                        Swal.fire({
                            title: '¡Mantenimiento sin Servicios!',
                            text: 'Por favor registre algun servicio al mantenimiento.',
                            icon: 'error',
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                            },
                            timer: 3000
                        })
                        return false;
                    } else {

                        $("#ingresarVehiculo").prop('disabled', false);

                        try {

                            let code_service = $("#servicio").val();

                            $.ajax({
                                url: "http://localhost/valleyworkshop/ingresos/ingresar",
                                type: "POST",
                                data: { code_service, vehiculo, mantenimiento, servicios },
                                success: function (respuesta) {

                                    let resultado = JSON.parse(respuesta);

                                    if (resultado.servicios_null) {
                                        Swal.fire({
                                            title: '¡Sin servicios asignados!',
                                            text: "Matenimiento no puede ser ingresado sin servicios asignados.",
                                            icon: 'error',
                                            timer: '5000',
                                            //showConfirmButton: false,

                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                                            }
                                        })
                                        throw new Excption("Servicios null");
                                    }



                                    if (resultado.insertado) {

                                        Swal.fire({
                                            title: '¡Insertado Correctamente!',
                                            text: 'Exitosamente fue registrado como mantenimiento pendiente',
                                            icon: 'success',
                                            timer: '5000',
                                            //showConfirmButton: false,

                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutRight animate__fast'
                                            }
                                        })



                                        document.getElementById("Formulario").reset();
                                        $('#listar-servicios').html('');
                                        vehiculo = null;
                                        propietario = null;
                                        servicios = null;
                                        mantenimiento = null;
                                        template = '';
                                        $("#mantSi").css('display', 'none');

                                    }


                                }

                            });

                        } catch (error) {
                            console.error(error);
                        }

                    }


                }

            }

        }



    });

})






