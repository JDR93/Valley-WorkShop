<?php

sleep(1);

require_once "Models/Mantenimiento.php";
require_once "Models/Taller.php";
require_once "Models/Servicio.php";

$taller = new Taller();
$service = new Servicio();

$id_vehiculo = (int)$_POST["id_vehiculo"];
$lista_servicios = $_POST["arrayServicios"];

$mantenimiento = new Mantenimiento();

$mantenimiento->estado = 'P';
$mantenimiento->id_vehiculo = $id_vehiculo;

$id_mantenimiento = $taller->addMantPendiente($mantenimiento);

foreach ($lista_servicios as $codigo) {

    $id_servicio = $service->getServicio((int)$codigo)[0]->id;
    $mantenimiento->addServicio($id_mantenimiento, $id_servicio);
}


$json[] = array('insertado' => true);
$jsonString = json_encode($json);
echo $jsonString;





/*

try {
    
    $taller->addMantPendiente($mantenimiento);

    $i = 0;
    while ($i < count($lista_servicios)) {
        $code = (int)$lista_servicios[$i];
        $cnx->query("INSERT INTO mantenimiento_servicios (id_mantenimiento, id_servicio) VALUES ($id_mantenimiento, $code)");
        $i++;
    }
    echo "insertado correctamente";

} catch (Exception $exc) {
    
}
*/
