<?php


class Facturacion extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function facturacion()
    {   
        $data['page_title'] = "Facturar Mantenimiento";
        $data['page_name'] = "Facturar Mantenimiento";
        $data['page_tag'] = "Facturar";
        $this->views->getView($this,"facturacion",$data);
    }

}


?>