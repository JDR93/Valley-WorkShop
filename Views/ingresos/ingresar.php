<?php

$id_vehiculo = (int)$_POST["id_vehiculo"];
//$id_mant = (int)$_POST["id_mantenimiento"];
$lista_servicios = $_POST["arrayServicios"];



try {
    $cnx = BD::instanciar();

    $result = $cnx->query("INSERT INTO mantenimiento(estado, id_vehiculo) VALUES ('P', $id_vehiculo)");
    $id_mantenimiento = $cnx->lastInsertId();

    $i = 0;
    while ($i < count($lista_servicios)) {
        $code = (int)$lista_servicios[$i];
        $cnx->query("INSERT INTO mantenimiento_servicios (id_mantenimiento, id_servicio) VALUES ($id_mantenimiento, $code)");
        $i++;
    }

    echo "insertado correctamente";

} catch (Exception $exc) {
    $json = array($exc->getMessage());
    $jsonString = json_encode($json);
    echo $jsonString;
}

?>