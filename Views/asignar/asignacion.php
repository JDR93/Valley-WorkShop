<?php


try {

    $nuid = $_POST["mecanico"];
    $placa = $_POST["placa"];
    $taller = new Taller();
    $id_veh = $taller->getVehiculo(strtolower($placa))->id;
    $id_mec = $taller->getIDMecanico($nuid)->id;


    $instancia = BD::instanciar();
    $instancia->query("UPDATE mecanico SET disponibilidad = 'O' WHERE nuid = $nuid");
    $instancia->query("UPDATE mantenimiento SET id_mecanico = $id_mec WHERE id_vehiculo = $id_veh");

    $resultMant = $instancia->query("SELECT * FROM mantenimiento where id_mecanico IS NULL");
    $mants = $resultMant->fetchAll(PDO::FETCH_OBJ);

    foreach ($mants as $mant) {
        $vehiculo_array[] = $taller->getVehiculoID($mant->id_vehiculo)->placa;
    }

    if (count($mants) == 0) {
        $json = array('error' => false, 'resultado' => "null");
    } else {
        $json = array('error' => false, 'vehiculos_placas' => $vehiculo_array, 'mecanicos_disponibles' => $taller->getMecanicosDisponibles(),'resultado' => 'notnull');
    }


    $jsonString = json_encode($json);
    echo $jsonString;
} catch (Exception $exc) {
    $json = array('error' => true, 'mensaje' => $exc->getMessage());

    $jsonString = json_encode($json);
    echo $jsonString;
}
