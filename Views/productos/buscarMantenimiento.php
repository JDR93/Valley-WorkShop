<?php

require_once "Config/conection.php";
require_once "Models/Taller.php";

$taller = new Taller();

$placa = $_POST["placa"];

try {

    $vehiculo = $taller->getVehiculo($placa);
    $mantenimiento = $taller->getMantSiVehiculo($vehiculo->id);
    $mecanico = $taller->getMecanico($mantenimiento->id_mecanico);
    $servicios = $taller->getServiciosMant($mantenimiento->id);

    $json = array("error" => false,"vehiculo" => $vehiculo, "mecanico" => $mecanico, "mantenimiento" => $mantenimiento, "servicios" => $servicios);
    $jsonString = json_encode($json);
    echo $jsonString;
    
} catch (Exception $exc) {
    $json = array("error" => true, "mensaje"=>$exc->getMessage());
    $jsonString = json_encode($json);
    echo $jsonString;
}
