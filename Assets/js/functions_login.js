
$(function (login) {
    jQuery(document).on('submit', '#formulario_login', function (event) {
        event.preventDefault();


        jQuery.ajax({
            url: 'Login/verificar',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),


            beforeSend: function () {
                $('.btn_login').val('Validando...');
            }


        })
            .done(function (respuesta) {
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
                        setTimeout(function () {
                            $('.error_campo_vacio').slideUp('slow');
                        }, 2000);
                    } else {
                        $('.error').slideDown('slow');
                    }

                    setTimeout(function () {
                        $('.error').slideUp('slow');
                    }, 2000);

                    $('.btn_login').val('INGRESAR');

                }
            })
            .fail(function (resp) {
                console.log(resp.responseText);
            })
            .always(function () {
                console.log("complete");
            });
    });

});




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