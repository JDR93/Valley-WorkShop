
<?php
require_once "./Config/conection.php";
require_once "./Models/User.php";

sleep(1);

if (!(empty($_POST['user_login']) || empty($_POST['pass_login']))) {

    // Almacenando datos
    $user = $_POST['user_login'];
    $pass = $_POST['pass_login'];

    $elUsuario = new User();
    $registro = $elUsuario->verificar($user);

    $dato = $registro->fetch(PDO::FETCH_OBJ);

    if ($registro->rowCount() != 0) {

        if ($dato->user == $user && password_verify($pass, $dato->pass)) {
            echo json_encode(['error' => false, 'tipo' => $dato->tipo_user]);
            session_start(['user']);
            $_SESSION['user'] = $dato->user;
            $_SESSION['rol'] = $dato->tipo_user;
        } else if (!password_verify($pass, $dato->pass)) {
            echo json_encode((['error' =>  true]));
        }
    }else{
        echo json_encode((['error' =>  true]));
    }
} else {
    echo json_encode((['error' =>  true]));
}

?>