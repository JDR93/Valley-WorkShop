<?php


class Ingresos extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ingresos()
    {
        $data['page_title'] = "Ingreso de vehiculo";
        $data['page_name'] = "Ingresar vehiculo";
        $data['page_tag'] = "";
        $this->views->getView($this,"ingresoVehicular",$data);
    }

    public function insertar()
    {
        $this->views->getView($this,"insertar");
    }

}


?>