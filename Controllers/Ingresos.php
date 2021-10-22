<?php


class Ingresos extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ingresos()
    {
        $data['page_title'] = "INGRESO DE VEHICULO";
        $data['page_name'] = "Ingresar vehiculo";
        $data['page_tag'] = "Ingresos";
        $this->views->getView($this,"ingresoVehicular",$data);
    }

    public function insertar()
    {
        $this->views->getView($this,"insertar");
    }

}


?>