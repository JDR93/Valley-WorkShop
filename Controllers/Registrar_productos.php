<?php


class Registrar_productos extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function registrar_productos()
    {   
        $data['page_title'] = "Registrar productos";
        $data['page_name'] = "Registrar producto";
        $data['page_tag'] = "Registrar productos";
        $this->views->getView($this,"registrar_productos",$data);
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