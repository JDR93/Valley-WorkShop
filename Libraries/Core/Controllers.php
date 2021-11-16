<?php 

class Controllers {
    public function __construct()
    {
        $this->views = new Views();
        $this->loadModel();
        $taller = new Taller('19932701', 'WorkShop');
    }

    public function loadModel(){
        //homeModel.php
        $model = get_class($this)."Model";
        $routeClass = "Models/".$model.".php";
        if(file_exists($routeClass)){
            require_once ($routeClass);
            $this->model = new $model();
        }
    }
}


?>