<?php


class Registrar_servicios extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function registrar_servicios()
    {   
        $data['page_title'] = "Registrar servicios";
        $data['page_name'] = "Registrar servicio";
        $data['page_tag'] = "Registrar servicios";
        $this->views->getView($this,"registrar_servicios",$data);
    }

    public function insertar()
    {   
        $this->views->getView($this,"insertar");
    }

    public function pagination()
    {   
        $this->views->getView($this,"pagination");
    }
    public function eliminar()
    {   
        $this->views->getView($this,"eliminar");
    }

}


?>