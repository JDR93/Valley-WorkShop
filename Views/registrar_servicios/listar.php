<?php 

require_once "Models/Taller.php";

$taller = new Taller();
$servicios = $taller->servicios;

$json = array();

foreach($servicios as $servicio){
    $json[] = array(
        'codigo' => $servicio->codigo,
        'nombre' => $servicio->nombre,
        'costo' => $servicio->costo,
        'imagen' => $servicio->imagen,
        'descripcion' => $servicio->descripcion
    );
}

$jsonString = json_encode($json);
    echo $jsonString;
?>

