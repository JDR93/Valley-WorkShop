<?php 

require_once "Models/Taller.php";

$taller = new Taller();
$productos = $taller->productos;

$json = array();

foreach($productos as $producto){
    $json[] = array(
        'codigo' => $producto->codigo,
        'nombre' => $producto->nombre,
        'costo' => $producto->costo,
        'imagen' => $producto->imagen,
        'descripcion' => $producto->descripcion
    );
}

$jsonString = json_encode($json);
    echo $jsonString;
?>

