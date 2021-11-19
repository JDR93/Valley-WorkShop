
$(document).ready(function () {

    let vehiculo = null;
    let propietario = null;
    let arrayServicios = [];
    let listServicios = [];
    let id_vehiculo = null;


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
            identificacion: {
                digits: true,
                required: true,
            }
            ,
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
                email: true,
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
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>",
                email: "Email no valido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>",

            }
            ,
            direccion: {
                required: "Campo requerido <i style='color: #8E1E1F;' class='fas fa-times-circle'></i>"
            }
        }




    });


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

                id_vehiculo = res.id_vehiculo;

                if (res.registrado) {

                    $("#registrarVehiculo").prop('disabled', true);
                    $("#Formulario .elform.input").each(function () {
                        $(this).prop('disabled', true);
                    });
                    $("#Formulario .elform.select").each(function () {
                        $(this).prop('disabled', true);
                    });

                    $("#placa").prop('disabled', false);


                    $("#success-msj h5").html('<i style="color:#fff" class="fas fa-check-circle mr-2"></i>'
                        + "Vehiculo registrado correctamente");

                    $('#success-msj').slideDown('slow');
                    setTimeout(function () {
                        $('#success-msj').slideUp('slow');
                    }, 4000);


                }
            }).always(function () {
                $("#registrarVehiculo").html('Registrar Vehículo');
            }).fail(function (err) {
                alert("Hubo un error en la petición.");
            })
        }

    }


    $("#registrarVehiculo").click(formularizar_formulario);


    $(document).bind("click", function () {
        console.log(id_vehiculo);
    });


    $("#cerrar").click(function () {
        $("#placa").triggerHandler("focus");
    })

    function BusquedaVehiculo() {

        $('#listar-servicios').html('');
        listServicios.length = 0;
        arrayServicios.length = 0;

        let placa_vehiculo = $("#placa").val();
        if (placa_vehiculo == '') {

            $("#error-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                + "<span style='color: orange;'></span> Por favor digite la placa.");

            $('#error-msj').slideDown('slow');
            setTimeout(function () {
                $('#error-msj').slideUp('slow');
            }, 4000);

        } else {

            function accionAceptar() {
                $('#registrarVehiculo').removeClass('disabled');
                $('#contenido-modal').modal('hide');

                $("#Formulario input").each(function () {
                    $(this).removeAttr('disabled');
                });
                $("#Formulario select").each(function () {
                    $(this).removeAttr('disabled');
                });

                $("#registrarVehiculo").removeAttr('disabled');
            }

            $("#contenido-modal").keypress(function (e) {
                if (e.which == 13) {
                    accionAceptar();
                    $("#marca").focus();
                }
            });

            $("#contenido-modal #aceptar").click(function () {
                accionAceptar();
                $("#marca").focus();
            });

            $("#contenido-modal #cerrar").click(function () {
                $("#placa").val("");
            });

            $.ajax({
                url: "http://localhost/valleyworkshop/ingresos/buscar",
                type: "POST",
                data: { placa_vehiculo },
                success: function (respuesta) {

                    let resultado = JSON.parse(respuesta);
                    let error = resultado.vehiculo_encontrado;

                    if (error == false) {
                        document.getElementById("Formulario").reset();
                        $("#placa").val(placa_vehiculo);


                        $("#contenido-modal .modal-title").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i> Vehículo no Encontrado');
                        $("#contenido-modal .modal-body").html(`El vehículo con placa
                            <span style="font-weight: bolder; color: orange;">${placa_vehiculo}</span>
                            no fue encontrado en los registros.<br>
                            <b>¿Desea registrarlo como nuevo vehiculo?</b>`);
                        $("#contenido-modal").modal();
                        $('#listar-servicios').html('');

                    } else {

                        if (resultado.length != 0) {

                            $("#agregarServicio").prop('disabled', false);

                            vehiculo = resultado[0].vehiculo;
                            propietario = resultado[1].propietario;

                            id_vehiculo = vehiculo.id;

                            $("#placa").val(vehiculo.placa);
                            $("#marca").val(vehiculo.marca);
                            $("#linea").val(vehiculo.linea);
                            $("#modelo").val(vehiculo.modelo);
                            $("#tipo").val(vehiculo.tipo);

                            $("#identificacion").val(propietario.nuid);
                            $("#nombres").val(propietario.nombres);
                            $("#apellidos").val(propietario.apellidos);
                            $("#genero").val(propietario.genero);
                            $("#telefono").val(propietario.telefono);
                            $("#correo  ").val(propietario.correo);
                            $("#direccion").val(propietario.direccion);

                            console.log(resultado);

                            if (resultado.length == 3) {
                                servicios = resultado[2].servicios;

                                let template = '';
                                servicios.forEach(servicio => {
                                    template += `<li id="service-li" style="position: relative; left: 0px;   width: 300px; margin-right:2em;">
                                                                    <!-- Square card -->
                                                                    <div class="container container-card_service">
                                                                        <div class="card">
                                                                            <span name="code" id="code-tarjeta" class="badge">${servicio.codigo}</span>
                                                                            <h4 class="card-title">${servicio.nombre}</h4>
                                                                            <div class="card-header">
                                                                                <img style="width: 100%;" src="Assets/img/images.services/${servicio.imagen}" alt="">
                                                                            </div>
                                                                            <div class="card-body">
                            
                                                                                <p class="card-text">${servicio.descripcion}</p>
                                                                            </div>
                            
                            
                                                                            <div class="card-footer text-muted">
                                                                                <span class="badge bg-secondary" style="width: 100%; color: #fff; padding: 1em 2em; background-color: #aaa !important; float: right; ">$ ${servicio.costo}</span>
                                                                            </div>
                            
                                                                        </div>
                                                                    </div>
                                                                </li>`
                                });
                                $('#listar-servicios').html(template);

                            }

                        }

                    }




                    /*
                    btnRegistrarVeh = document.getElementById('registrarVehiculo');
    
    
                    if (respuesta != 0) {
    
                        let vehiculo = JSON.parse(respuesta);
    
    
                        id_vehiculo = vehiculo[0].id;
    
                        id_mantenimiento = vehiculo[3];
    
                        $("#placa").val(vehiculo[0].placa);
                        $("#marca").val(vehiculo[0].marca);
                        $("#linea").val(vehiculo[0].linea);
                        $("#modelo").val(vehiculo[0].modelo);
                        $("#tipo").val(vehiculo[0].tipo);
    
                        $("#identificacion").val(vehiculo[1].nuid);
                        $("#nombres").val(vehiculo[1].nombres);
                        $("#apellidos").val(vehiculo[1].apellidos);
                        $("#genero").val(vehiculo[1].genero);
                        $("#telefono").val(vehiculo[1].telefono);
                        $("#correo  ").val(vehiculo[1].correo);
                        $("#direccion").val(vehiculo[1].direccion);
    
                        let template = '';
    
                        if (vehiculo[2] != undefined) {
    
                            listServicios = vehiculo[2];
    
                            listServicios.forEach(servicio => {
                                template += `<li id="service-li" style="position: relative; left: 0px;   width: 300px; margin-right:2em;">
                                                                    <!-- Square card -->
                                                                    <div class="container container-card_service">
                                                                        <div class="card">
                                                                            <span name="code" id="code-tarjeta" class="badge">${servicio.codigo}</span>
                                                                            <h4 class="card-title">${servicio.nombre}</h4>
                                                                            <div class="card-header">
                                                                                <img style="width: 100%;" src="Assets/img/images.services/${servicio.imagen}" alt="">
                                                                            </div>
                                                                            <div class="card-body">
                            
                                                                                <p class="card-text">${servicio.descripcion}</p>
                                                                            </div>
                            
                            
                                                                            <div class="card-footer text-muted">
                                                                                <span class="badge bg-secondary" style="width: 100%; color: #fff; padding: 1em 2em; background-color: #aaa !important; float: right; ">$ ${servicio.costo}</span>
                                                                            </div>
                            
                                                                        </div>
                                                                    </div>
                                                                </li>`
                            });
                            $('#listar-servicios').html(template);
    
                        }
                        $('#registrarVehiculo').addClass('disabled');
    
                    } else {
                        $('#registrarVehiculo').removeClass('disabled');
                        $("#Formulario").trigger('reset');
                        $("#placa").val(valor);
                        $('#listar-servicios').html('');
                        id_vehiculo = null;
                    }
                    */
                }, error: function () {
                    console.log("ocurrió un error.");
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


    $("#agregarServicio").click(function (event) {
        event.preventDefault();



        if ($("#placa").val() == '') {

            console.log("paso algo");
            $("#error-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                + "<span style='color: orange;'></span> Por favor digite la placa.");

            $('#error-msj').slideDown('slow');
            setTimeout(function () {
                $('#error-msj').slideUp('slow');
            }, 4000);

        } else {

            if (id_vehiculo == null) {
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
                        let placa = $("#placa").val();
                        let code_service = $("#servicio").val();

                        console.log(code_service);

                        listServicios.forEach(servicio => {



                            //SI EL SERVICIO SE ENCUENTRA EN EL LISTADO DE LOS SERVICIOS AGREGADOS ARROJA ERROR DE DUPLICADO.
                            
                            if (servicio.codigo == code_service) {
                                $("#error-services-null h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                                    + "El servicio con codigo <span style='color: orange;'>" + code_service + "</span> ya se encunetra registrado.");
            
                                $('#error-services-null').slideDown('slow');
                                setTimeout(function () {
                                    $('#error-services-null').slideUp('slow');
                                }, 4000);
            
                                throw new Error("El servicio ya se encuentra registrado.");
                            }
                        });

                        if (listServicios.includes(code_service) == false) {


                            $.ajax({
                                url: "http://localhost/valleyworkshop/ingresos/agregarServicio",
                                type: "POST",
                                data: { code_service },
                                success: function (respuesta) {

                                    let servicios = JSON.parse(respuesta);
                                    let template = '';


                                    servicios.forEach(servicio => {
                                        listServicios.push(servicio);
                                    });

                                    arrayServicios.push(servicios[0].codigo);

                                    listServicios.forEach(servicio => {

                                        template += `<li id="service-li" style="position: relative; left: 0px;   width: 300px; margin-right:2em;">
                                                                        <!-- Square card -->
                                                                        <div class="container container-card_service">
                                                                            <div class="card">
    
                                                                                <span name="code" id="code-tarjeta" class="badge">${servicio.codigo}</span>
                                                                                <h4 class="card-title">${servicio.nombre}</h4>
                                                                                <div class="card-header">
                                                                                    <img style="width: 100%;" src="Assets/img/images.services/${servicio.imagen}" alt="">
                                                                                </div>
                                                                                <div class="card-body">
                                
                                                                                    <p class="card-text">${servicio.descripcion}</p>
                                                                                </div>
                                
                                
                                                                                <div class="card-footer text-muted">
                                                                                    <span class="badge bg-secondary" style="width: 100%; color: #fff; padding: 1em 2em; background-color: #aaa !important; float: right; ">$ ${servicio.costo}</span>
                                                                                </div>
                                
                                                                            </div>
                                                                        </div>
                                                                    </li>`
                                    });
                                    $('#listar-servicios').html(template);



                                    if (listServicios.length < 2) {
                                        $("#service-li:last-child").animate({
                                            marginLeft: "-=0px"
                                        }, 0, function () {

                                            //$(this).delay("2000"); Funcion Espera un momento.
                                            $(this).css("margin-left", "1100px");
                                            $(this).animate({
                                                marginLeft: "-=1100px"
                                            }, 1000)
                                        });
                                    } else {
                                        $("#service-li:last-child").animate({
                                            marginLeft: "-=0px"
                                        }, 0, function () {

                                            //$(this).delay("2000"); Funcion Espera un momento.
                                            $(this).css("margin-left", "800px");
                                            $(this).animate({
                                                marginLeft: "-=800px"
                                            }, 1000)
                                        });
                                    }

                                }

                            });


                        } else {

                            $("#error-duplicate-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                                + "El servicio con codigo <span style='color: orange;'>" + valor + "</span> ya se encunetra registrado.");

                            $('#error-duplicate-msj').slideDown('slow');
                            setTimeout(function () {
                                $('#error-duplicate-msj').slideUp('slow');
                            }, 4000);
                        }




                    } catch (error) {
                        console.error(error);
                    }

                    setTimeout(function () {
                        document.getElementById('container-service').scrollLeft += 1000;
                    }, 2000);
                }

            }

        }


    });


    $("#ingresarVehiculo").click(function (event) {
        event.preventDefault();

        if (validator.form()) {
            if (arrayServicios.length == 0) {
                $("#error-services-null").css('background-color', '#35528C');
                $("#error-services-null h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                    + "<span style='color: orange;'></span>No se puede ingresar vehiculo sin servicios registrados.");

                $('#error-services-null').slideDown('slow');
                setTimeout(function () {
                    $('#error-services-null').slideUp('slow');
                }, 5000);

                throw new Error("Array Servicios null.");
            }

            $.ajax({

                url: "http://localhost/valleyworkshop/ingresos/ingresar",
                type: "POST",
                data: { 'id_vehiculo': id_vehiculo, arrayServicios },

                beforeSend: function () {
                    $("#ingresarVehiculo").html('Ingresando Vehiculo...');
                },

                success: function (respuesta) {

                    let resultado = JSON.parse(respuesta);

                    /*
     
                    if (respuesta.includes('constraint violation')) {
                        $("#error-services-null h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                            + "<span style='color: orange;'></span>El vehiculo ya se encuentra en un mantenimiento pendiente.");
     
                        $('#error-services-null').slideDown('slow');
                        setTimeout(function () {
                            $('#error-services-null').slideUp('slow');
                        }, 5000);
     
                        throw new Error("Violacion duplicado de llaves.");
                    }
                    */

                    if (resultado[0].insertado) {

                        $("#error-services-null").css('background-color', '#00D440');
                        $("#error-services-null h5").html('<i class="fas fa-car mr-2"></i>'
                            + "<span>Vehiculo ingresado correctamente.</span>");

                        $('#error-services-null').slideDown('slow');
                        setTimeout(function () {
                            $('#error-services-null').slideUp('slow');
                        }, 5000);


                        document.getElementById("Formulario").reset();
                        $('#listar-servicios').html('');
                        listServicios.length = 0;
                        arrayServicios.length = 0;
                        $("#registrarVehiculo").prop('disabled', true);
                    }

                },
                complete: function () {
                    $("#ingresarVehiculo").html('Ingresar Vehiculo');
                }
            });
        }
    });

})






