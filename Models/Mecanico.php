<?php

require_once "./Libraries/Core/MySql.php";


class Mecanico extends Persona {

    private $codigo;
    private $telefono;
    private $correo;
    private $imagen;

    public function __construct($nuid,$nombres,$apellidos,$genero,$codigo,$telefono,$correo,$imagen)
    {
        parent::__construct($nuid,$nombres,$apellidos,$genero);
        
        $this->codigo = $codigo;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->imagen = $imagen;
    }

    public function __get($property)
    {
        if(property_exists($this, $property)) {
            return $this->$property;
        }else{
            return "Propiedad no existe";
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

}

?>