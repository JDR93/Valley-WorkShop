<?php
require_once "Config/conection.php";
require_once "Models/Mantenimiento.php";
require_once "Models/Taller.php";

$taller = new Taller('19932701', 'WorkShop');

$placa = $_POST["valor"];
$conexion = BD::instanciar();
$result_veh = $conexion->prepare("SELECT * FROM vehiculo WHERE placa = ?");
$resultado = $result_veh->execute([$placa]);

$array_vehiculo = $result_veh->fetchAll(PDO::FETCH_OBJ);

if ($result_veh->rowCount() != 0) {

    $json = array();
    // OBTENIENDO DATOS DEL VEHICULO
    foreach ($array_vehiculo as $row) {
        $json[] = array(
            'id' => $row->id,
            'placa' => $row->placa,
            'marca' => $row->marca,
            'linea' => $row->modelo,
            'modelo' => $row->anio,
            'tipo' => $row->tipo
        );
    }

    $id_prop =  $array_vehiculo[0]->id_propietario;


    // OBTENIENDO DATOS PROPIETARIO
    $result_prop = $conexion->query("SELECT * FROM propietario WHERE id = '$id_prop' ");
    $array_propietario = $result_prop->fetchAll(PDO::FETCH_OBJ);

    foreach ($array_propietario as $row) {
        $json[] = array(
            'nuid' => $row->nuid,
            'nombres' => $row->nombres,
            'apellidos' => $row->apellidos,
            'genero' => $row->genero,
            'telefono' => $row->telefono,
            'correo' => $row->correo,
            'direccion' => $row->direccion
        );
    }




    /*
    $id_vehiculo =  $array_vehiculo[0]->id;
    // OBTENIENDO SERVICIOS REGISTRADOS

    $resultVeh = $conexion->query("SELECT id FROM mantenimiento WHERE id_vehiculo  = $id_vehiculo");
    $arrayMant = $resultVeh->fetchAll(PDO::FETCH_OBJ);

    if ($resultVeh->rowCount() != 0) {
        foreach ($arrayMant as $row) {
            $id_mant = (int)$row->id;
        }

        $resultMantServ = $conexion->query("SELECT id_servicio FROM mantenimiento_servicios WHERE id_mantenimiento = $id_mant");
        $arrayMantServ = $resultMantServ->fetchAll(PDO::FETCH_OBJ);


        $arrayServ = []; 

        foreach ($arrayMantServ as $row) {
            array_push($arrayServ, $taller->getServicioCode($row->id_servicio));
        }

        $json[] = $arrayServ;
        $json[] = array('id_mantenimiento'=>$id_mant);

    } else {
        $arrayServ = null;
    }
*/
    $jsonString = json_encode($json);
    echo $jsonString;

    

} else {
    echo $result_veh->rowCount();
}
