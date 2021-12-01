<?php


class Pruebas extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function probando()
    {   

        $this->views->getView($this,"probando");
    }

}


?>