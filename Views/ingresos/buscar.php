<?php
require_once "Config/conection.php";
require_once "Models/Mantenimiento.php";
require_once "Models/Taller.php";
require_once "Models/Servicio.php";

try {

    $taller = new Taller();
    $placa = $_POST["placa_vehiculo"];
    $servicios = false;

    $json = [];

    // OBTENIENDO DATOS DEL VEHICULO
    $vehiculo = $taller->getVehiculo($placa);
    $json[] = (['vehiculo' => $vehiculo]);


    // OBTENIENDO DATOS DEL PROPIETARIO
    $propietario = $taller->getPropietario($vehiculo->id_propietario);
    $json[] = (['propietario' => $propietario]);

    // OBTENIENDO DATOS DEL MANTENIMIENTO
    $mantenimiento = $taller->getMantSiVehiculo($vehiculo->id);

    if ($mantenimiento == false) {
        $json[] = (['mantenimiento' => false]);
        $json[] = (['servicios' => [] ]);

    }else{
        $json[] = (['mantenimiento' => $mantenimiento]);
        $json[] = (['servicios' => $taller->getServiciosMant($mantenimiento->id) ]);
    }

    $jsonString = json_encode($json);
    echo $jsonString;
    
} catch (Exception $exc) {
    $json = (['error' => true, 'mensaje'=> $exc->getMessage()]);
    $jsonString = json_encode($json);
    echo $jsonString;
}


/*

if ($id_prop != null) {

    

    $mantEncontrado = $taller->getMantSiVehiculo((int)$id_vehiculo);
    $json[] = (['manteninimiento'=>$mantEncontrado]);


    $jsonString = json_encode($json);
    echo $jsonString;

    /*
    if ($mantEncontrado != null) {
        $servicios = $mantenimiento->getServicios();

        $list = [];
        
        foreach ($servicios as $service){
            array_push($list,$servicio->getServicio((int)$service->id_servicio));
        }

        $json[] = array('servicios' => $list);
    }




    
} else {
    $jsonString = json_encode(['vehiculo_encontrado' => false]);
    echo $jsonString;
}
*/





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