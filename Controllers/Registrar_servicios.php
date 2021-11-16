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

    public function eliminar()
    {   
        $this->views->getView($this,"eliminar");
    }

    public function editar()
    {   
        $this->views->getView($this,"editar");
    }

    public function obtener()
    {   
        $this->views->getView($this,"obtener");
    }

    public function listar()
    {   
        $this->views->getView($this,"listar");
    }

    public function buscar()
    {   
        $this->views->getView($this,"buscar");
    }

}


?>