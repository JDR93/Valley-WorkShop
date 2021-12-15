<?php


class Registrar_usuarios extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function registrar_usuarios()
    {   
        $data['page_title'] = "Registrar usuarios";
        $data['page_name'] = "Registrar usuario";
        $data['page_tag'] = "Registrar usuarios";
        $this->views->getView($this,"registrar_usuarios",$data);
    }

    
    public function insertar_mecanico()
    {   
        $this->views->getView($this,"insertar_mecanico");
    }

    

    public function listar_mecanicos()
    {   
        $this->views->getView($this,"listar_mecanicos");
    }

    public function buscar_mecanico()
    {   
        $this->views->getView($this,"buscar_mecanico");
    }

    public function buscar_mecanicoTarjeta()
    {   
        $this->views->getView($this,"buscar_mecanicoTarjeta");
    }

    public function editar_mecanico()
    {   
        $this->views->getView($this,"editar_mecanico");
    }

    public function obtener_mecanico()
    {   
        $this->views->getView($this,"obtener_mecanico");
    }

    public function eliminar_mecanico()
    {   
        $this->views->getView($this,"eliminar_mecanico");
    }

    /*

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
    */

}


?>