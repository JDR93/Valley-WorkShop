<?php

class Home extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function home($parems)
    {   
        $data['page_title'] = "Pagina principal";
        $data['page_name'] = "home";
        $data['page_tag'] = "Home";
        $this->views->getView($this,"Home",$data);
    }
    
    public function datos($params){
        echo "Dato recibido: ".$params;
    }

}


?>