<?php
require_once "Config/conection.php";
require_once "Models/Mantenimiento.php";
require_once "Models/Taller.php";
require_once "Models/Servicio.php";

$taller = new Taller();
$mantenimiento = new Mantenimiento();
$servicio = new Servicio();
$placa = $_POST["placa_vehiculo"];



$array_vehiculo = $taller->getVehiculo($placa);

$json = [];
$id_prop = null;
$id_vehiculo = null;

// OBTENIENDO DATOS DEL VEHICULO
foreach ($array_vehiculo as $propiedad) {
    $json[] = array('vehiculo' => array(
        'id' => $id_vehiculo = $propiedad->id,
        'placa' => $propiedad->placa,
        'marca' => $propiedad->marca,
        'linea' => $propiedad->modelo,
        'modelo' => $propiedad->anio,
        'tipo' => $propiedad->tipo,
        'id_propietario' => $id_prop = $propiedad->id_propietario
    ));
}

if ($id_prop != null) {

    // OBTENIENDO DATOS DEL PROPIETARIO
    $array_propietario = $taller->getPropietario($id_prop);

    foreach ($array_propietario as $row) {
        $json[] = array('propietario' => array(
            'nuid' => $row->nuid,
            'nombres' => $row->nombres,
            'apellidos' => $row->apellidos,
            'genero' => $row->genero,
            'telefono' => $row->telefono,
            'correo' => $row->correo,
            'direccion' => $row->direccion
        ));
    }

    $mantEncontrado = $taller->getMantSiVehiculo((int)$id_vehiculo);
    if ($mantEncontrado != null) {
        $servicios = $mantenimiento->getServicios((int)$mantEncontrado->id);

        $list = [];
        
        foreach ($servicios as $service){
            array_push($list,$servicio->getServicioID((int)$service->id_servicio));
        }

        $json[] = array('servicios' => $list);
    }


    $jsonString = json_encode($json);
    echo $jsonString;
} else {
    $jsonString = json_encode(['vehiculo_encontrado' => false]);
    echo $jsonString;
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

        fo reach ($arrayMantServ as $row) {
            array_push($arrayServ, $taller->getServicioCode($row->id_servicio));
        }

        $json[] = $arrayServ;
        $json[] = array('id_mantenimiento'=>$id_mant);

    } else {
        $arrayServ = null;
    }

    $jsonString = json_encode($json);
    echo $jsonString;

    

} else {
    echo $result_veh->rowCount();
}
*/