<?php

sleep(.4);

$taller = new Taller();
$code_service = (int)$_POST["code_service"];
$m = $_POST['mantenimiento'];
$v = $_POST['vehiculo'];
$s = $taller->getServicio($code_service);

$servicios = $_POST["servicios"];

if ($m == 'false') {

    $veh = $taller->getVehiculo($v["placa"]);
    $id_vehiculo =  (int)$veh->id;

    if (count($servicios) == 0) {
        $json = ['error_servicios_null' => true];
        $jsonString = json_encode($json);
        echo ($jsonString);
        return false;
    }

    $id_mantenimiento = $taller->addMantenimiento($id_vehiculo);
} else {
    $id_vehiculo = (int)$v['id'];
    $id_mantenimiento = (int)$m['id'];
}

//Elimina los servicios registrados para registrar los a agregar. 
$query_delete = "DELETE FROM mantenimiento_servicios WHERE id_mantenimiento = $id_mantenimiento";
$taller->delete($query_delete);

$i = 0;
while ($i < count($servicios)) {
    $taller->addServicioMant($id_mantenimiento, (int)$servicios[$i][0]["id"]);
    $i++;
}


$json = ['insertado' => true, $v];
$jsonString = json_encode($json);
echo ($jsonString);
