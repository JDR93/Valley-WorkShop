<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="JD Enterprise">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['page_tag']; ?></title>

    <link rel="icon" href="./Assets/img/service.png" type="image/png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php base_url() ?>Assets/css/login.css">
</head>

<body>

    <!------------ Thanks Daniel Almeida for the reference  ----------->
    <!-- https://dribbble.com/shots/4027518-Login-screen-intermethod -->


    <form method="POST" id="formulario_login">

        <div class="login-wrapper">

            <div class="login-left">
                <img src="./Assets/img/nebula.jpg">
                <div class="h1">Enter the Nebula</div>
            </div>

            <div class="login-right">
                <div class="h2">Administración</div>
                <div class="form-group">
                    <input type="text" id="full-name" class="user_login" name="user_login" placeholder="Nombre de usuario">
                </div>
                <div class="form-group">
                    <input type="password" id="Password" class="pass_login" name="pass_login" placeholder="Contraseña">
                </div>
                <div class="button-area">
                    <input type="submit" id="enviar_login" name="submit" class="btn btn-secondary btn-ingresar btn_login" value="ingresar">
                </div>

                <h4 class="registrarse">¿Olvidaste la contraseña? <a href="#">Recuperar</a></h4>

            </div>

            <div class="error">
                <span>Usuario o contraseña incorrectos.</span>
            </div>
            <div class="error_campo_vacio">
                <span>Digite los campos vacios.</span>
            </div>
            <div class="error_correo">
                <span>Porfavor dígite un correo válido.</span>
            </div>
            <div class="correo_enviado">
                <span>Se ha enviado un email a tu cuenta de correo.</span>
            </div>


    </form>


    <!--/////////////////////////////////////////////
        JQUERY PARA LOGIN-INGRESO
        ///////////////////////////////////////////// -->

    <script>
        $(function(login) {
            jQuery(document).on('submit', '#formulario_login', function(event) {
                event.preventDefault();

                jQuery.ajax({
                        url: '<?php base_url() ?>Login/verificar',
                        type: 'POST',
                        dataType: 'json',
                        data: $(this).serialize(),

                    })
                    .done(function(respuesta) {
                        if (!respuesta.error) {
                            //if (respuesta.tipo == 'Admininstrador') {
                                location.href = '<?php echo base_url() ?>Dashboard';
                            //}

                        } else {
                            var user, pass;

                            user = $(".user_login").val();
                            pass = $(".pass_login").val();

                            console.log(user);
                            console.log(pass);

                            if (user.length == 0 || pass.length == 0) {
                                $('.error_campo_vacio').slideDown('slow');
                                setTimeout(function() {
                                    $('.error_campo_vacio').slideUp('slow');
                                }, 2000);
                            } else {
                                $('.error').slideDown('slow');
                                setTimeout(function() {
                                    $('.error').slideUp('slow');
                                }, 2000);
                            }

                        }
                    })
                    .fail(function(resp) {
                        console.log(resp.responseText);
                    })
                    .always(function() {
                        console.log("complete");
                    });
            });

        });
    </script>


    <form method="POST" id="formulario_recuperar" action="">

        <div class="login-register">
            <div class="h2">Recuperar contraseña</div>

            <div class="form-group">
                <input type="text" id="correo" name="correo_register" placeholder="Digite su correo electronico" autocomplete="off">
            </div>
            <div class="button-area">
                <input type="button" id="enviar_correo" name="enviar_correo" class="btn btn-secondary btn-ingresar btn_recuperar" value="Recuperar">
                <h4 class="registrarse ingresar">¿La recordaste? <a href="#">Ingresar</a></h4>
            </div>
        </div>
    </form>




    <script>
        $('#enviar_correo').click(function() {

            var correo = document.getElementById('correo').value;
            var ruta = "correo=" + correo;

            jQuery.ajax({
                    url: '<?php base_url() ?>Login/recuperar',
                    type: 'POST',
                    dataType: 'json',
                    data: ruta,
                })
                .done(function(respuesta) {
                    console.log("success");
                    console.log("error: " + respuesta.error);
                    console.log("correo: " + respuesta.correo);
                    console.log("filter: " + respuesta.filter);


                    if (respuesta.correo == '' && respuesta.error) {
                        $('.error_campo_vacio').slideDown('slow');
                        setTimeout(function() {
                            $('.error_campo_vacio').slideUp('slow');
                        }, 2000);

                    }

                    if (respuesta.filter == false) {
                        $('.error_correo').slideDown('slow');
                        setTimeout(function() {
                            $('.error_correo').slideUp('slow');
                        }, 4000);

                    }

                    if (respuesta.send) {
                        $('.correo_enviado').slideDown('slow');
                        setTimeout(function() {
                            $('.correo_enviado').slideUp('slow');
                        }, 4000);
                        document.getElementById("correo").value = "";

                    }


                })
                .fail(function(resp) {
                    console.log(resp.responseText);
                })
                .always(function() {
                    console.log("complete");
                });
        });
    </script>





    <script>
        var openLoginRight = document.querySelector('.h1');
        var loginWrapper = document.querySelector('.login-wrapper');

        openLoginRight.addEventListener('click', function() {
            loginWrapper.classList.toggle('open');
        });

        // Acciones registrarme


        var openRegister = document.querySelector('.registrarse');
        var loginRight = document.querySelector('.login-right');
        var loginRegister = document.querySelector('.login-register');
        var openLogin = document.querySelector('.ingresar');


        openRegister.addEventListener('click', function() {
            loginRight.classList.toggle('open-register');
            loginRegister.classList.toggle('open-register');
        });

        openLogin.addEventListener('click', function() {
            loginRight.classList.remove("open-register");
            loginRegister.classList.remove("open-register");
        });
    </script>

</body>

</html>