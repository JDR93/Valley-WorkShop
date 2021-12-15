<?php

require_once "Libraries/Core/MySql.php";


class Producto extends Mysql
{
    private $codigo;
    private $nombre;
    private $descripcion;
    private $costo;
    private $imagen;

    public function __construct($codigo, $nombre, $descripcion, $costo, $imagen){

        parent::__construct();

        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->costo = $costo;
        $this->imagen = $imagen;
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
