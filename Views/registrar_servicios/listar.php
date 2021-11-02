<?php 

require_once "../../Models/Servicio.php";

$service = new Servicio();
$restult = $service->mostrarServicios();

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