<?php
require_once "Config/conection.php";
require_once "Models/Servicio.php";
require_once "Models/Mantenimiento.php";
require_once "Models/Vehiculo.php";

$taller = new Taller();
$code_service = (int)$_POST["code_service"];
$s = $taller->getServicio($code_service);
$servicios = isset($_POST["servicios"]) ? $servicios = $_POST["servicios"] :  $servicios = [];

if ($servicios == []) {
    array_push($servicios, array($s));

    $json = ['servicios' => $servicios];
    $jsonString = json_encode($json);
    echo ($jsonString);
} else {

    $i = 0;
    while ($i < count($servicios)) {
        if ((int)$servicios[$i][0]['codigo'] == $code_service) {
            $json = (['error' => true, 'servicios' => $servicios]);
            $jsonString = json_encode($json);
            echo ($jsonString);
            return false;
        }

        $i++;
    }
    array_push($servicios, array($s));

    $json = ['servicios' => $servicios];
    $jsonString = json_encode($json);
    echo ($jsonString);
}

