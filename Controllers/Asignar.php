<?php


class Asignar extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function asignar()
    {   
        $data['page_title'] = "Asignar mecanico";
        $data['page_name'] = "Asignar mecanico";
        $data['page_tag'] = "Asignacion";
        $this->views->getView($this,"asignarMec",$data);
    }

    public function asignacion()
    {   
        $this->views->getView($this,"asignacion");
    }

}


?>