<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>

    <link rel="icon" href="./Assets/img/service.png" type="image/png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./Assets/css/login.css">
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

                <h4 class="registrarse">¿No tienes una cuenta? <a href="#">Registrarme</a></h4>

            </div>

            <div class="error">
                <span>Usuario o contraseña incorrectos.</span>
            </div>
            <div class="error_campo_vacio">
                <span>Digite los campos vacios.</span>
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
                        url: 'Login/verificar',
                        type: 'POST',
                        dataType: 'json',
                        data: $(this).serialize(),


                        beforeSend: function() {
                            $('.btn_login').val('Validando...');
                        }


                    })
                    .done(function(respuesta) {
                        console.log(respuesta);
                        if (!respuesta.error) {
                            if (respuesta.tipo == 'Admin') {
                                location.href = '<?php echo base_url()?>Dashboard';
                            }

                        } else {
                            var user, pass;

                            user = $(".user_login").val();
                            pass = $(".pass_login").val();

                            if (user.length == 0 || pass.length == 0) {
                                $('.error_campo_vacio').slideDown('slow');
                                setTimeout(function() {
                                    $('.error_campo_vacio').slideUp('slow');
                                }, 2000);
                            } else {
                                $('.error').slideDown('slow');
                            }

                            setTimeout(function() {
                                $('.error').slideUp('slow');
                            }, 2000);

                            $('.btn_login').val('INGRESAR');

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




    <form method="POST" id="formulario_register" method="insertar.php">

        <div class="login-register">
            <div class="h2">Registrar Usuario</div>
            <div class="form-group">
                <input type="text" id="user_register" name="user_register" placeholder="Nombre de usuario" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" id="tipo_register" name="tipo_register" placeholder="Tipo de usuario" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="text" id="correo_register" name="correo_register" placeholder="Correo electronico" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" id="pass_register" name="pass_register" placeholder="Contraseña" autocomplete="off">
            </div>
            <div class="button-area">
                <input type="SUBMIT" id="enviar_registro" name="submit" class="btn btn-secondary btn-ingresar btn_registrar" value="Registrarse">
                <h4 class="registrarse ingresar">¿Ya tienes cuenta? <a href="#">Ingresar</a></h4>
            </div>

        </div>

    </form>





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