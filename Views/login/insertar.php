<?php

include "../../conection.php";
include "../../models/User.php";

if ($_POST['user_register'] != '' || $_POST['pass_register'] != '' || $_POST['correo_register'] != '' || $_POST['tipo_register'] != '') {



    $user = $_POST['user_register'];
    $password = $_POST['pass_register'];
    $correo = $_POST['correo_register'];
    $tipo = $_POST['tipo_register'];


    $usuario = new User();
    $usuario->insertar($user,$password,$correo,$tipo);

    header("Location: http://localhost:3000/views/login/inicio.php");
}

?>
