
$(document).ready(function () {

    let edit = false;

    listarServicios();

    $("#input-buscar").keyup(function () {

        if ($(this).val()) {
            let valor = $(this).val();

            $.ajax({
                url: "/valleyworkshop/Views/registrar_servicios/buscar.php",
                type: "POST",
                data: { valor },
                success: function (respuesta) {
                    let servicios = JSON.parse(respuesta);
                    let template = '';

                    servicios.forEach(servicio => {
                        template += `<tr serviceCode="${servicio.codigo}" ><td> ${servicio.codigo} </td>` + `<td> ${servicio.nombre} </td>` +
                            `<td> ${servicio.costo} </td>` + `<td> ${servicio.imagen} </td>` +
                            `<td> ${servicio.descripcion}</td>` +
                            `<td><button id="btn-delete" type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>` +
                            `<button id="btn-edit" type="button" class="btn btn-success ml-2"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                    });

                    $("#resultado").html(template);
                }


            });
        }

    })



    $("#Formulario").submit(function (e) {
        const postData = {
            codigo: $('#codigo').val(),
            precio: $("#precio").val(),
            nombre: $('#nombre').val(),
            imagen: $('#imagen').val(),
            descripcion: $('#descripcion').val(),
            id: $("#idService").val()
        };

        let url = edit === false ? '/valleyworkshop/Views/registrar_servicios/insertar.php' : "/valleyworkshop/Views/registrar_servicios/editar.php";




        $.post(url, postData, function (respuesta) {

            console.log(respuesta);
            edit = false;

            $("#registrar").replaceWith('<button type="submit" name="registrar" id="registrar" class="btn btn-warning btn-lg btn-block">Registrar servicio</button>');
            listarServicios();

            $("#Formulario").trigger('reset');

        });
        e.preventDefault();
    })


    function listarServicios() {
        $.ajax({
            url: '/valleyworkshop/Views/registrar_servicios/listar.php',
            type: 'GET',
            success: function (respuesta) {
                let services = JSON.parse(respuesta);
                let template = '';

                services.forEach(servicio => {
                    template += `<tr serviceCode="${servicio.codigo}" ><td> ${servicio.codigo} </td>` + `<td> ${servicio.nombre} </td>` +
                        `<td> ${servicio.costo} </td>` + `<td> ${servicio.imagen} </td>` +
                        `<td> ${servicio.descripcion}</td>` +
                        `<td><button id="btn-delete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#contenido-modal"><i class="far fa-trash-alt"></i></button>` +
                        `<button id="btn-edit" type="button" class="btn btn-success ml-2"><i class="fas fa-pencil-alt"></i></button></td></tr>`
                });

                $("#resultado").html(template);
            }
        });
    }



    $(document).on('click', "#btn-delete", function () {


        document.getElementById("aceptar").addEventListener('click', function () {
            console.log("Eliminando");
            let element = $("#btn-delete")[0].parentElement.parentElement;
            let code = $(element).attr('serviceCode');
            $.post('/valleyworkshop/Views/registrar_servicios/eliminar.php', { code }, function (respuesta) {
                console.log(respuesta);
                listarServicios();
                $("#cerrar").click()

            });


        });

    });

    $(document).on('click', "#btn-edit", function () {
        let element = $(this)[0].parentElement.parentElement;
        let code = $(element).attr('serviceCode');
        $.post('/valleyworkshop/Views/registrar_servicios/obtener.php', { code }, function (respuesta) {
            const service = JSON.parse(respuesta);

            $('#idService').val(service.id);
            $('#codigo').val(service.codigo);
            $('#precio').val(service.costo);
            $('#nombre').val(service.nombre);
            $('#descripcion').val(service.descripcion);
            edit = true;
            $("#registrar").replaceWith('<button style="color:#fff;" type="submit" name="registrar" id="registrar" class="btn btn-success btn-lg btn-block">Editando servicio</button>')

        })

    })






})

