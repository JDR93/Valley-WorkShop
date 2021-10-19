<?php


class Asignar extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function asignar()
    {   
        $data['page_title'] = "Asignar Vehiculo";
        $data['page_name'] = "Asignar vehiculo";
        $data['page_tag'] = "";
        $this->views->getView($this,"asignarVeh",$data);
    }

}


?>