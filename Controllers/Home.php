<?php

class Home extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function home($parems)
    {
        $this->views->getView($this,"Home");
    }
    
    public function datos($params){
        echo "Dato recibido: ".$params;
    }

}


?>