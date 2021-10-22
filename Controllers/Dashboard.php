<?php

class Dashboard extends Controllers
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard($parems)
    {   
        $data['page_title'] = "Administración";
        $data['page_name'] = "";
        $data['page_tag'] = "Administración";
        $this->views->getView($this,"dashboard",$data);
    }

}


?>