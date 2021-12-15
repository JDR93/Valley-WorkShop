<?php

require_once "Config/conection.php";
require_once "Models/Taller.php";

$taller = new Taller();
$codigo = $_POST["codigo"];

try {

    $producto = $taller->getProducto($codigo);

    $json = array("error" => false,"producto" => $producto);
    $jsonString = json_encode($json);
    echo $jsonString;
    
} catch (Exception $exc) {
    $json = array("error" => true, "mensaje"=>$exc->getMessage());
    $jsonString = json_encode($json);
    echo $jsonString;
}
