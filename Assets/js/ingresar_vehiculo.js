
$(document).ready(function (event) {

    let id_vehiculo = null;
    let id_mantenimiento = null;
    let arrayServicios = [];

    $(document).bind("click", function () {
        console.log(id_vehiculo);
    });


    $("#placa").blur(function () {

        //$('#listar-servicios').html('');
        //id_mantenimiento = null;

        let valor = $(this).val();

        $.ajax({
            url: "http://localhost/valleyworkshop/ingresos/buscar",
            type: "POST",
            data: { valor },
            success: function (respuesta) {


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
            }
        });

    });

    let listServicios = [];
    $("#agregarServicio").click(function (event) {


        if ($("#placa").val() == '') {
            $("#error-duplicate-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                + "<span style='color: orange;'></span> Por favor digite la placa.");

            $('#error-duplicate-msj').slideDown('slow');
            setTimeout(function () {
                $('#error-duplicate-msj').slideUp('slow');
            }, 4000);
        } else {

            try {
                let placa = $("#placa").val();
                let code_service = $("#servicio").val();

                console.log(code_service);

                listServicios.forEach(servicio => {
                    //SI EL SERVICIO SE ENCUENTRA EN EL LISTADO DE LOS SERVICIOS AGREGADOS ARROJA ERROR DE DUPLICADO.
                    if (servicio.codigo == code_service) {
                        $("#error-duplicate-msj h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                            + "El servicio con codigo <span style='color: orange;'>" + code_service + "</span> ya se encunetra registrado.");

                        $('#error-duplicate-msj').slideDown('slow');
                        setTimeout(function () {
                            $('#error-duplicate-msj').slideUp('slow');
                        }, 4000);

                        throw new Error("El servicio ya se encuentra registrado.");
                    }
                });

                if (listServicios.includes(code_service) == false) {


                    $.ajax({
                        url: "http://localhost/valleyworkshop/ingresos/agregarServicio",
                        type: "POST",
                        data: { code_service, placa, id_mantenimiento },
                        success: function (respuesta) {

                            let servicios = JSON.parse(respuesta);
                            let template = '';


                            servicios.forEach(servicio => {
                                listServicios.push(servicio);
                            });

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





    });


    $("#ingresarVehiculo").click(function (event) {

        if (listServicios.length == 0) {
            $("#error-services-null h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                + "<span style='color: orange;'></span>No se puede ingresar vehiculo sin servicios registrados.");

            $('#error-services-null').slideDown('slow');
            setTimeout(function () {
                $('#error-services-null').slideUp('slow');
            }, 5000);

            throw new Error("Array Servicios null.");
        }

        array = document.querySelectorAll("#code-tarjeta");
        for (i = 0; i < array.length; i++) {
            arrayServicios.push(array[i].textContent);
        }

        $.ajax({
            url: "http://localhost/valleyworkshop/ingresos/ingresar",
            type: "POST",
            data: { id_vehiculo, id_mantenimiento, arrayServicios },
            success: function (respuesta) {

                if (respuesta.includes('constraint violation')) {
                    $("#error-services-null h5").html('<i style="color:orange" class="fas fa-exclamation-triangle mr-2"></i>'
                        + "<span style='color: orange;'></span>El vehiculo ya se encuentra en un mantenimiento pendiente.");

                    $('#error-services-null').slideDown('slow');
                    setTimeout(function () {
                        $('#error-services-null').slideUp('slow');
                    }, 5000);

                    throw new Error("Violacion duplicado de llaves.");
                }

                if (respuesta.includes('insertado')) {

                    $("#error-services-null").css('background-color', '#00D440');
                    $("#error-services-null h5").html('<i class="fas fa-car mr-2"></i>'
                        + "<span>Vehiculo ingresado correctamente.</span>");

                    $('#error-services-null').slideDown('slow');
                    setTimeout(function () {
                        $('#error-services-null').slideUp('slow');
                    }, 5000);
                }
            }
        });

    });

    /*
     
    $("#registrarVehiculo").click(function (event) {
     
        datos = {
            placa: $('#placa').val(),
            marca: $("#marca").val(),
            linea: $("#linea").val(),
            modelo: $("#modelo").val(),
            tipo: $("#tipo").val(),
            identificacion: $("#identificacion").val(),
            nombres: $("#nombres").val(),
            apellidos: $("#apellidos").val(),
            genero: $("#genero").val(),
            telefono: $("#telefono").val(),
            correo: $("#correo  ").val(),
            direccion: $("#direccion").val()
        };
     
        $.ajax({
            url: "http://localhost/valleyworkshop/ingresos/registrarVehiculo",
            type: "POST",
            data: datos,
            success: function (respuesta) {
                console.log(respuesta);
                btnRegistrarVeh.disabled = true;
     
            }
        });
     
     
    });
     
    */

    $("#Formulario").on('submit', function (event) {

        valor = $("#servicio").val();

        $.ajax({
            type: 'POST',
            url: 'http://localhost/valleyworkshop/ingresos/insertar',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false

        }).done(function (respuesta) {
            console.log(respuesta);
        }).fail(function (resp) {
            console.log(resp.responseText);
        }).always(function () {
            console.log("complete");
        });
        event.preventDefault();
        $("#Formulario").trigger('reset');
    });



})






