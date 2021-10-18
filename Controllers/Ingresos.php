<?php


class Ingresos
{

    public function __construct()
    {
        
    }

    public function inicio()
    {
        include "./views/ingresos/ingresoVehicular.php"; 
    }

    public function insertar()
    {
        include "./views/ingresos/insertar.php"; 
    }

}


?>