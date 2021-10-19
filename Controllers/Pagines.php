<?php

class Pagines extends Controllers{
    public function inicio(){
        $this->views->getView($this,"inicio");
    }
    public function error(){
        $this->views->getView($this,"error");

    }
}

?>