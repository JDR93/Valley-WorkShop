<?php


class Productos extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function productos()
    {   
        $data['page_title'] = "Registrar productos";
        $data['page_name'] = "Registrar productos";
        $data['page_tag'] = "Productos";
        $this->views->getView($this,"productos",$data);
    }

}


?>