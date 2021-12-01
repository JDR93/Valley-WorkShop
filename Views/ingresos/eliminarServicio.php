<?php

$taller = new Taller();
$instancia = BD::instanciar();
$codigo = $_POST["code_service"];


$mantenimiento = $_POST["mantenimiento"];
$servicios = $_POST["servicios"];

$servicio = $taller->getServicio($codigo);
$id_servicio = (int)$servicio->id;

//$query_delete = "DELETE FROM mantenimiento_servicios WHERE id_servicio = $id_servicio ";
//$result = $instancia->query($query_delete);

if ($mantenimiento == "false") {

    for ($i = 0; $i < count($servicios); $i++) {
        if ($servicios[$i][0]["codigo"] == $codigo) {
            array_splice($servicios, $i, 1);
        }
    }
/*
    if (count($servicios) == 0) {
        $json = ["eliminado" => true, "servicios" => false];
        $jsonString = json_encode($json);
        echo $jsonString;
        return false;
    }
*/
    $json = ["eliminado" => true, "servicios" => $servicios];
    $jsonString = json_encode($json);
    echo $jsonString;
} else {

    $id_mantenimiento = (int)$mantenimiento["id"];

    $result = $instancia->prepare("DELETE FROM mantenimiento_servicios WHERE id_mantenimiento = $id_mantenimiento AND id_servicio = $id_servicio");
    $vall = $result->execute();

    $servicios = $taller->getServiciosMant($id_mantenimiento);

    if ($servicios == null) {
        $json = ["eliminado" => true, "servicios" => false, "mantenimiento" => $mantenimiento];
        $jsonString = json_encode($json);
        echo $jsonString;
    } else {
        $json = ["eliminado" => true, "servicios" => $servicios];
        $jsonString = json_encode($json);
        echo $jsonString;
    }
}
