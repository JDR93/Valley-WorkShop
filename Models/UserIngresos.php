<?php

require_once "./Libraries/Core/MySql.php";

class UserIngresos extends Persona {

    private $user;
    private $password;
    private $codigo;
    private $telefono;
    private $correo;

    public function __construct($nuid,$nombres,$apellidos,$genero,$codigo,$telefono,$correo)
    {
        parent::__construct($nuid,$nombres,$apellidos,$genero);
        
        $this->$codigo = $codigo;
        $this->$telefono = $telefono;
        $this->$correo = $correo;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}

?>