<?php

include "./models/User.php";

class Login extends Controllers
{
    public function inicio()
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
}
