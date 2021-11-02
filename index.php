<?php
require_once("Config/config.php");
require_once ("Helpers/Helpers.php");


$url = !empty($_GET['url']) ? $_GET['url'] : 'login/login'; //Varaible puesta en el archivo .htaccess
//si la variable $url no esta vacia sera igual a la misma sino sera igual a ruta predeterminada.
$arrayUrl = explode('/',$url);

$controller = $arrayUrl[0];
$method = $arrayUrl[0];
$params = "";

if(!empty($arrayUrl[1])){
    if($arrayUrl[1] != ''){
        $method = $arrayUrl[1];
    }
}

if(!empty($arrayUrl[2])){
    if($arrayUrl[2] != ''){
        for($i=2; $i<count($arrayUrl); $i++){
            $params .= $arrayUrl[$i].',';
        }
        $params = trim($params,','); //Funcion trim elimina el ultimo caracter.
    }  
}

require_once "Libraries/Core/Autoload.php";
require_once "Libraries/Core/Load.php";


?>