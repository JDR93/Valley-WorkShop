<?php
require_once "./Models/Mantenimiento.php";

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

    public function buscar()
    {
        $this->views->getView($this,"buscar");
    }
    public function agregarServicio()
    {
        $this->views->getView($this,"agregarServicio");
    }

    public function ingresar()
    {
        $this->views->getView($this,"ingresar");
    }
    public function eliminarServicio()
    {
        $this->views->getView($this,"eliminarServicio");
    }

    public function buscarPropietario()
    {
        $this->views->getView($this,"buscarPropietario");
    }

    
}


?>