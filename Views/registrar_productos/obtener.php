<?php

require_once "Models/Taller.php";
$taller = new Taller();
$code = $_POST['code'];

$result = $taller->getProducto($code);

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
