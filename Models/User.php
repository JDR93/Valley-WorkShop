<?php


class User {
    private $user;
    private $pass;
    private $email;
    private $tipo;


    public function __construct()
    {
    }

    public function insertar($user,$pass,$email,$tipo){
        require_once "../../conection.php";
        $conexion = BD::instanciar();
        $resulset = $conexion->prepare('INSERT INTO users(user,pass,email,tipo_user) VALUES(?,?,?,?)');

        //Encriptanco contraseña
        $passHash = password_hash($pass, PASSWORD_ARGON2I);
        $resulset->execute([$user,$passHash,$email,$tipo]);
    }

    public function verificar($usuario){
        require_once "../../conection.php";
        $conexion = BD::instanciar();
        $resulset = $conexion->prepare('SELECT * FROM users WHERE user = ?');
        $resulset->execute([$usuario]);


        return $resulset;


    }
}

?>