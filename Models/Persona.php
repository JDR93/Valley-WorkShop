<?php

require_once "./Libraries/Core/MySql.php";


class Persona extends Mysql {

    public $nuid;
    public $nombres;
    public $apellidos;
    public $genero;

    public function __construct($nuid,$nombres,$apellidos,$genero)
    {
        parent::__construct();

        $this->nuid = $nuid;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
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
        $this->name = $value;
    }
}

?>