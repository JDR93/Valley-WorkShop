<?php

require_once "../../Models/Servicio.php";

$code = $_POST['code'];

$service = new Servicio();
$result = $service->getServicio($code);

if (!$result) {
    die("Ha ocurrido un problema... ");
}

$json[] = array(
    'id' => $result->id,
    'codigo' => $result->codigo,
    'nombre' => $result->nombre,
    'costo' => $result->costo,
    'imagen' => $result->imagen,
    'descripcion' => $result->descripcion
);


$jsonString = json_encode($json[0]);
echo $jsonString;
