<?php 

class BD {
    public static $instancia = null;

    public static function instanciar(){
        $instancia = new PDO('mysql:host=localhost;dbname=valleyworkshop', 'root','');
        $instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $instancia->exec('set charset utf8');

        return $instancia;
    }
}

?>