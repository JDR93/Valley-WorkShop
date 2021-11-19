<?php 

require_once "Models/Servicio.php";

$taller = new Taller();
$restult = $taller->getServicios();

$json = array();

foreach($restult as $row){
    $json[] = array(
        'codigo' => $row->codigo,
        'nombre' => $row->nombre,
        'costo' => $row->costo,
        'imagen' => $row->imagen,
        'descripcion' => $row->descripcion
    );
}

$jsonString = json_encode($json);
    echo $jsonString;
?>

