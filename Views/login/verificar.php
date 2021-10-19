
<?php
require_once "./Config/conection.php";
require_once "./Models/User.php";

sleep(1);

if (!(empty($_POST['user_login']) || empty($_POST['pass_login']))) {

    $user = $_POST['user_login']; // = Wilman
    $pass = $_POST['pass_login']; // = 1234

    $elUsuario = new User();
    $registro = $elUsuario->verificar($user);
    $datos = $registro->fetchAll(PDO::FETCH_OBJ);



    foreach ($datos as $i) {

        if ($i->user == $user && password_verify($pass, $i->pass)) {

            echo json_encode(['error' => false, 'tipo' => $i->tipo_user]);

            session_start(['user']);
            $_SESSION['user'] = $i->user;
        } else {
            echo json_encode((['error' =>  true]));
        }
    }
} else {
    echo json_encode((['error' =>  true]));
}



?>