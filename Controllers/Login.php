<?php

include "./models/User.php";

class Login extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data['page_title'] = "Login";
        $data['page_name'] = "Login administradores";
        $data['page_tag'] = "Iniciar Sesión";
        $this->views->getView($this,"inicio",$data);
    }

    public function verificar()
    {
        $this->views->getView($this,"verificar");
    }

    public function cerrar_session()
    {
        $this->views->getView($this,"cerrar_session");
    }

    public function recuperar()
    {
        $this->views->getView($this,"recuperar");
    }

}
