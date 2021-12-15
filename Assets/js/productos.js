$(document).ready(function (event) {

	$("#buscar_vehiculo").click(function (event) {

		placa = $("#placa").val();

		$.ajax({
			url: "http://localhost/valleyworkshop/productos/buscarMantenimiento",
			type: "POST",
			data: { placa },
			success: function (respuesta) {

				resultado = JSON.parse(respuesta);


				$("#marca").val("res")

				if (resultado.error != true) {

					vehiculo = resultado.vehiculo;
					mecanico = resultado.mecanico;
					mantenimiento = resultado.mantenimiento;
					servicios = resultado.servicios;



					$("#marca").val(vehiculo.marca);
					$("#linea").val(vehiculo.modelo);
					$("#modelo").val(vehiculo.anio);

					template = '';
					templateTarjeta = '';

					servicios.forEach(servicio => {

						template +=
							`<tr >                       
								<td>${servicio[0].codigo}</td>
								<td>${servicio[0].nombre}</td>
								<td>${servicio[0].costo}</td>
								<td style="height: 40px;">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
									</div>
								</td>
							</tr>`

					});



					templateTarjeta += `
                        <div class="card animate__animated animate__wobble" id="tarjeta-perfil">
                            <img class="card-img-top" src="Assets/img/images.perfiles_mecanicos/${mecanico.imagen}" alt="Card image cap">

                            <div class="card-body py-0">

                                <div class="header-card row">
                                    <div class="col-8">
                                        <span id="txtNombre" class="card-title my-0">${mecanico.nombres}</span>
                                        <span id="txtApellido" class="">${mecanico.apellidos}</span>
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

					$('#servicios_registrados').html(template);
					$('#tarjeta-perfil').html(templateTarjeta);


				} else {

					$("#marca").val('');
					$("#linea").val('');
					$("#modelo").val('');

					Swal.fire({
						title: '¡Algo salio mal!',
						text: resultado.mensaje,
						icon: 'error',
						hideClass: {
							popup: 'animate__animated animate__fadeOutRight animate__fast'
						}
					})
				}




			}

		});

	})

	$("#buscar_producto").click(function (event) {

		codigo = $("#codigo").val();

		$.ajax({
			url: "http://localhost/valleyworkshop/productos/buscarProducto",
			type: "POST",
			data: { codigo },
			success: function (respuesta) {

				resultado = JSON.parse(respuesta);


				if (resultado.error != true) {

					producto = resultado.producto;
					$("#nombre").val(producto.nombre);
					$("#costo").val(producto.costo);



				} else {

					Swal.fire({
						title: '¡Algo salio mal!',
						text: resultado.mensaje,
						icon: 'error',
						hideClass: {
							popup: 'animate__animated animate__fadeOutRight animate__fast'
						}
					})
				}




			}

		});

	})



})